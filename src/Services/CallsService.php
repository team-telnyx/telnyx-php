<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Calls\Actions\TranscriptionStartRequest;
use Telnyx\Calls\CallDialParams\AnsweringMachineDetection;
use Telnyx\Calls\CallDialParams\AnsweringMachineDetectionConfig;
use Telnyx\Calls\CallDialParams\ConferenceConfig;
use Telnyx\Calls\CallDialParams\MediaEncryption;
use Telnyx\Calls\CallDialParams\Record;
use Telnyx\Calls\CallDialParams\RecordChannels;
use Telnyx\Calls\CallDialParams\RecordFormat;
use Telnyx\Calls\CallDialParams\RecordTrack;
use Telnyx\Calls\CallDialParams\RecordTrim;
use Telnyx\Calls\CallDialParams\SipRegion;
use Telnyx\Calls\CallDialParams\SipTransportProtocol;
use Telnyx\Calls\CallDialParams\StreamTrack;
use Telnyx\Calls\CallDialParams\SupervisorRole;
use Telnyx\Calls\CallDialParams\WebhookURLMethod;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\DialogflowConfig;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SoundModifications;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallsContract;
use Telnyx\Services\Calls\ActionsService;

/**
 * @phpstan-import-type ToShape from \Telnyx\Calls\CallDialParams\To
 * @phpstan-import-type AnsweringMachineDetectionConfigShape from \Telnyx\Calls\CallDialParams\AnsweringMachineDetectionConfig
 * @phpstan-import-type ConferenceConfigShape from \Telnyx\Calls\CallDialParams\ConferenceConfig
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 * @phpstan-import-type DialogflowConfigShape from \Telnyx\Calls\DialogflowConfig
 * @phpstan-import-type SipHeaderShape from \Telnyx\Calls\SipHeader
 * @phpstan-import-type SoundModificationsShape from \Telnyx\Calls\SoundModifications
 * @phpstan-import-type TranscriptionStartRequestShape from \Telnyx\Calls\Actions\TranscriptionStartRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public CallsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Dial a number or SIP URI from a given connection. A successful response will include a `call_leg_id` which can be used to correlate the command with subsequent webhooks.
     *
     * **Expected Webhooks:**
     *
     * - `call.initiated`
     * - `call.answered` or `call.hangup`
     * - `call.machine.detection.ended` if `answering_machine_detection` was requested
     * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
     * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
     * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
     * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
     *
     * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
     *
     * @param string $connectionID the ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination
     * @param string $from The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format.
     * @param ToShape $to The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected.
     * @param AnsweringMachineDetectionConfig|AnsweringMachineDetectionConfigShape $answeringMachineDetectionConfig optional configuration parameters to modify 'answering_machine_detection' performance
     * @param string $audioURL The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param string $billingGroupID Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     * @param bool $bridgeIntent Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     * @param bool $bridgeOnAnswer Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     * @param ConferenceConfig|ConferenceConfigShape $conferenceConfig optional configuration parameters to dial new participant into a conference
     * @param list<CustomSipHeader|CustomSipHeaderShape> $customHeaders custom headers to be added to the SIP INVITE
     * @param DialogflowConfig|DialogflowConfigShape $dialogflowConfig
     * @param bool $enableDialogflow Enables Dialogflow for the current call. The default value is false.
     * @param string $fromDisplayName The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     * @param string $linkTo Use another call's control id for sharing the same call session id
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption defines whether media should be encrypted on the call
     * @param string $mediaName The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     * @param string $parkAfterUnbridge If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     * @param string $preferredCodecs the list of comma-separated codecs in a preferred order for the forked media to be received
     * @param Record|value-of<Record> $record Start recording automatically after an event. Disabled by default.
     * @param RecordChannels|value-of<RecordChannels> $recordChannels defines which channel should be recorded ('single' or 'dual') when `record` is specified
     * @param string $recordCustomFileName The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     * @param RecordFormat|value-of<RecordFormat> $recordFormat defines the format of the recording ('wav' or 'mp3') when `record` is specified
     * @param int $recordMaxLength Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     * @param int $recordTimeoutSecs The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     * @param RecordTrack|value-of<RecordTrack> $recordTrack The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     * @param RecordTrim|value-of<RecordTrim> $recordTrim when set to `trim-silence`, silence will be removed from the beginning and end of the recording
     * @param bool $sendSilenceWhenIdle generate silence RTP packets when no transmission available
     * @param string $sipAuthPassword SIP Authentication password used for SIP challenges
     * @param string $sipAuthUsername SIP Authentication username used for SIP challenges
     * @param list<SipHeader|SipHeaderShape> $sipHeaders SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     * @param SipRegion|value-of<SipRegion> $sipRegion defines the SIP region to be used for the call
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol defines SIP transport protocol to be used on the call
     * @param SoundModifications|SoundModificationsShape $soundModifications use this field to modify sound effects, for example adjust the pitch
     * @param string $streamAuthToken An authentication token to be sent as part of the WebSocket connection when using streaming. Maximum length is 4000 characters.
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate> $streamBidirectionalSamplingRate audio sampling rate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs specifies which call legs should receive the bidirectional stream audio
     * @param StreamCodec|value-of<StreamCodec> $streamCodec Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     * @param bool $streamEstablishBeforeCallOriginate Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     * @param StreamTrack|value-of<StreamTrack> $streamTrack specifies which track should be streamed
     * @param string $streamURL the destination WebSocket address where the stream is going to be delivered
     * @param string $superviseCallControlID the call leg which will be supervised by the new call
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
     * @param int $timeLimitSecs Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     * @param int $timeoutSecs The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     * @param bool $transcription Enable transcription upon call answer. The default value is false.
     * @param TranscriptionStartRequest|TranscriptionStartRequestShape $transcriptionConfig
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function dial(
        string $connectionID,
        string $from,
        string|array $to,
        AnsweringMachineDetection|string $answeringMachineDetection = 'disabled',
        AnsweringMachineDetectionConfig|array|null $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $billingGroupID = null,
        bool $bridgeIntent = false,
        bool $bridgeOnAnswer = false,
        ?string $clientState = null,
        ?string $commandID = null,
        ConferenceConfig|array|null $conferenceConfig = null,
        ?array $customHeaders = null,
        DialogflowConfig|array|null $dialogflowConfig = null,
        bool $enableDialogflow = false,
        ?string $fromDisplayName = null,
        ?string $linkTo = null,
        MediaEncryption|string $mediaEncryption = 'disabled',
        ?string $mediaName = null,
        ?string $parkAfterUnbridge = null,
        ?string $preferredCodecs = null,
        Record|string|null $record = null,
        RecordChannels|string $recordChannels = 'dual',
        ?string $recordCustomFileName = null,
        RecordFormat|string $recordFormat = 'mp3',
        int $recordMaxLength = 0,
        int $recordTimeoutSecs = 0,
        RecordTrack|string $recordTrack = 'both',
        RecordTrim|string|null $recordTrim = null,
        bool $sendSilenceWhenIdle = false,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        SipRegion|string $sipRegion = 'US',
        SipTransportProtocol|string $sipTransportProtocol = 'UDP',
        SoundModifications|array|null $soundModifications = null,
        ?string $streamAuthToken = null,
        StreamBidirectionalCodec|string $streamBidirectionalCodec = 'PCMU',
        StreamBidirectionalMode|string $streamBidirectionalMode = 'mp3',
        StreamBidirectionalSamplingRate|int $streamBidirectionalSamplingRate = 8000,
        StreamBidirectionalTargetLegs|string $streamBidirectionalTargetLegs = 'opposite',
        StreamCodec|string $streamCodec = 'default',
        bool $streamEstablishBeforeCallOriginate = false,
        StreamTrack|string $streamTrack = 'inbound_track',
        ?string $streamURL = null,
        ?string $superviseCallControlID = null,
        SupervisorRole|string $supervisorRole = 'barge',
        int $timeLimitSecs = 14400,
        int $timeoutSecs = 30,
        bool $transcription = false,
        TranscriptionStartRequest|array|null $transcriptionConfig = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string $webhookURLMethod = 'POST',
        RequestOptions|array|null $requestOptions = null,
    ): CallDialResponse {
        $params = Util::removeNulls(
            [
                'connectionID' => $connectionID,
                'from' => $from,
                'to' => $to,
                'answeringMachineDetection' => $answeringMachineDetection,
                'answeringMachineDetectionConfig' => $answeringMachineDetectionConfig,
                'audioURL' => $audioURL,
                'billingGroupID' => $billingGroupID,
                'bridgeIntent' => $bridgeIntent,
                'bridgeOnAnswer' => $bridgeOnAnswer,
                'clientState' => $clientState,
                'commandID' => $commandID,
                'conferenceConfig' => $conferenceConfig,
                'customHeaders' => $customHeaders,
                'dialogflowConfig' => $dialogflowConfig,
                'enableDialogflow' => $enableDialogflow,
                'fromDisplayName' => $fromDisplayName,
                'linkTo' => $linkTo,
                'mediaEncryption' => $mediaEncryption,
                'mediaName' => $mediaName,
                'parkAfterUnbridge' => $parkAfterUnbridge,
                'preferredCodecs' => $preferredCodecs,
                'record' => $record,
                'recordChannels' => $recordChannels,
                'recordCustomFileName' => $recordCustomFileName,
                'recordFormat' => $recordFormat,
                'recordMaxLength' => $recordMaxLength,
                'recordTimeoutSecs' => $recordTimeoutSecs,
                'recordTrack' => $recordTrack,
                'recordTrim' => $recordTrim,
                'sendSilenceWhenIdle' => $sendSilenceWhenIdle,
                'sipAuthPassword' => $sipAuthPassword,
                'sipAuthUsername' => $sipAuthUsername,
                'sipHeaders' => $sipHeaders,
                'sipRegion' => $sipRegion,
                'sipTransportProtocol' => $sipTransportProtocol,
                'soundModifications' => $soundModifications,
                'streamAuthToken' => $streamAuthToken,
                'streamBidirectionalCodec' => $streamBidirectionalCodec,
                'streamBidirectionalMode' => $streamBidirectionalMode,
                'streamBidirectionalSamplingRate' => $streamBidirectionalSamplingRate,
                'streamBidirectionalTargetLegs' => $streamBidirectionalTargetLegs,
                'streamCodec' => $streamCodec,
                'streamEstablishBeforeCallOriginate' => $streamEstablishBeforeCallOriginate,
                'streamTrack' => $streamTrack,
                'streamURL' => $streamURL,
                'superviseCallControlID' => $superviseCallControlID,
                'supervisorRole' => $supervisorRole,
                'timeLimitSecs' => $timeLimitSecs,
                'timeoutSecs' => $timeoutSecs,
                'transcription' => $transcription,
                'transcriptionConfig' => $transcriptionConfig,
                'webhookURL' => $webhookURL,
                'webhookURLMethod' => $webhookURLMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->dial(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of a call (data is available 10 minutes after call ended).
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        RequestOptions|array|null $requestOptions = null
    ): CallGetStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStatus($callControlID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
