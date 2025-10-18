<?php

declare(strict_types=1);

namespace Telnyx\Calls;

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
use Telnyx\Calls\CallDialParams\StreamTrack;
use Telnyx\Calls\CallDialParams\SupervisorRole;
use Telnyx\Calls\CallDialParams\To;
use Telnyx\Calls\CallDialParams\WebhookURLMethod;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CallDialParams); // set properties as needed
 * $client->calls->dial(...$params->toArray());
 * ```
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
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls->dial(...$params->toArray());`
 *
 * @see Telnyx\Calls->dial
 *
 * @phpstan-type call_dial_params = array{
 *   connectionID: string,
 *   from: string,
 *   to: string|list<string>,
 *   answeringMachineDetection?: AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
 *   answeringMachineDetectionConfig?: AnsweringMachineDetectionConfig,
 *   audioURL?: string,
 *   billingGroupID?: string,
 *   bridgeIntent?: bool,
 *   bridgeOnAnswer?: bool,
 *   clientState?: string,
 *   commandID?: string,
 *   conferenceConfig?: ConferenceConfig,
 *   customHeaders?: list<CustomSipHeader>,
 *   dialogflowConfig?: DialogflowConfig,
 *   enableDialogflow?: bool,
 *   fromDisplayName?: string,
 *   linkTo?: string,
 *   mediaEncryption?: MediaEncryption|value-of<MediaEncryption>,
 *   mediaName?: string,
 *   parkAfterUnbridge?: string,
 *   preferredCodecs?: string,
 *   record?: Record|value-of<Record>,
 *   recordChannels?: RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string,
 *   recordFormat?: RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int,
 *   recordTimeoutSecs?: int,
 *   recordTrack?: RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: RecordTrim|value-of<RecordTrim>,
 *   sendSilenceWhenIdle?: bool,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 *   sipHeaders?: list<SipHeader>,
 *   sipTransportProtocol?: SipTransportProtocol|value-of<SipTransportProtocol>,
 *   soundModifications?: SoundModifications,
 *   streamBidirectionalCodec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalSamplingRate?: 8000|16000|22050|24000|48000,
 *   streamBidirectionalTargetLegs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: StreamCodec|value-of<StreamCodec>,
 *   streamEstablishBeforeCallOriginate?: bool,
 *   streamTrack?: StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string,
 *   superviseCallControlID?: string,
 *   supervisorRole?: SupervisorRole|value-of<SupervisorRole>,
 *   timeLimitSecs?: int,
 *   timeoutSecs?: int,
 *   transcription?: bool,
 *   transcriptionConfig?: TranscriptionStartRequest,
 *   webhookURL?: string,
 *   webhookURLMethod?: WebhookURLMethod|value-of<WebhookURLMethod>,
 * }
 */
final class CallDialParams implements BaseModel
{
    /** @use SdkModel<call_dial_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination.
     */
    #[Api('connection_id')]
    public string $connectionID;

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format.
     */
    #[Api]
    public string $from;

    /**
     * The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings.
     *
     * @var string|list<string> $to
     */
    #[Api(union: To::class)]
    public string|array $to;

    /**
     * Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected.
     *
     * @var value-of<AnsweringMachineDetection>|null $answeringMachineDetection
     */
    #[Api(
        'answering_machine_detection',
        enum: AnsweringMachineDetection::class,
        optional: true,
    )]
    public ?string $answeringMachineDetection;

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    #[Api('answering_machine_detection_config', optional: true)]
    public ?AnsweringMachineDetectionConfig $answeringMachineDetectionConfig;

    /**
     * The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Api('audio_url', optional: true)]
    public ?string $audioURL;

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     */
    #[Api('bridge_intent', optional: true)]
    public ?bool $bridgeIntent;

    /**
     * Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     */
    #[Api('bridge_on_answer', optional: true)]
    public ?bool $bridgeOnAnswer;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Optional configuration parameters to dial new participant into a conference.
     */
    #[Api('conference_config', optional: true)]
    public ?ConferenceConfig $conferenceConfig;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomSipHeader::class, optional: true)]
    public ?array $customHeaders;

    #[Api('dialogflow_config', optional: true)]
    public ?DialogflowConfig $dialogflowConfig;

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    #[Api('enable_dialogflow', optional: true)]
    public ?bool $enableDialogflow;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    #[Api('from_display_name', optional: true)]
    public ?string $fromDisplayName;

    /**
     * Use another call's control id for sharing the same call session id.
     */
    #[Api('link_to', optional: true)]
    public ?string $linkTo;

    /**
     * Defines whether media should be encrypted on the call.
     *
     * @var value-of<MediaEncryption>|null $mediaEncryption
     */
    #[Api('media_encryption', enum: MediaEncryption::class, optional: true)]
    public ?string $mediaEncryption;

    /**
     * The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     */
    #[Api('park_after_unbridge', optional: true)]
    public ?string $parkAfterUnbridge;

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     */
    #[Api('preferred_codecs', optional: true)]
    public ?string $preferredCodecs;

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @var value-of<Record>|null $record
     */
    #[Api(enum: Record::class, optional: true)]
    public ?string $record;

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @var value-of<RecordChannels>|null $recordChannels
     */
    #[Api('record_channels', enum: RecordChannels::class, optional: true)]
    public ?string $recordChannels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api('record_custom_file_name', optional: true)]
    public ?string $recordCustomFileName;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $recordFormat
     */
    #[Api('record_format', enum: RecordFormat::class, optional: true)]
    public ?string $recordFormat;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Api('record_max_length', optional: true)]
    public ?int $recordMaxLength;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api('record_timeout_secs', optional: true)]
    public ?int $recordTimeoutSecs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $recordTrack
     */
    #[Api('record_track', enum: RecordTrack::class, optional: true)]
    public ?string $recordTrack;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $recordTrim
     */
    #[Api('record_trim', enum: RecordTrim::class, optional: true)]
    public ?string $recordTrim;

    /**
     * Generate silence RTP packets when no transmission available.
     */
    #[Api('send_silence_when_idle', optional: true)]
    public ?bool $sendSilenceWhenIdle;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Api('sip_auth_password', optional: true)]
    public ?string $sipAuthPassword;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Api('sip_auth_username', optional: true)]
    public ?string $sipAuthUsername;

    /**
     * SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Api('sip_headers', list: SipHeader::class, optional: true)]
    public ?array $sipHeaders;

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @var value-of<SipTransportProtocol>|null $sipTransportProtocol
     */
    #[Api(
        'sip_transport_protocol',
        enum: SipTransportProtocol::class,
        optional: true
    )]
    public ?string $sipTransportProtocol;

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    #[Api('sound_modifications', optional: true)]
    public ?SoundModifications $soundModifications;

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @var value-of<StreamBidirectionalCodec>|null $streamBidirectionalCodec
     */
    #[Api(
        'stream_bidirectional_codec',
        enum: StreamBidirectionalCodec::class,
        optional: true,
    )]
    public ?string $streamBidirectionalCodec;

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @var value-of<StreamBidirectionalMode>|null $streamBidirectionalMode
     */
    #[Api(
        'stream_bidirectional_mode',
        enum: StreamBidirectionalMode::class,
        optional: true,
    )]
    public ?string $streamBidirectionalMode;

    /**
     * Audio sampling rate.
     *
     * @var 8000|16000|22050|24000|48000|null $streamBidirectionalSamplingRate
     */
    #[Api(
        'stream_bidirectional_sampling_rate',
        enum: StreamBidirectionalSamplingRate::class,
        optional: true,
    )]
    public ?int $streamBidirectionalSamplingRate;

    /**
     * Specifies which call legs should receive the bidirectional stream audio.
     *
     * @var value-of<StreamBidirectionalTargetLegs>|null $streamBidirectionalTargetLegs
     */
    #[Api(
        'stream_bidirectional_target_legs',
        enum: StreamBidirectionalTargetLegs::class,
        optional: true,
    )]
    public ?string $streamBidirectionalTargetLegs;

    /**
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     *
     * @var value-of<StreamCodec>|null $streamCodec
     */
    #[Api('stream_codec', enum: StreamCodec::class, optional: true)]
    public ?string $streamCodec;

    /**
     * Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     */
    #[Api('stream_establish_before_call_originate', optional: true)]
    public ?bool $streamEstablishBeforeCallOriginate;

    /**
     * Specifies which track should be streamed.
     *
     * @var value-of<StreamTrack>|null $streamTrack
     */
    #[Api('stream_track', enum: StreamTrack::class, optional: true)]
    public ?string $streamTrack;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Api('stream_url', optional: true)]
    public ?string $streamURL;

    /**
     * The call leg which will be supervised by the new call.
     */
    #[Api('supervise_call_control_id', optional: true)]
    public ?string $superviseCallControlID;

    /**
     * The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
     *
     * @var value-of<SupervisorRole>|null $supervisorRole
     */
    #[Api('supervisor_role', enum: SupervisorRole::class, optional: true)]
    public ?string $supervisorRole;

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    #[Api('time_limit_secs', optional: true)]
    public ?int $timeLimitSecs;

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    #[Api('timeout_secs', optional: true)]
    public ?int $timeoutSecs;

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    #[Api(optional: true)]
    public ?bool $transcription;

    #[Api('transcription_config', optional: true)]
    public ?TranscriptionStartRequest $transcriptionConfig;

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    #[Api('webhook_url', optional: true)]
    public ?string $webhookURL;

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @var value-of<WebhookURLMethod>|null $webhookURLMethod
     */
    #[Api('webhook_url_method', enum: WebhookURLMethod::class, optional: true)]
    public ?string $webhookURLMethod;

    /**
     * `new CallDialParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallDialParams::with(connectionID: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallDialParams)->withConnectionID(...)->withFrom(...)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|list<string> $to
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection
     * @param list<CustomSipHeader> $customHeaders
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     * @param list<SipHeader> $sipHeaders
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode
     * @param 8000|16000|22050|24000|48000 $streamBidirectionalSamplingRate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec> $streamCodec
     * @param StreamTrack|value-of<StreamTrack> $streamTrack
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
     */
    public static function with(
        string $connectionID,
        string $from,
        string|array $to,
        AnsweringMachineDetection|string|null $answeringMachineDetection = null,
        ?AnsweringMachineDetectionConfig $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $billingGroupID = null,
        ?bool $bridgeIntent = null,
        ?bool $bridgeOnAnswer = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?ConferenceConfig $conferenceConfig = null,
        ?array $customHeaders = null,
        ?DialogflowConfig $dialogflowConfig = null,
        ?bool $enableDialogflow = null,
        ?string $fromDisplayName = null,
        ?string $linkTo = null,
        MediaEncryption|string|null $mediaEncryption = null,
        ?string $mediaName = null,
        ?string $parkAfterUnbridge = null,
        ?string $preferredCodecs = null,
        Record|string|null $record = null,
        RecordChannels|string|null $recordChannels = null,
        ?string $recordCustomFileName = null,
        RecordFormat|string|null $recordFormat = null,
        ?int $recordMaxLength = null,
        ?int $recordTimeoutSecs = null,
        RecordTrack|string|null $recordTrack = null,
        RecordTrim|string|null $recordTrim = null,
        ?bool $sendSilenceWhenIdle = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        SipTransportProtocol|string|null $sipTransportProtocol = null,
        ?SoundModifications $soundModifications = null,
        StreamBidirectionalCodec|string|null $streamBidirectionalCodec = null,
        StreamBidirectionalMode|string|null $streamBidirectionalMode = null,
        ?int $streamBidirectionalSamplingRate = null,
        StreamBidirectionalTargetLegs|string|null $streamBidirectionalTargetLegs = null,
        StreamCodec|string|null $streamCodec = null,
        ?bool $streamEstablishBeforeCallOriginate = null,
        StreamTrack|string|null $streamTrack = null,
        ?string $streamURL = null,
        ?string $superviseCallControlID = null,
        SupervisorRole|string|null $supervisorRole = null,
        ?int $timeLimitSecs = null,
        ?int $timeoutSecs = null,
        ?bool $transcription = null,
        ?TranscriptionStartRequest $transcriptionConfig = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string|null $webhookURLMethod = null,
    ): self {
        $obj = new self;

        $obj->connectionID = $connectionID;
        $obj->from = $from;
        $obj->to = $to;

        null !== $answeringMachineDetection && $obj['answeringMachineDetection'] = $answeringMachineDetection;
        null !== $answeringMachineDetectionConfig && $obj->answeringMachineDetectionConfig = $answeringMachineDetectionConfig;
        null !== $audioURL && $obj->audioURL = $audioURL;
        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $bridgeIntent && $obj->bridgeIntent = $bridgeIntent;
        null !== $bridgeOnAnswer && $obj->bridgeOnAnswer = $bridgeOnAnswer;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $conferenceConfig && $obj->conferenceConfig = $conferenceConfig;
        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $dialogflowConfig && $obj->dialogflowConfig = $dialogflowConfig;
        null !== $enableDialogflow && $obj->enableDialogflow = $enableDialogflow;
        null !== $fromDisplayName && $obj->fromDisplayName = $fromDisplayName;
        null !== $linkTo && $obj->linkTo = $linkTo;
        null !== $mediaEncryption && $obj['mediaEncryption'] = $mediaEncryption;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $parkAfterUnbridge && $obj->parkAfterUnbridge = $parkAfterUnbridge;
        null !== $preferredCodecs && $obj->preferredCodecs = $preferredCodecs;
        null !== $record && $obj['record'] = $record;
        null !== $recordChannels && $obj['recordChannels'] = $recordChannels;
        null !== $recordCustomFileName && $obj->recordCustomFileName = $recordCustomFileName;
        null !== $recordFormat && $obj['recordFormat'] = $recordFormat;
        null !== $recordMaxLength && $obj->recordMaxLength = $recordMaxLength;
        null !== $recordTimeoutSecs && $obj->recordTimeoutSecs = $recordTimeoutSecs;
        null !== $recordTrack && $obj['recordTrack'] = $recordTrack;
        null !== $recordTrim && $obj['recordTrim'] = $recordTrim;
        null !== $sendSilenceWhenIdle && $obj->sendSilenceWhenIdle = $sendSilenceWhenIdle;
        null !== $sipAuthPassword && $obj->sipAuthPassword = $sipAuthPassword;
        null !== $sipAuthUsername && $obj->sipAuthUsername = $sipAuthUsername;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;
        null !== $sipTransportProtocol && $obj['sipTransportProtocol'] = $sipTransportProtocol;
        null !== $soundModifications && $obj->soundModifications = $soundModifications;
        null !== $streamBidirectionalCodec && $obj['streamBidirectionalCodec'] = $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $obj['streamBidirectionalMode'] = $streamBidirectionalMode;
        null !== $streamBidirectionalSamplingRate && $obj->streamBidirectionalSamplingRate = $streamBidirectionalSamplingRate;
        null !== $streamBidirectionalTargetLegs && $obj['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;
        null !== $streamCodec && $obj['streamCodec'] = $streamCodec;
        null !== $streamEstablishBeforeCallOriginate && $obj->streamEstablishBeforeCallOriginate = $streamEstablishBeforeCallOriginate;
        null !== $streamTrack && $obj['streamTrack'] = $streamTrack;
        null !== $streamURL && $obj->streamURL = $streamURL;
        null !== $superviseCallControlID && $obj->superviseCallControlID = $superviseCallControlID;
        null !== $supervisorRole && $obj['supervisorRole'] = $supervisorRole;
        null !== $timeLimitSecs && $obj->timeLimitSecs = $timeLimitSecs;
        null !== $timeoutSecs && $obj->timeoutSecs = $timeoutSecs;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $transcriptionConfig && $obj->transcriptionConfig = $transcriptionConfig;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;
        null !== $webhookURLMethod && $obj['webhookURLMethod'] = $webhookURLMethod;

        return $obj;
    }

    /**
     * The ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings.
     *
     * @param string|list<string> $to
     */
    public function withTo(string|array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected.
     *
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection
     */
    public function withAnsweringMachineDetection(
        AnsweringMachineDetection|string $answeringMachineDetection
    ): self {
        $obj = clone $this;
        $obj['answeringMachineDetection'] = $answeringMachineDetection;

        return $obj;
    }

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    public function withAnsweringMachineDetectionConfig(
        AnsweringMachineDetectionConfig $answeringMachineDetectionConfig
    ): self {
        $obj = clone $this;
        $obj->answeringMachineDetectionConfig = $answeringMachineDetectionConfig;

        return $obj;
    }

    /**
     * The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audioURL = $audioURL;

        return $obj;
    }

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     */
    public function withBridgeIntent(bool $bridgeIntent): self
    {
        $obj = clone $this;
        $obj->bridgeIntent = $bridgeIntent;

        return $obj;
    }

    /**
     * Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     */
    public function withBridgeOnAnswer(bool $bridgeOnAnswer): self
    {
        $obj = clone $this;
        $obj->bridgeOnAnswer = $bridgeOnAnswer;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Optional configuration parameters to dial new participant into a conference.
     */
    public function withConferenceConfig(
        ConferenceConfig $conferenceConfig
    ): self {
        $obj = clone $this;
        $obj->conferenceConfig = $conferenceConfig;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

        return $obj;
    }

    public function withDialogflowConfig(
        DialogflowConfig $dialogflowConfig
    ): self {
        $obj = clone $this;
        $obj->dialogflowConfig = $dialogflowConfig;

        return $obj;
    }

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    public function withEnableDialogflow(bool $enableDialogflow): self
    {
        $obj = clone $this;
        $obj->enableDialogflow = $enableDialogflow;

        return $obj;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $obj = clone $this;
        $obj->fromDisplayName = $fromDisplayName;

        return $obj;
    }

    /**
     * Use another call's control id for sharing the same call session id.
     */
    public function withLinkTo(string $linkTo): self
    {
        $obj = clone $this;
        $obj->linkTo = $linkTo;

        return $obj;
    }

    /**
     * Defines whether media should be encrypted on the call.
     *
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption
     */
    public function withMediaEncryption(
        MediaEncryption|string $mediaEncryption
    ): self {
        $obj = clone $this;
        $obj['mediaEncryption'] = $mediaEncryption;

        return $obj;
    }

    /**
     * The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $obj = clone $this;
        $obj->parkAfterUnbridge = $parkAfterUnbridge;

        return $obj;
    }

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $obj = clone $this;
        $obj->preferredCodecs = $preferredCodecs;

        return $obj;
    }

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @param Record|value-of<Record> $record
     */
    public function withRecord(Record|string $record): self
    {
        $obj = clone $this;
        $obj['record'] = $record;

        return $obj;
    }

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     */
    public function withRecordChannels(
        RecordChannels|string $recordChannels
    ): self {
        $obj = clone $this;
        $obj['recordChannels'] = $recordChannels;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withRecordCustomFileName(string $recordCustomFileName): self
    {
        $obj = clone $this;
        $obj->recordCustomFileName = $recordCustomFileName;

        return $obj;
    }

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     */
    public function withRecordFormat(RecordFormat|string $recordFormat): self
    {
        $obj = clone $this;
        $obj['recordFormat'] = $recordFormat;

        return $obj;
    }

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    public function withRecordMaxLength(int $recordMaxLength): self
    {
        $obj = clone $this;
        $obj->recordMaxLength = $recordMaxLength;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->recordTimeoutSecs = $recordTimeoutSecs;

        return $obj;
    }

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     */
    public function withRecordTrack(RecordTrack|string $recordTrack): self
    {
        $obj = clone $this;
        $obj['recordTrack'] = $recordTrack;

        return $obj;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     */
    public function withRecordTrim(RecordTrim|string $recordTrim): self
    {
        $obj = clone $this;
        $obj['recordTrim'] = $recordTrim;

        return $obj;
    }

    /**
     * Generate silence RTP packets when no transmission available.
     */
    public function withSendSilenceWhenIdle(bool $sendSilenceWhenIdle): self
    {
        $obj = clone $this;
        $obj->sendSilenceWhenIdle = $sendSilenceWhenIdle;

        return $obj;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj->sipAuthPassword = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj->sipAuthUsername = $sipAuthUsername;

        return $obj;
    }

    /**
     * SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj->sipHeaders = $sipHeaders;

        return $obj;
    }

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol
     */
    public function withSipTransportProtocol(
        SipTransportProtocol|string $sipTransportProtocol
    ): self {
        $obj = clone $this;
        $obj['sipTransportProtocol'] = $sipTransportProtocol;

        return $obj;
    }

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    public function withSoundModifications(
        SoundModifications $soundModifications
    ): self {
        $obj = clone $this;
        $obj->soundModifications = $soundModifications;

        return $obj;
    }

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec
     */
    public function withStreamBidirectionalCodec(
        StreamBidirectionalCodec|string $streamBidirectionalCodec
    ): self {
        $obj = clone $this;
        $obj['streamBidirectionalCodec'] = $streamBidirectionalCodec;

        return $obj;
    }

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode
     */
    public function withStreamBidirectionalMode(
        StreamBidirectionalMode|string $streamBidirectionalMode
    ): self {
        $obj = clone $this;
        $obj['streamBidirectionalMode'] = $streamBidirectionalMode;

        return $obj;
    }

    /**
     * Audio sampling rate.
     *
     * @param 8000|16000|22050|24000|48000 $streamBidirectionalSamplingRate
     */
    public function withStreamBidirectionalSamplingRate(
        int $streamBidirectionalSamplingRate
    ): self {
        $obj = clone $this;
        $obj->streamBidirectionalSamplingRate = $streamBidirectionalSamplingRate;

        return $obj;
    }

    /**
     * Specifies which call legs should receive the bidirectional stream audio.
     *
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs
     */
    public function withStreamBidirectionalTargetLegs(
        StreamBidirectionalTargetLegs|string $streamBidirectionalTargetLegs
    ): self {
        $obj = clone $this;
        $obj['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;

        return $obj;
    }

    /**
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     *
     * @param StreamCodec|value-of<StreamCodec> $streamCodec
     */
    public function withStreamCodec(StreamCodec|string $streamCodec): self
    {
        $obj = clone $this;
        $obj['streamCodec'] = $streamCodec;

        return $obj;
    }

    /**
     * Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     */
    public function withStreamEstablishBeforeCallOriginate(
        bool $streamEstablishBeforeCallOriginate
    ): self {
        $obj = clone $this;
        $obj->streamEstablishBeforeCallOriginate = $streamEstablishBeforeCallOriginate;

        return $obj;
    }

    /**
     * Specifies which track should be streamed.
     *
     * @param StreamTrack|value-of<StreamTrack> $streamTrack
     */
    public function withStreamTrack(StreamTrack|string $streamTrack): self
    {
        $obj = clone $this;
        $obj['streamTrack'] = $streamTrack;

        return $obj;
    }

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    public function withStreamURL(string $streamURL): self
    {
        $obj = clone $this;
        $obj->streamURL = $streamURL;

        return $obj;
    }

    /**
     * The call leg which will be supervised by the new call.
     */
    public function withSuperviseCallControlID(
        string $superviseCallControlID
    ): self {
        $obj = clone $this;
        $obj->superviseCallControlID = $superviseCallControlID;

        return $obj;
    }

    /**
     * The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
     *
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     */
    public function withSupervisorRole(
        SupervisorRole|string $supervisorRole
    ): self {
        $obj = clone $this;
        $obj['supervisorRole'] = $supervisorRole;

        return $obj;
    }

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    public function withTimeLimitSecs(int $timeLimitSecs): self
    {
        $obj = clone $this;
        $obj->timeLimitSecs = $timeLimitSecs;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeoutSecs = $timeoutSecs;

        return $obj;
    }

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    public function withTranscription(bool $transcription): self
    {
        $obj = clone $this;
        $obj->transcription = $transcription;

        return $obj;
    }

    public function withTranscriptionConfig(
        TranscriptionStartRequest $transcriptionConfig
    ): self {
        $obj = clone $this;
        $obj->transcriptionConfig = $transcriptionConfig;

        return $obj;
    }

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
     */
    public function withWebhookURLMethod(
        WebhookURLMethod|string $webhookURLMethod
    ): self {
        $obj = clone $this;
        $obj['webhookURLMethod'] = $webhookURLMethod;

        return $obj;
    }
}
