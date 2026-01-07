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
use Telnyx\Calls\CallDialParams\SipRegion;
use Telnyx\Calls\CallDialParams\SipTransportProtocol;
use Telnyx\Calls\CallDialParams\StreamTrack;
use Telnyx\Calls\CallDialParams\SupervisorRole;
use Telnyx\Calls\CallDialParams\To;
use Telnyx\Calls\CallDialParams\WebhookURLMethod;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
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
 * @see Telnyx\Services\CallsService::dial()
 *
 * @phpstan-import-type ToVariants from \Telnyx\Calls\CallDialParams\To
 * @phpstan-import-type ToShape from \Telnyx\Calls\CallDialParams\To
 * @phpstan-import-type AnsweringMachineDetectionConfigShape from \Telnyx\Calls\CallDialParams\AnsweringMachineDetectionConfig
 * @phpstan-import-type ConferenceConfigShape from \Telnyx\Calls\CallDialParams\ConferenceConfig
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 * @phpstan-import-type DialogflowConfigShape from \Telnyx\Calls\DialogflowConfig
 * @phpstan-import-type SipHeaderShape from \Telnyx\Calls\SipHeader
 * @phpstan-import-type SoundModificationsShape from \Telnyx\Calls\SoundModifications
 * @phpstan-import-type TranscriptionStartRequestShape from \Telnyx\Calls\Actions\TranscriptionStartRequest
 *
 * @phpstan-type CallDialParamsShape = array{
 *   connectionID: string,
 *   from: string,
 *   to: ToShape,
 *   answeringMachineDetection?: null|AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
 *   answeringMachineDetectionConfig?: null|AnsweringMachineDetectionConfig|AnsweringMachineDetectionConfigShape,
 *   audioURL?: string|null,
 *   billingGroupID?: string|null,
 *   bridgeIntent?: bool|null,
 *   bridgeOnAnswer?: bool|null,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   conferenceConfig?: null|ConferenceConfig|ConferenceConfigShape,
 *   customHeaders?: list<CustomSipHeader|CustomSipHeaderShape>|null,
 *   dialogflowConfig?: null|DialogflowConfig|DialogflowConfigShape,
 *   enableDialogflow?: bool|null,
 *   fromDisplayName?: string|null,
 *   linkTo?: string|null,
 *   mediaEncryption?: null|MediaEncryption|value-of<MediaEncryption>,
 *   mediaName?: string|null,
 *   parkAfterUnbridge?: string|null,
 *   preferredCodecs?: string|null,
 *   record?: null|Record|value-of<Record>,
 *   recordChannels?: null|RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string|null,
 *   recordFormat?: null|RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int|null,
 *   recordTimeoutSecs?: int|null,
 *   recordTrack?: null|RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: null|RecordTrim|value-of<RecordTrim>,
 *   sendSilenceWhenIdle?: bool|null,
 *   sipAuthPassword?: string|null,
 *   sipAuthUsername?: string|null,
 *   sipHeaders?: list<SipHeader|SipHeaderShape>|null,
 *   sipRegion?: null|SipRegion|value-of<SipRegion>,
 *   sipTransportProtocol?: null|SipTransportProtocol|value-of<SipTransportProtocol>,
 *   soundModifications?: null|SoundModifications|SoundModificationsShape,
 *   streamBidirectionalCodec?: null|StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: null|StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalSamplingRate?: null|StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate>,
 *   streamBidirectionalTargetLegs?: null|StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: null|StreamCodec|value-of<StreamCodec>,
 *   streamEstablishBeforeCallOriginate?: bool|null,
 *   streamTrack?: null|StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string|null,
 *   superviseCallControlID?: string|null,
 *   supervisorRole?: null|SupervisorRole|value-of<SupervisorRole>,
 *   timeLimitSecs?: int|null,
 *   timeoutSecs?: int|null,
 *   transcription?: bool|null,
 *   transcriptionConfig?: null|TranscriptionStartRequest|TranscriptionStartRequestShape,
 *   webhookURL?: string|null,
 *   webhookURLMethod?: null|WebhookURLMethod|value-of<WebhookURLMethod>,
 * }
 */
final class CallDialParams implements BaseModel
{
    /** @use SdkModel<CallDialParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination.
     */
    #[Required('connection_id')]
    public string $connectionID;

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format.
     */
    #[Required]
    public string $from;

    /**
     * The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings.
     *
     * @var ToVariants $to
     */
    #[Required(union: To::class)]
    public string|array $to;

    /**
     * Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected.
     *
     * @var value-of<AnsweringMachineDetection>|null $answeringMachineDetection
     */
    #[Optional(
        'answering_machine_detection',
        enum: AnsweringMachineDetection::class
    )]
    public ?string $answeringMachineDetection;

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    #[Optional('answering_machine_detection_config')]
    public ?AnsweringMachineDetectionConfig $answeringMachineDetectionConfig;

    /**
     * The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Optional('audio_url')]
    public ?string $audioURL;

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     */
    #[Optional('bridge_intent')]
    public ?bool $bridgeIntent;

    /**
     * Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     */
    #[Optional('bridge_on_answer')]
    public ?bool $bridgeOnAnswer;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Optional configuration parameters to dial new participant into a conference.
     */
    #[Optional('conference_config')]
    public ?ConferenceConfig $conferenceConfig;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

    #[Optional('dialogflow_config')]
    public ?DialogflowConfig $dialogflowConfig;

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    #[Optional('enable_dialogflow')]
    public ?bool $enableDialogflow;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    #[Optional('from_display_name')]
    public ?string $fromDisplayName;

    /**
     * Use another call's control id for sharing the same call session id.
     */
    #[Optional('link_to')]
    public ?string $linkTo;

    /**
     * Defines whether media should be encrypted on the call.
     *
     * @var value-of<MediaEncryption>|null $mediaEncryption
     */
    #[Optional('media_encryption', enum: MediaEncryption::class)]
    public ?string $mediaEncryption;

    /**
     * The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     */
    #[Optional('park_after_unbridge')]
    public ?string $parkAfterUnbridge;

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     */
    #[Optional('preferred_codecs')]
    public ?string $preferredCodecs;

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @var value-of<Record>|null $record
     */
    #[Optional(enum: Record::class)]
    public ?string $record;

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @var value-of<RecordChannels>|null $recordChannels
     */
    #[Optional('record_channels', enum: RecordChannels::class)]
    public ?string $recordChannels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Optional('record_custom_file_name')]
    public ?string $recordCustomFileName;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $recordFormat
     */
    #[Optional('record_format', enum: RecordFormat::class)]
    public ?string $recordFormat;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Optional('record_max_length')]
    public ?int $recordMaxLength;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional('record_timeout_secs')]
    public ?int $recordTimeoutSecs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $recordTrack
     */
    #[Optional('record_track', enum: RecordTrack::class)]
    public ?string $recordTrack;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $recordTrim
     */
    #[Optional('record_trim', enum: RecordTrim::class)]
    public ?string $recordTrim;

    /**
     * Generate silence RTP packets when no transmission available.
     */
    #[Optional('send_silence_when_idle')]
    public ?bool $sendSilenceWhenIdle;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Optional('sip_auth_password')]
    public ?string $sipAuthPassword;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Optional('sip_auth_username')]
    public ?string $sipAuthUsername;

    /**
     * SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Optional('sip_headers', list: SipHeader::class)]
    public ?array $sipHeaders;

    /**
     * Defines the SIP region to be used for the call.
     *
     * @var value-of<SipRegion>|null $sipRegion
     */
    #[Optional('sip_region', enum: SipRegion::class)]
    public ?string $sipRegion;

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @var value-of<SipTransportProtocol>|null $sipTransportProtocol
     */
    #[Optional('sip_transport_protocol', enum: SipTransportProtocol::class)]
    public ?string $sipTransportProtocol;

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    #[Optional('sound_modifications')]
    public ?SoundModifications $soundModifications;

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @var value-of<StreamBidirectionalCodec>|null $streamBidirectionalCodec
     */
    #[Optional(
        'stream_bidirectional_codec',
        enum: StreamBidirectionalCodec::class
    )]
    public ?string $streamBidirectionalCodec;

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @var value-of<StreamBidirectionalMode>|null $streamBidirectionalMode
     */
    #[Optional('stream_bidirectional_mode', enum: StreamBidirectionalMode::class)]
    public ?string $streamBidirectionalMode;

    /**
     * Audio sampling rate.
     *
     * @var value-of<StreamBidirectionalSamplingRate>|null $streamBidirectionalSamplingRate
     */
    #[Optional(
        'stream_bidirectional_sampling_rate',
        enum: StreamBidirectionalSamplingRate::class,
    )]
    public ?int $streamBidirectionalSamplingRate;

    /**
     * Specifies which call legs should receive the bidirectional stream audio.
     *
     * @var value-of<StreamBidirectionalTargetLegs>|null $streamBidirectionalTargetLegs
     */
    #[Optional(
        'stream_bidirectional_target_legs',
        enum: StreamBidirectionalTargetLegs::class,
    )]
    public ?string $streamBidirectionalTargetLegs;

    /**
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     *
     * @var value-of<StreamCodec>|null $streamCodec
     */
    #[Optional('stream_codec', enum: StreamCodec::class)]
    public ?string $streamCodec;

    /**
     * Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     */
    #[Optional('stream_establish_before_call_originate')]
    public ?bool $streamEstablishBeforeCallOriginate;

    /**
     * Specifies which track should be streamed.
     *
     * @var value-of<StreamTrack>|null $streamTrack
     */
    #[Optional('stream_track', enum: StreamTrack::class)]
    public ?string $streamTrack;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Optional('stream_url')]
    public ?string $streamURL;

    /**
     * The call leg which will be supervised by the new call.
     */
    #[Optional('supervise_call_control_id')]
    public ?string $superviseCallControlID;

    /**
     * The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
     *
     * @var value-of<SupervisorRole>|null $supervisorRole
     */
    #[Optional('supervisor_role', enum: SupervisorRole::class)]
    public ?string $supervisorRole;

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    #[Optional('time_limit_secs')]
    public ?int $timeLimitSecs;

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    #[Optional]
    public ?bool $transcription;

    #[Optional('transcription_config')]
    public ?TranscriptionStartRequest $transcriptionConfig;

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @var value-of<WebhookURLMethod>|null $webhookURLMethod
     */
    #[Optional('webhook_url_method', enum: WebhookURLMethod::class)]
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
     * @param ToShape $to
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection>|null $answeringMachineDetection
     * @param AnsweringMachineDetectionConfig|AnsweringMachineDetectionConfigShape|null $answeringMachineDetectionConfig
     * @param ConferenceConfig|ConferenceConfigShape|null $conferenceConfig
     * @param list<CustomSipHeader|CustomSipHeaderShape>|null $customHeaders
     * @param DialogflowConfig|DialogflowConfigShape|null $dialogflowConfig
     * @param MediaEncryption|value-of<MediaEncryption>|null $mediaEncryption
     * @param Record|value-of<Record>|null $record
     * @param RecordChannels|value-of<RecordChannels>|null $recordChannels
     * @param RecordFormat|value-of<RecordFormat>|null $recordFormat
     * @param RecordTrack|value-of<RecordTrack>|null $recordTrack
     * @param RecordTrim|value-of<RecordTrim>|null $recordTrim
     * @param list<SipHeader|SipHeaderShape>|null $sipHeaders
     * @param SipRegion|value-of<SipRegion>|null $sipRegion
     * @param SipTransportProtocol|value-of<SipTransportProtocol>|null $sipTransportProtocol
     * @param SoundModifications|SoundModificationsShape|null $soundModifications
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>|null $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode>|null $streamBidirectionalMode
     * @param StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate>|null $streamBidirectionalSamplingRate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>|null $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec>|null $streamCodec
     * @param StreamTrack|value-of<StreamTrack>|null $streamTrack
     * @param SupervisorRole|value-of<SupervisorRole>|null $supervisorRole
     * @param TranscriptionStartRequest|TranscriptionStartRequestShape|null $transcriptionConfig
     * @param WebhookURLMethod|value-of<WebhookURLMethod>|null $webhookURLMethod
     */
    public static function with(
        string $connectionID,
        string $from,
        string|array $to,
        AnsweringMachineDetection|string|null $answeringMachineDetection = null,
        AnsweringMachineDetectionConfig|array|null $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $billingGroupID = null,
        ?bool $bridgeIntent = null,
        ?bool $bridgeOnAnswer = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ConferenceConfig|array|null $conferenceConfig = null,
        ?array $customHeaders = null,
        DialogflowConfig|array|null $dialogflowConfig = null,
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
        SipRegion|string|null $sipRegion = null,
        SipTransportProtocol|string|null $sipTransportProtocol = null,
        SoundModifications|array|null $soundModifications = null,
        StreamBidirectionalCodec|string|null $streamBidirectionalCodec = null,
        StreamBidirectionalMode|string|null $streamBidirectionalMode = null,
        StreamBidirectionalSamplingRate|int|null $streamBidirectionalSamplingRate = null,
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
        TranscriptionStartRequest|array|null $transcriptionConfig = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string|null $webhookURLMethod = null,
    ): self {
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['from'] = $from;
        $self['to'] = $to;

        null !== $answeringMachineDetection && $self['answeringMachineDetection'] = $answeringMachineDetection;
        null !== $answeringMachineDetectionConfig && $self['answeringMachineDetectionConfig'] = $answeringMachineDetectionConfig;
        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $bridgeIntent && $self['bridgeIntent'] = $bridgeIntent;
        null !== $bridgeOnAnswer && $self['bridgeOnAnswer'] = $bridgeOnAnswer;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $conferenceConfig && $self['conferenceConfig'] = $conferenceConfig;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $dialogflowConfig && $self['dialogflowConfig'] = $dialogflowConfig;
        null !== $enableDialogflow && $self['enableDialogflow'] = $enableDialogflow;
        null !== $fromDisplayName && $self['fromDisplayName'] = $fromDisplayName;
        null !== $linkTo && $self['linkTo'] = $linkTo;
        null !== $mediaEncryption && $self['mediaEncryption'] = $mediaEncryption;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $parkAfterUnbridge && $self['parkAfterUnbridge'] = $parkAfterUnbridge;
        null !== $preferredCodecs && $self['preferredCodecs'] = $preferredCodecs;
        null !== $record && $self['record'] = $record;
        null !== $recordChannels && $self['recordChannels'] = $recordChannels;
        null !== $recordCustomFileName && $self['recordCustomFileName'] = $recordCustomFileName;
        null !== $recordFormat && $self['recordFormat'] = $recordFormat;
        null !== $recordMaxLength && $self['recordMaxLength'] = $recordMaxLength;
        null !== $recordTimeoutSecs && $self['recordTimeoutSecs'] = $recordTimeoutSecs;
        null !== $recordTrack && $self['recordTrack'] = $recordTrack;
        null !== $recordTrim && $self['recordTrim'] = $recordTrim;
        null !== $sendSilenceWhenIdle && $self['sendSilenceWhenIdle'] = $sendSilenceWhenIdle;
        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;
        null !== $sipHeaders && $self['sipHeaders'] = $sipHeaders;
        null !== $sipRegion && $self['sipRegion'] = $sipRegion;
        null !== $sipTransportProtocol && $self['sipTransportProtocol'] = $sipTransportProtocol;
        null !== $soundModifications && $self['soundModifications'] = $soundModifications;
        null !== $streamBidirectionalCodec && $self['streamBidirectionalCodec'] = $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $self['streamBidirectionalMode'] = $streamBidirectionalMode;
        null !== $streamBidirectionalSamplingRate && $self['streamBidirectionalSamplingRate'] = $streamBidirectionalSamplingRate;
        null !== $streamBidirectionalTargetLegs && $self['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;
        null !== $streamCodec && $self['streamCodec'] = $streamCodec;
        null !== $streamEstablishBeforeCallOriginate && $self['streamEstablishBeforeCallOriginate'] = $streamEstablishBeforeCallOriginate;
        null !== $streamTrack && $self['streamTrack'] = $streamTrack;
        null !== $streamURL && $self['streamURL'] = $streamURL;
        null !== $superviseCallControlID && $self['superviseCallControlID'] = $superviseCallControlID;
        null !== $supervisorRole && $self['supervisorRole'] = $supervisorRole;
        null !== $timeLimitSecs && $self['timeLimitSecs'] = $timeLimitSecs;
        null !== $timeoutSecs && $self['timeoutSecs'] = $timeoutSecs;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $transcriptionConfig && $self['transcriptionConfig'] = $transcriptionConfig;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $webhookURLMethod && $self['webhookURLMethod'] = $webhookURLMethod;

        return $self;
    }

    /**
     * The ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings.
     *
     * @param ToShape $to
     */
    public function withTo(string|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Enables Answering Machine Detection. Telnyx offers Premium and Standard detections. With Premium detection, when a call is answered, Telnyx runs real-time detection and sends a `call.machine.premium.detection.ended` webhook with one of the following results: `human_residence`, `human_business`, `machine`, `silence` or `fax_detected`. If we detect a beep, we also send a `call.machine.premium.greeting.ended` webhook with the result of `beep_detected`. If we detect a beep before `call.machine.premium.detection.ended` we only send `call.machine.premium.greeting.ended`, and if we detect a beep after `call.machine.premium.detection.ended`, we send both webhooks. With Standard detection, when a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If `greeting_end` or `detect_words` is used and a `machine` is detected, you will receive another `call.machine.greeting.ended` webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive `call.machine.greeting.ended` if a beep is detected.
     *
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection
     */
    public function withAnsweringMachineDetection(
        AnsweringMachineDetection|string $answeringMachineDetection
    ): self {
        $self = clone $this;
        $self['answeringMachineDetection'] = $answeringMachineDetection;

        return $self;
    }

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     *
     * @param AnsweringMachineDetectionConfig|AnsweringMachineDetectionConfigShape $answeringMachineDetectionConfig
     */
    public function withAnsweringMachineDetectionConfig(
        AnsweringMachineDetectionConfig|array $answeringMachineDetectionConfig
    ): self {
        $self = clone $this;
        $self['answeringMachineDetectionConfig'] = $answeringMachineDetectionConfig;

        return $self;
    }

    /**
     * The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

        return $self;
    }

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     */
    public function withBridgeIntent(bool $bridgeIntent): self
    {
        $self = clone $this;
        $self['bridgeIntent'] = $bridgeIntent;

        return $self;
    }

    /**
     * Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     */
    public function withBridgeOnAnswer(bool $bridgeOnAnswer): self
    {
        $self = clone $this;
        $self['bridgeOnAnswer'] = $bridgeOnAnswer;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Optional configuration parameters to dial new participant into a conference.
     *
     * @param ConferenceConfig|ConferenceConfigShape $conferenceConfig
     */
    public function withConferenceConfig(
        ConferenceConfig|array $conferenceConfig
    ): self {
        $self = clone $this;
        $self['conferenceConfig'] = $conferenceConfig;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeader|CustomSipHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * @param DialogflowConfig|DialogflowConfigShape $dialogflowConfig
     */
    public function withDialogflowConfig(
        DialogflowConfig|array $dialogflowConfig
    ): self {
        $self = clone $this;
        $self['dialogflowConfig'] = $dialogflowConfig;

        return $self;
    }

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    public function withEnableDialogflow(bool $enableDialogflow): self
    {
        $self = clone $this;
        $self['enableDialogflow'] = $enableDialogflow;

        return $self;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $self = clone $this;
        $self['fromDisplayName'] = $fromDisplayName;

        return $self;
    }

    /**
     * Use another call's control id for sharing the same call session id.
     */
    public function withLinkTo(string $linkTo): self
    {
        $self = clone $this;
        $self['linkTo'] = $linkTo;

        return $self;
    }

    /**
     * Defines whether media should be encrypted on the call.
     *
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption
     */
    public function withMediaEncryption(
        MediaEncryption|string $mediaEncryption
    ): self {
        $self = clone $this;
        $self['mediaEncryption'] = $mediaEncryption;

        return $self;
    }

    /**
     * The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $self = clone $this;
        $self['parkAfterUnbridge'] = $parkAfterUnbridge;

        return $self;
    }

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $self = clone $this;
        $self['preferredCodecs'] = $preferredCodecs;

        return $self;
    }

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @param Record|value-of<Record> $record
     */
    public function withRecord(Record|string $record): self
    {
        $self = clone $this;
        $self['record'] = $record;

        return $self;
    }

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     */
    public function withRecordChannels(
        RecordChannels|string $recordChannels
    ): self {
        $self = clone $this;
        $self['recordChannels'] = $recordChannels;

        return $self;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withRecordCustomFileName(string $recordCustomFileName): self
    {
        $self = clone $this;
        $self['recordCustomFileName'] = $recordCustomFileName;

        return $self;
    }

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     */
    public function withRecordFormat(RecordFormat|string $recordFormat): self
    {
        $self = clone $this;
        $self['recordFormat'] = $recordFormat;

        return $self;
    }

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    public function withRecordMaxLength(int $recordMaxLength): self
    {
        $self = clone $this;
        $self['recordMaxLength'] = $recordMaxLength;

        return $self;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $self = clone $this;
        $self['recordTimeoutSecs'] = $recordTimeoutSecs;

        return $self;
    }

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     */
    public function withRecordTrack(RecordTrack|string $recordTrack): self
    {
        $self = clone $this;
        $self['recordTrack'] = $recordTrack;

        return $self;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     */
    public function withRecordTrim(RecordTrim|string $recordTrim): self
    {
        $self = clone $this;
        $self['recordTrim'] = $recordTrim;

        return $self;
    }

    /**
     * Generate silence RTP packets when no transmission available.
     */
    public function withSendSilenceWhenIdle(bool $sendSilenceWhenIdle): self
    {
        $self = clone $this;
        $self['sendSilenceWhenIdle'] = $sendSilenceWhenIdle;

        return $self;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $self = clone $this;
        $self['sipAuthPassword'] = $sipAuthPassword;

        return $self;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $self = clone $this;
        $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }

    /**
     * SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader|SipHeaderShape> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $self = clone $this;
        $self['sipHeaders'] = $sipHeaders;

        return $self;
    }

    /**
     * Defines the SIP region to be used for the call.
     *
     * @param SipRegion|value-of<SipRegion> $sipRegion
     */
    public function withSipRegion(SipRegion|string $sipRegion): self
    {
        $self = clone $this;
        $self['sipRegion'] = $sipRegion;

        return $self;
    }

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol
     */
    public function withSipTransportProtocol(
        SipTransportProtocol|string $sipTransportProtocol
    ): self {
        $self = clone $this;
        $self['sipTransportProtocol'] = $sipTransportProtocol;

        return $self;
    }

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     *
     * @param SoundModifications|SoundModificationsShape $soundModifications
     */
    public function withSoundModifications(
        SoundModifications|array $soundModifications
    ): self {
        $self = clone $this;
        $self['soundModifications'] = $soundModifications;

        return $self;
    }

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec
     */
    public function withStreamBidirectionalCodec(
        StreamBidirectionalCodec|string $streamBidirectionalCodec
    ): self {
        $self = clone $this;
        $self['streamBidirectionalCodec'] = $streamBidirectionalCodec;

        return $self;
    }

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode
     */
    public function withStreamBidirectionalMode(
        StreamBidirectionalMode|string $streamBidirectionalMode
    ): self {
        $self = clone $this;
        $self['streamBidirectionalMode'] = $streamBidirectionalMode;

        return $self;
    }

    /**
     * Audio sampling rate.
     *
     * @param StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate> $streamBidirectionalSamplingRate
     */
    public function withStreamBidirectionalSamplingRate(
        StreamBidirectionalSamplingRate|int $streamBidirectionalSamplingRate
    ): self {
        $self = clone $this;
        $self['streamBidirectionalSamplingRate'] = $streamBidirectionalSamplingRate;

        return $self;
    }

    /**
     * Specifies which call legs should receive the bidirectional stream audio.
     *
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs
     */
    public function withStreamBidirectionalTargetLegs(
        StreamBidirectionalTargetLegs|string $streamBidirectionalTargetLegs
    ): self {
        $self = clone $this;
        $self['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;

        return $self;
    }

    /**
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     *
     * @param StreamCodec|value-of<StreamCodec> $streamCodec
     */
    public function withStreamCodec(StreamCodec|string $streamCodec): self
    {
        $self = clone $this;
        $self['streamCodec'] = $streamCodec;

        return $self;
    }

    /**
     * Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     */
    public function withStreamEstablishBeforeCallOriginate(
        bool $streamEstablishBeforeCallOriginate
    ): self {
        $self = clone $this;
        $self['streamEstablishBeforeCallOriginate'] = $streamEstablishBeforeCallOriginate;

        return $self;
    }

    /**
     * Specifies which track should be streamed.
     *
     * @param StreamTrack|value-of<StreamTrack> $streamTrack
     */
    public function withStreamTrack(StreamTrack|string $streamTrack): self
    {
        $self = clone $this;
        $self['streamTrack'] = $streamTrack;

        return $self;
    }

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    public function withStreamURL(string $streamURL): self
    {
        $self = clone $this;
        $self['streamURL'] = $streamURL;

        return $self;
    }

    /**
     * The call leg which will be supervised by the new call.
     */
    public function withSuperviseCallControlID(
        string $superviseCallControlID
    ): self {
        $self = clone $this;
        $self['superviseCallControlID'] = $superviseCallControlID;

        return $self;
    }

    /**
     * The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
     *
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     */
    public function withSupervisorRole(
        SupervisorRole|string $supervisorRole
    ): self {
        $self = clone $this;
        $self['supervisorRole'] = $supervisorRole;

        return $self;
    }

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    public function withTimeLimitSecs(int $timeLimitSecs): self
    {
        $self = clone $this;
        $self['timeLimitSecs'] = $timeLimitSecs;

        return $self;
    }

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    public function withTranscription(bool $transcription): self
    {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * @param TranscriptionStartRequest|TranscriptionStartRequestShape $transcriptionConfig
     */
    public function withTranscriptionConfig(
        TranscriptionStartRequest|array $transcriptionConfig
    ): self {
        $self = clone $this;
        $self['transcriptionConfig'] = $transcriptionConfig;

        return $self;
    }

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
     */
    public function withWebhookURLMethod(
        WebhookURLMethod|string $webhookURLMethod
    ): self {
        $self = clone $this;
        $self['webhookURLMethod'] = $webhookURLMethod;

        return $self;
    }
}
