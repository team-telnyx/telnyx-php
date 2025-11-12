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
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\CallsService::dial()
 *
 * @phpstan-type CallDialParamsShape = array{
 *   connection_id: string,
 *   from: string,
 *   to: string|list<string>,
 *   answering_machine_detection?: AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
 *   answering_machine_detection_config?: AnsweringMachineDetectionConfig,
 *   audio_url?: string,
 *   billing_group_id?: string,
 *   bridge_intent?: bool,
 *   bridge_on_answer?: bool,
 *   client_state?: string,
 *   command_id?: string,
 *   conference_config?: ConferenceConfig,
 *   custom_headers?: list<CustomSipHeader>,
 *   dialogflow_config?: DialogflowConfig,
 *   enable_dialogflow?: bool,
 *   from_display_name?: string,
 *   link_to?: string,
 *   media_encryption?: MediaEncryption|value-of<MediaEncryption>,
 *   media_name?: string,
 *   park_after_unbridge?: string,
 *   preferred_codecs?: string,
 *   record?: Record|value-of<Record>,
 *   record_channels?: RecordChannels|value-of<RecordChannels>,
 *   record_custom_file_name?: string,
 *   record_format?: RecordFormat|value-of<RecordFormat>,
 *   record_max_length?: int,
 *   record_timeout_secs?: int,
 *   record_track?: RecordTrack|value-of<RecordTrack>,
 *   record_trim?: RecordTrim|value-of<RecordTrim>,
 *   send_silence_when_idle?: bool,
 *   sip_auth_password?: string,
 *   sip_auth_username?: string,
 *   sip_headers?: list<SipHeader>,
 *   sip_region?: SipRegion|value-of<SipRegion>,
 *   sip_transport_protocol?: SipTransportProtocol|value-of<SipTransportProtocol>,
 *   sound_modifications?: SoundModifications,
 *   stream_bidirectional_codec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   stream_bidirectional_mode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   stream_bidirectional_sampling_rate?: 8000|16000|22050|24000|48000,
 *   stream_bidirectional_target_legs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   stream_codec?: StreamCodec|value-of<StreamCodec>,
 *   stream_establish_before_call_originate?: bool,
 *   stream_track?: StreamTrack|value-of<StreamTrack>,
 *   stream_url?: string,
 *   supervise_call_control_id?: string,
 *   supervisor_role?: SupervisorRole|value-of<SupervisorRole>,
 *   time_limit_secs?: int,
 *   timeout_secs?: int,
 *   transcription?: bool,
 *   transcription_config?: TranscriptionStartRequest,
 *   webhook_url?: string,
 *   webhook_url_method?: WebhookURLMethod|value-of<WebhookURLMethod>,
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
    #[Api]
    public string $connection_id;

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
     * @var value-of<AnsweringMachineDetection>|null $answering_machine_detection
     */
    #[Api(enum: AnsweringMachineDetection::class, optional: true)]
    public ?string $answering_machine_detection;

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    #[Api(optional: true)]
    public ?AnsweringMachineDetectionConfig $answering_machine_detection_config;

    /**
     * The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Api(optional: true)]
    public ?string $audio_url;

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    #[Api(optional: true)]
    public ?string $billing_group_id;

    /**
     * Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     */
    #[Api(optional: true)]
    public ?bool $bridge_intent;

    /**
     * Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     */
    #[Api(optional: true)]
    public ?bool $bridge_on_answer;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Optional configuration parameters to dial new participant into a conference.
     */
    #[Api(optional: true)]
    public ?ConferenceConfig $conference_config;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $custom_headers
     */
    #[Api(list: CustomSipHeader::class, optional: true)]
    public ?array $custom_headers;

    #[Api(optional: true)]
    public ?DialogflowConfig $dialogflow_config;

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    #[Api(optional: true)]
    public ?bool $enable_dialogflow;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    #[Api(optional: true)]
    public ?string $from_display_name;

    /**
     * Use another call's control id for sharing the same call session id.
     */
    #[Api(optional: true)]
    public ?string $link_to;

    /**
     * Defines whether media should be encrypted on the call.
     *
     * @var value-of<MediaEncryption>|null $media_encryption
     */
    #[Api(enum: MediaEncryption::class, optional: true)]
    public ?string $media_encryption;

    /**
     * The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     */
    #[Api(optional: true)]
    public ?string $park_after_unbridge;

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     */
    #[Api(optional: true)]
    public ?string $preferred_codecs;

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
     * @var value-of<RecordChannels>|null $record_channels
     */
    #[Api(enum: RecordChannels::class, optional: true)]
    public ?string $record_channels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api(optional: true)]
    public ?string $record_custom_file_name;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $record_format
     */
    #[Api(enum: RecordFormat::class, optional: true)]
    public ?string $record_format;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $record_max_length;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $record_timeout_secs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $record_track
     */
    #[Api(enum: RecordTrack::class, optional: true)]
    public ?string $record_track;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $record_trim
     */
    #[Api(enum: RecordTrim::class, optional: true)]
    public ?string $record_trim;

    /**
     * Generate silence RTP packets when no transmission available.
     */
    #[Api(optional: true)]
    public ?bool $send_silence_when_idle;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Api(optional: true)]
    public ?string $sip_auth_password;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Api(optional: true)]
    public ?string $sip_auth_username;

    /**
     * SIP headers to be added to the SIP INVITE request. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sip_headers
     */
    #[Api(list: SipHeader::class, optional: true)]
    public ?array $sip_headers;

    /**
     * Defines the SIP region to be used for the call.
     *
     * @var value-of<SipRegion>|null $sip_region
     */
    #[Api(enum: SipRegion::class, optional: true)]
    public ?string $sip_region;

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @var value-of<SipTransportProtocol>|null $sip_transport_protocol
     */
    #[Api(enum: SipTransportProtocol::class, optional: true)]
    public ?string $sip_transport_protocol;

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    #[Api(optional: true)]
    public ?SoundModifications $sound_modifications;

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @var value-of<StreamBidirectionalCodec>|null $stream_bidirectional_codec
     */
    #[Api(enum: StreamBidirectionalCodec::class, optional: true)]
    public ?string $stream_bidirectional_codec;

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @var value-of<StreamBidirectionalMode>|null $stream_bidirectional_mode
     */
    #[Api(enum: StreamBidirectionalMode::class, optional: true)]
    public ?string $stream_bidirectional_mode;

    /**
     * Audio sampling rate.
     *
     * @var 8000|16000|22050|24000|48000|null $stream_bidirectional_sampling_rate
     */
    #[Api(enum: StreamBidirectionalSamplingRate::class, optional: true)]
    public ?int $stream_bidirectional_sampling_rate;

    /**
     * Specifies which call legs should receive the bidirectional stream audio.
     *
     * @var value-of<StreamBidirectionalTargetLegs>|null $stream_bidirectional_target_legs
     */
    #[Api(enum: StreamBidirectionalTargetLegs::class, optional: true)]
    public ?string $stream_bidirectional_target_legs;

    /**
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     *
     * @var value-of<StreamCodec>|null $stream_codec
     */
    #[Api(enum: StreamCodec::class, optional: true)]
    public ?string $stream_codec;

    /**
     * Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     */
    #[Api(optional: true)]
    public ?bool $stream_establish_before_call_originate;

    /**
     * Specifies which track should be streamed.
     *
     * @var value-of<StreamTrack>|null $stream_track
     */
    #[Api(enum: StreamTrack::class, optional: true)]
    public ?string $stream_track;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Api(optional: true)]
    public ?string $stream_url;

    /**
     * The call leg which will be supervised by the new call.
     */
    #[Api(optional: true)]
    public ?string $supervise_call_control_id;

    /**
     * The role of the supervisor call. 'barge' means that supervisor call hears and is being heard by both ends of the call (caller & callee). 'whisper' means that only supervised_call_control_id hears supervisor but supervisor can hear everything. 'monitor' means that nobody can hear supervisor call, but supervisor can hear everything on the call.
     *
     * @var value-of<SupervisorRole>|null $supervisor_role
     */
    #[Api(enum: SupervisorRole::class, optional: true)]
    public ?string $supervisor_role;

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    #[Api(optional: true)]
    public ?int $time_limit_secs;

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    #[Api(optional: true)]
    public ?int $timeout_secs;

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    #[Api(optional: true)]
    public ?bool $transcription;

    #[Api(optional: true)]
    public ?TranscriptionStartRequest $transcription_config;

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @var value-of<WebhookURLMethod>|null $webhook_url_method
     */
    #[Api(enum: WebhookURLMethod::class, optional: true)]
    public ?string $webhook_url_method;

    /**
     * `new CallDialParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallDialParams::with(connection_id: ..., from: ..., to: ...)
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
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answering_machine_detection
     * @param list<CustomSipHeader> $custom_headers
     * @param MediaEncryption|value-of<MediaEncryption> $media_encryption
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $record_channels
     * @param RecordFormat|value-of<RecordFormat> $record_format
     * @param RecordTrack|value-of<RecordTrack> $record_track
     * @param RecordTrim|value-of<RecordTrim> $record_trim
     * @param list<SipHeader> $sip_headers
     * @param SipRegion|value-of<SipRegion> $sip_region
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sip_transport_protocol
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $stream_bidirectional_codec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $stream_bidirectional_mode
     * @param 8000|16000|22050|24000|48000 $stream_bidirectional_sampling_rate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $stream_bidirectional_target_legs
     * @param StreamCodec|value-of<StreamCodec> $stream_codec
     * @param StreamTrack|value-of<StreamTrack> $stream_track
     * @param SupervisorRole|value-of<SupervisorRole> $supervisor_role
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhook_url_method
     */
    public static function with(
        string $connection_id,
        string $from,
        string|array $to,
        AnsweringMachineDetection|string|null $answering_machine_detection = null,
        ?AnsweringMachineDetectionConfig $answering_machine_detection_config = null,
        ?string $audio_url = null,
        ?string $billing_group_id = null,
        ?bool $bridge_intent = null,
        ?bool $bridge_on_answer = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?ConferenceConfig $conference_config = null,
        ?array $custom_headers = null,
        ?DialogflowConfig $dialogflow_config = null,
        ?bool $enable_dialogflow = null,
        ?string $from_display_name = null,
        ?string $link_to = null,
        MediaEncryption|string|null $media_encryption = null,
        ?string $media_name = null,
        ?string $park_after_unbridge = null,
        ?string $preferred_codecs = null,
        Record|string|null $record = null,
        RecordChannels|string|null $record_channels = null,
        ?string $record_custom_file_name = null,
        RecordFormat|string|null $record_format = null,
        ?int $record_max_length = null,
        ?int $record_timeout_secs = null,
        RecordTrack|string|null $record_track = null,
        RecordTrim|string|null $record_trim = null,
        ?bool $send_silence_when_idle = null,
        ?string $sip_auth_password = null,
        ?string $sip_auth_username = null,
        ?array $sip_headers = null,
        SipRegion|string|null $sip_region = null,
        SipTransportProtocol|string|null $sip_transport_protocol = null,
        ?SoundModifications $sound_modifications = null,
        StreamBidirectionalCodec|string|null $stream_bidirectional_codec = null,
        StreamBidirectionalMode|string|null $stream_bidirectional_mode = null,
        ?int $stream_bidirectional_sampling_rate = null,
        StreamBidirectionalTargetLegs|string|null $stream_bidirectional_target_legs = null,
        StreamCodec|string|null $stream_codec = null,
        ?bool $stream_establish_before_call_originate = null,
        StreamTrack|string|null $stream_track = null,
        ?string $stream_url = null,
        ?string $supervise_call_control_id = null,
        SupervisorRole|string|null $supervisor_role = null,
        ?int $time_limit_secs = null,
        ?int $timeout_secs = null,
        ?bool $transcription = null,
        ?TranscriptionStartRequest $transcription_config = null,
        ?string $webhook_url = null,
        WebhookURLMethod|string|null $webhook_url_method = null,
    ): self {
        $obj = new self;

        $obj->connection_id = $connection_id;
        $obj->from = $from;
        $obj->to = $to;

        null !== $answering_machine_detection && $obj['answering_machine_detection'] = $answering_machine_detection;
        null !== $answering_machine_detection_config && $obj->answering_machine_detection_config = $answering_machine_detection_config;
        null !== $audio_url && $obj->audio_url = $audio_url;
        null !== $billing_group_id && $obj->billing_group_id = $billing_group_id;
        null !== $bridge_intent && $obj->bridge_intent = $bridge_intent;
        null !== $bridge_on_answer && $obj->bridge_on_answer = $bridge_on_answer;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $conference_config && $obj->conference_config = $conference_config;
        null !== $custom_headers && $obj->custom_headers = $custom_headers;
        null !== $dialogflow_config && $obj->dialogflow_config = $dialogflow_config;
        null !== $enable_dialogflow && $obj->enable_dialogflow = $enable_dialogflow;
        null !== $from_display_name && $obj->from_display_name = $from_display_name;
        null !== $link_to && $obj->link_to = $link_to;
        null !== $media_encryption && $obj['media_encryption'] = $media_encryption;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $park_after_unbridge && $obj->park_after_unbridge = $park_after_unbridge;
        null !== $preferred_codecs && $obj->preferred_codecs = $preferred_codecs;
        null !== $record && $obj['record'] = $record;
        null !== $record_channels && $obj['record_channels'] = $record_channels;
        null !== $record_custom_file_name && $obj->record_custom_file_name = $record_custom_file_name;
        null !== $record_format && $obj['record_format'] = $record_format;
        null !== $record_max_length && $obj->record_max_length = $record_max_length;
        null !== $record_timeout_secs && $obj->record_timeout_secs = $record_timeout_secs;
        null !== $record_track && $obj['record_track'] = $record_track;
        null !== $record_trim && $obj['record_trim'] = $record_trim;
        null !== $send_silence_when_idle && $obj->send_silence_when_idle = $send_silence_when_idle;
        null !== $sip_auth_password && $obj->sip_auth_password = $sip_auth_password;
        null !== $sip_auth_username && $obj->sip_auth_username = $sip_auth_username;
        null !== $sip_headers && $obj->sip_headers = $sip_headers;
        null !== $sip_region && $obj['sip_region'] = $sip_region;
        null !== $sip_transport_protocol && $obj['sip_transport_protocol'] = $sip_transport_protocol;
        null !== $sound_modifications && $obj->sound_modifications = $sound_modifications;
        null !== $stream_bidirectional_codec && $obj['stream_bidirectional_codec'] = $stream_bidirectional_codec;
        null !== $stream_bidirectional_mode && $obj['stream_bidirectional_mode'] = $stream_bidirectional_mode;
        null !== $stream_bidirectional_sampling_rate && $obj->stream_bidirectional_sampling_rate = $stream_bidirectional_sampling_rate;
        null !== $stream_bidirectional_target_legs && $obj['stream_bidirectional_target_legs'] = $stream_bidirectional_target_legs;
        null !== $stream_codec && $obj['stream_codec'] = $stream_codec;
        null !== $stream_establish_before_call_originate && $obj->stream_establish_before_call_originate = $stream_establish_before_call_originate;
        null !== $stream_track && $obj['stream_track'] = $stream_track;
        null !== $stream_url && $obj->stream_url = $stream_url;
        null !== $supervise_call_control_id && $obj->supervise_call_control_id = $supervise_call_control_id;
        null !== $supervisor_role && $obj['supervisor_role'] = $supervisor_role;
        null !== $time_limit_secs && $obj->time_limit_secs = $time_limit_secs;
        null !== $timeout_secs && $obj->timeout_secs = $timeout_secs;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $transcription_config && $obj->transcription_config = $transcription_config;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;
        null !== $webhook_url_method && $obj['webhook_url_method'] = $webhook_url_method;

        return $obj;
    }

    /**
     * The ID of the Call Control App (formerly ID of the connection) to be used when dialing the destination.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

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
        $obj['answering_machine_detection'] = $answeringMachineDetection;

        return $obj;
    }

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    public function withAnsweringMachineDetectionConfig(
        AnsweringMachineDetectionConfig $answeringMachineDetectionConfig
    ): self {
        $obj = clone $this;
        $obj->answering_machine_detection_config = $answeringMachineDetectionConfig;

        return $obj;
    }

    /**
     * The URL of a file to be played back to the callee when the call is answered. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audio_url = $audioURL;

        return $obj;
    }

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billing_group_id = $billingGroupID;

        return $obj;
    }

    /**
     * Indicates the intent to bridge this call with the call specified in link_to. When bridge_intent is true, link_to becomes required and the from number will be overwritten by the from number from the linked call.
     */
    public function withBridgeIntent(bool $bridgeIntent): self
    {
        $obj = clone $this;
        $obj->bridge_intent = $bridgeIntent;

        return $obj;
    }

    /**
     * Whether to automatically bridge answered call to the call specified in link_to. When bridge_on_answer is true, link_to becomes required.
     */
    public function withBridgeOnAnswer(bool $bridgeOnAnswer): self
    {
        $obj = clone $this;
        $obj->bridge_on_answer = $bridgeOnAnswer;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore others Dial commands with the same `command_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * Optional configuration parameters to dial new participant into a conference.
     */
    public function withConferenceConfig(
        ConferenceConfig $conferenceConfig
    ): self {
        $obj = clone $this;
        $obj->conference_config = $conferenceConfig;

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
        $obj->custom_headers = $customHeaders;

        return $obj;
    }

    public function withDialogflowConfig(
        DialogflowConfig $dialogflowConfig
    ): self {
        $obj = clone $this;
        $obj->dialogflow_config = $dialogflowConfig;

        return $obj;
    }

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    public function withEnableDialogflow(bool $enableDialogflow): self
    {
        $obj = clone $this;
        $obj->enable_dialogflow = $enableDialogflow;

        return $obj;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $obj = clone $this;
        $obj->from_display_name = $fromDisplayName;

        return $obj;
    }

    /**
     * Use another call's control id for sharing the same call session id.
     */
    public function withLinkTo(string $linkTo): self
    {
        $obj = clone $this;
        $obj->link_to = $linkTo;

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
        $obj['media_encryption'] = $mediaEncryption;

        return $obj;
    }

    /**
     * The media_name of a file to be played back to the callee when the call is answered. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->media_name = $mediaName;

        return $obj;
    }

    /**
     * If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg. When park_after_unbridge is set, link_to becomes required.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $obj = clone $this;
        $obj->park_after_unbridge = $parkAfterUnbridge;

        return $obj;
    }

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $obj = clone $this;
        $obj->preferred_codecs = $preferredCodecs;

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
        $obj['record_channels'] = $recordChannels;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withRecordCustomFileName(string $recordCustomFileName): self
    {
        $obj = clone $this;
        $obj->record_custom_file_name = $recordCustomFileName;

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
        $obj['record_format'] = $recordFormat;

        return $obj;
    }

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    public function withRecordMaxLength(int $recordMaxLength): self
    {
        $obj = clone $this;
        $obj->record_max_length = $recordMaxLength;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->record_timeout_secs = $recordTimeoutSecs;

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
        $obj['record_track'] = $recordTrack;

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
        $obj['record_trim'] = $recordTrim;

        return $obj;
    }

    /**
     * Generate silence RTP packets when no transmission available.
     */
    public function withSendSilenceWhenIdle(bool $sendSilenceWhenIdle): self
    {
        $obj = clone $this;
        $obj->send_silence_when_idle = $sendSilenceWhenIdle;

        return $obj;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj->sip_auth_password = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj->sip_auth_username = $sipAuthUsername;

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
        $obj->sip_headers = $sipHeaders;

        return $obj;
    }

    /**
     * Defines the SIP region to be used for the call.
     *
     * @param SipRegion|value-of<SipRegion> $sipRegion
     */
    public function withSipRegion(SipRegion|string $sipRegion): self
    {
        $obj = clone $this;
        $obj['sip_region'] = $sipRegion;

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
        $obj['sip_transport_protocol'] = $sipTransportProtocol;

        return $obj;
    }

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    public function withSoundModifications(
        SoundModifications $soundModifications
    ): self {
        $obj = clone $this;
        $obj->sound_modifications = $soundModifications;

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
        $obj['stream_bidirectional_codec'] = $streamBidirectionalCodec;

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
        $obj['stream_bidirectional_mode'] = $streamBidirectionalMode;

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
        $obj->stream_bidirectional_sampling_rate = $streamBidirectionalSamplingRate;

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
        $obj['stream_bidirectional_target_legs'] = $streamBidirectionalTargetLegs;

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
        $obj['stream_codec'] = $streamCodec;

        return $obj;
    }

    /**
     * Establish websocket connection before dialing the destination. This is useful for cases where the websocket connection takes a long time to establish.
     */
    public function withStreamEstablishBeforeCallOriginate(
        bool $streamEstablishBeforeCallOriginate
    ): self {
        $obj = clone $this;
        $obj->stream_establish_before_call_originate = $streamEstablishBeforeCallOriginate;

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
        $obj['stream_track'] = $streamTrack;

        return $obj;
    }

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    public function withStreamURL(string $streamURL): self
    {
        $obj = clone $this;
        $obj->stream_url = $streamURL;

        return $obj;
    }

    /**
     * The call leg which will be supervised by the new call.
     */
    public function withSuperviseCallControlID(
        string $superviseCallControlID
    ): self {
        $obj = clone $this;
        $obj->supervise_call_control_id = $superviseCallControlID;

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
        $obj['supervisor_role'] = $supervisorRole;

        return $obj;
    }

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    public function withTimeLimitSecs(int $timeLimitSecs): self
    {
        $obj = clone $this;
        $obj->time_limit_secs = $timeLimitSecs;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being called. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeout_secs = $timeoutSecs;

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
        $obj->transcription_config = $transcriptionConfig;

        return $obj;
    }

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

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
        $obj['webhook_url_method'] = $webhookURLMethod;

        return $obj;
    }
}
