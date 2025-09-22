<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
use Telnyx\Calls\CallDialParams\SipTransportProtocol;
use Telnyx\Calls\CallDialParams\StreamBidirectionalSamplingRate;
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
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CallsContract
{
    /**
     * @api
     *
     * @param string $connectionID the ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination
     * @param string $from The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format.
     * @param string|list<string> $to The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected.
     * @param AnsweringMachineDetectionConfig $answeringMachineDetectionConfig optional configuration parameters to modify 'answering_machine_detection' performance
     * @param string $audioURL The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     * @param string $billingGroupID Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     * @param bool $bridgeIntent Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     * @param bool $bridgeOnAnswer Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     * @param string $commandID Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     * @param ConferenceConfig $conferenceConfig optional configuration parameters to dial new participant into a conference
     * @param list<CustomSipHeader> $customHeaders custom headers to be added to the SIP INVITE
     * @param DialogflowConfig $dialogflowConfig
     * @param bool $enableDialogflow Enables Dialogflow for the current call. The default value is false.
     * @param string $fromDisplayName The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     * @param string $linkTo Use another call's control id for sharing the same call session id
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption defines whether media should be encrypted on the call
     * @param string $mediaName The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
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
     * @param list<SipHeader> $sipHeaders SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol defines SIP transport protocol to be used on the call
     * @param SoundModifications $soundModifications use this field to modify sound effects, for example adjust the pitch
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
     * @param TranscriptionStartRequest $transcriptionConfig
     * @param string $webhookURL use this field to override the URL for which Telnyx will send subsequent webhooks to for this call
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod HTTP request type used for `webhook_url`
     *
     * @return CallDialResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function dial(
        $connectionID,
        $from,
        $to,
        $answeringMachineDetection = omit,
        $answeringMachineDetectionConfig = omit,
        $audioURL = omit,
        $billingGroupID = omit,
        $bridgeIntent = omit,
        $bridgeOnAnswer = omit,
        $clientState = omit,
        $commandID = omit,
        $conferenceConfig = omit,
        $customHeaders = omit,
        $dialogflowConfig = omit,
        $enableDialogflow = omit,
        $fromDisplayName = omit,
        $linkTo = omit,
        $mediaEncryption = omit,
        $mediaName = omit,
        $preferredCodecs = omit,
        $record = omit,
        $recordChannels = omit,
        $recordCustomFileName = omit,
        $recordFormat = omit,
        $recordMaxLength = omit,
        $recordTimeoutSecs = omit,
        $recordTrack = omit,
        $recordTrim = omit,
        $sendSilenceWhenIdle = omit,
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $sipHeaders = omit,
        $sipTransportProtocol = omit,
        $soundModifications = omit,
        $streamBidirectionalCodec = omit,
        $streamBidirectionalMode = omit,
        $streamBidirectionalSamplingRate = omit,
        $streamBidirectionalTargetLegs = omit,
        $streamCodec = omit,
        $streamEstablishBeforeCallOriginate = omit,
        $streamTrack = omit,
        $streamURL = omit,
        $superviseCallControlID = omit,
        $supervisorRole = omit,
        $timeLimitSecs = omit,
        $timeoutSecs = omit,
        $transcription = omit,
        $transcriptionConfig = omit,
        $webhookURL = omit,
        $webhookURLMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): CallDialResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallDialResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function dialRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallDialResponse;

    /**
     * @api
     *
     * @return CallGetStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        ?RequestOptions $requestOptions = null
    ): CallGetStatusResponse;

    /**
     * @api
     *
     * @return CallGetStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveStatusRaw(
        string $callControlID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetStatusResponse;
}
