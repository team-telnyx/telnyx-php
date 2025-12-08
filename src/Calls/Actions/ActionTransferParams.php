<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetection;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetectionConfig;
use Telnyx\Calls\Actions\ActionTransferParams\MediaEncryption;
use Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf;
use Telnyx\Calls\Actions\ActionTransferParams\Record;
use Telnyx\Calls\Actions\ActionTransferParams\RecordChannels;
use Telnyx\Calls\Actions\ActionTransferParams\RecordFormat;
use Telnyx\Calls\Actions\ActionTransferParams\RecordTrack;
use Telnyx\Calls\Actions\ActionTransferParams\RecordTrim;
use Telnyx\Calls\Actions\ActionTransferParams\SipRegion;
use Telnyx\Calls\Actions\ActionTransferParams\SipTransportProtocol;
use Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
use Telnyx\Calls\SoundModifications;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Transfer a call to a new destination. If the transfer is unsuccessful, a `call.hangup` webhook for the other call (Leg B) will be sent indicating that the transfer could not be completed. The original call will remain active and may be issued additional commands, potentially transfering the call to an alternate destination.
 *
 * **Expected Webhooks:**
 *
 * - `call.initiated`
 * - `call.bridged` to Leg B
 * - `call.answered` or `call.hangup`
 * - `call.machine.detection.ended` if `answering_machine_detection` was requested
 * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
 * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
 * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
 *
 * @see Telnyx\Services\Calls\ActionsService::transfer()
 *
 * @phpstan-type ActionTransferParamsShape = array{
 *   to: string,
 *   answering_machine_detection?: AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
 *   answering_machine_detection_config?: AnsweringMachineDetectionConfig|array{
 *     after_greeting_silence_millis?: int|null,
 *     between_words_silence_millis?: int|null,
 *     greeting_duration_millis?: int|null,
 *     greeting_silence_duration_millis?: int|null,
 *     greeting_total_analysis_time_millis?: int|null,
 *     initial_silence_millis?: int|null,
 *     maximum_number_of_words?: int|null,
 *     maximum_word_length_millis?: int|null,
 *     silence_threshold?: int|null,
 *     total_analysis_time_millis?: int|null,
 *   },
 *   audio_url?: string,
 *   client_state?: string,
 *   command_id?: string,
 *   custom_headers?: list<CustomSipHeader|array{name: string, value: string}>,
 *   early_media?: bool,
 *   from?: string,
 *   from_display_name?: string,
 *   media_encryption?: MediaEncryption|value-of<MediaEncryption>,
 *   media_name?: string,
 *   mute_dtmf?: MuteDtmf|value-of<MuteDtmf>,
 *   park_after_unbridge?: string,
 *   record?: Record|value-of<Record>,
 *   record_channels?: RecordChannels|value-of<RecordChannels>,
 *   record_custom_file_name?: string,
 *   record_format?: RecordFormat|value-of<RecordFormat>,
 *   record_max_length?: int,
 *   record_timeout_secs?: int,
 *   record_track?: RecordTrack|value-of<RecordTrack>,
 *   record_trim?: RecordTrim|value-of<RecordTrim>,
 *   sip_auth_password?: string,
 *   sip_auth_username?: string,
 *   sip_headers?: list<SipHeader|array{name: value-of<Name>, value: string}>,
 *   sip_region?: SipRegion|value-of<SipRegion>,
 *   sip_transport_protocol?: SipTransportProtocol|value-of<SipTransportProtocol>,
 *   sound_modifications?: SoundModifications|array{
 *     octaves?: float|null,
 *     pitch?: float|null,
 *     semitone?: float|null,
 *     track?: string|null,
 *   },
 *   target_leg_client_state?: string,
 *   time_limit_secs?: int,
 *   timeout_secs?: int,
 *   webhook_url?: string,
 *   webhook_url_method?: WebhookURLMethod|value-of<WebhookURLMethod>,
 * }
 */
final class ActionTransferParams implements BaseModel
{
    /** @use SdkModel<ActionTransferParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The DID or SIP URI to dial out to.
     */
    #[Required]
    public string $to;

    /**
     * Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
     *
     * @var value-of<AnsweringMachineDetection>|null $answering_machine_detection
     */
    #[Optional(enum: AnsweringMachineDetection::class)]
    public ?string $answering_machine_detection;

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    #[Optional]
    public ?AnsweringMachineDetectionConfig $answering_machine_detection_config;

    /**
     * The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Optional]
    public ?string $audio_url;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional]
    public ?string $command_id;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $custom_headers
     */
    #[Optional(list: CustomSipHeader::class)]
    public ?array $custom_headers;

    /**
     * If set to false, early media will not be passed to the originating leg.
     */
    #[Optional]
    public ?bool $early_media;

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     */
    #[Optional]
    public ?string $from;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    #[Optional]
    public ?string $from_display_name;

    /**
     * Defines whether media should be encrypted on the new call leg.
     *
     * @var value-of<MediaEncryption>|null $media_encryption
     */
    #[Optional(enum: MediaEncryption::class)]
    public ?string $media_encryption;

    /**
     * The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional]
    public ?string $media_name;

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @var value-of<MuteDtmf>|null $mute_dtmf
     */
    #[Optional(enum: MuteDtmf::class)]
    public ?string $mute_dtmf;

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    #[Optional]
    public ?string $park_after_unbridge;

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
     * @var value-of<RecordChannels>|null $record_channels
     */
    #[Optional(enum: RecordChannels::class)]
    public ?string $record_channels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Optional]
    public ?string $record_custom_file_name;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $record_format
     */
    #[Optional(enum: RecordFormat::class)]
    public ?string $record_format;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Optional]
    public ?int $record_max_length;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional]
    public ?int $record_timeout_secs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $record_track
     */
    #[Optional(enum: RecordTrack::class)]
    public ?string $record_track;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $record_trim
     */
    #[Optional(enum: RecordTrim::class)]
    public ?string $record_trim;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Optional]
    public ?string $sip_auth_password;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Optional]
    public ?string $sip_auth_username;

    /**
     * SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sip_headers
     */
    #[Optional(list: SipHeader::class)]
    public ?array $sip_headers;

    /**
     * Defines the SIP region to be used for the call.
     *
     * @var value-of<SipRegion>|null $sip_region
     */
    #[Optional(enum: SipRegion::class)]
    public ?string $sip_region;

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @var value-of<SipTransportProtocol>|null $sip_transport_protocol
     */
    #[Optional(enum: SipTransportProtocol::class)]
    public ?string $sip_transport_protocol;

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    #[Optional]
    public ?SoundModifications $sound_modifications;

    /**
     * Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     */
    #[Optional]
    public ?string $target_leg_client_state;

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    #[Optional]
    public ?int $time_limit_secs;

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    #[Optional]
    public ?int $timeout_secs;

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    #[Optional]
    public ?string $webhook_url;

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @var value-of<WebhookURLMethod>|null $webhook_url_method
     */
    #[Optional(enum: WebhookURLMethod::class)]
    public ?string $webhook_url_method;

    /**
     * `new ActionTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionTransferParams::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionTransferParams)->withTo(...)
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
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answering_machine_detection
     * @param AnsweringMachineDetectionConfig|array{
     *   after_greeting_silence_millis?: int|null,
     *   between_words_silence_millis?: int|null,
     *   greeting_duration_millis?: int|null,
     *   greeting_silence_duration_millis?: int|null,
     *   greeting_total_analysis_time_millis?: int|null,
     *   initial_silence_millis?: int|null,
     *   maximum_number_of_words?: int|null,
     *   maximum_word_length_millis?: int|null,
     *   silence_threshold?: int|null,
     *   total_analysis_time_millis?: int|null,
     * } $answering_machine_detection_config
     * @param list<CustomSipHeader|array{name: string, value: string}> $custom_headers
     * @param MediaEncryption|value-of<MediaEncryption> $media_encryption
     * @param MuteDtmf|value-of<MuteDtmf> $mute_dtmf
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $record_channels
     * @param RecordFormat|value-of<RecordFormat> $record_format
     * @param RecordTrack|value-of<RecordTrack> $record_track
     * @param RecordTrim|value-of<RecordTrim> $record_trim
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sip_headers
     * @param SipRegion|value-of<SipRegion> $sip_region
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sip_transport_protocol
     * @param SoundModifications|array{
     *   octaves?: float|null,
     *   pitch?: float|null,
     *   semitone?: float|null,
     *   track?: string|null,
     * } $sound_modifications
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhook_url_method
     */
    public static function with(
        string $to,
        AnsweringMachineDetection|string|null $answering_machine_detection = null,
        AnsweringMachineDetectionConfig|array|null $answering_machine_detection_config = null,
        ?string $audio_url = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?array $custom_headers = null,
        ?bool $early_media = null,
        ?string $from = null,
        ?string $from_display_name = null,
        MediaEncryption|string|null $media_encryption = null,
        ?string $media_name = null,
        MuteDtmf|string|null $mute_dtmf = null,
        ?string $park_after_unbridge = null,
        Record|string|null $record = null,
        RecordChannels|string|null $record_channels = null,
        ?string $record_custom_file_name = null,
        RecordFormat|string|null $record_format = null,
        ?int $record_max_length = null,
        ?int $record_timeout_secs = null,
        RecordTrack|string|null $record_track = null,
        RecordTrim|string|null $record_trim = null,
        ?string $sip_auth_password = null,
        ?string $sip_auth_username = null,
        ?array $sip_headers = null,
        SipRegion|string|null $sip_region = null,
        SipTransportProtocol|string|null $sip_transport_protocol = null,
        SoundModifications|array|null $sound_modifications = null,
        ?string $target_leg_client_state = null,
        ?int $time_limit_secs = null,
        ?int $timeout_secs = null,
        ?string $webhook_url = null,
        WebhookURLMethod|string|null $webhook_url_method = null,
    ): self {
        $obj = new self;

        $obj['to'] = $to;

        null !== $answering_machine_detection && $obj['answering_machine_detection'] = $answering_machine_detection;
        null !== $answering_machine_detection_config && $obj['answering_machine_detection_config'] = $answering_machine_detection_config;
        null !== $audio_url && $obj['audio_url'] = $audio_url;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $custom_headers && $obj['custom_headers'] = $custom_headers;
        null !== $early_media && $obj['early_media'] = $early_media;
        null !== $from && $obj['from'] = $from;
        null !== $from_display_name && $obj['from_display_name'] = $from_display_name;
        null !== $media_encryption && $obj['media_encryption'] = $media_encryption;
        null !== $media_name && $obj['media_name'] = $media_name;
        null !== $mute_dtmf && $obj['mute_dtmf'] = $mute_dtmf;
        null !== $park_after_unbridge && $obj['park_after_unbridge'] = $park_after_unbridge;
        null !== $record && $obj['record'] = $record;
        null !== $record_channels && $obj['record_channels'] = $record_channels;
        null !== $record_custom_file_name && $obj['record_custom_file_name'] = $record_custom_file_name;
        null !== $record_format && $obj['record_format'] = $record_format;
        null !== $record_max_length && $obj['record_max_length'] = $record_max_length;
        null !== $record_timeout_secs && $obj['record_timeout_secs'] = $record_timeout_secs;
        null !== $record_track && $obj['record_track'] = $record_track;
        null !== $record_trim && $obj['record_trim'] = $record_trim;
        null !== $sip_auth_password && $obj['sip_auth_password'] = $sip_auth_password;
        null !== $sip_auth_username && $obj['sip_auth_username'] = $sip_auth_username;
        null !== $sip_headers && $obj['sip_headers'] = $sip_headers;
        null !== $sip_region && $obj['sip_region'] = $sip_region;
        null !== $sip_transport_protocol && $obj['sip_transport_protocol'] = $sip_transport_protocol;
        null !== $sound_modifications && $obj['sound_modifications'] = $sound_modifications;
        null !== $target_leg_client_state && $obj['target_leg_client_state'] = $target_leg_client_state;
        null !== $time_limit_secs && $obj['time_limit_secs'] = $time_limit_secs;
        null !== $timeout_secs && $obj['timeout_secs'] = $timeout_secs;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;
        null !== $webhook_url_method && $obj['webhook_url_method'] = $webhook_url_method;

        return $obj;
    }

    /**
     * The DID or SIP URI to dial out to.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
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
     *
     * @param AnsweringMachineDetectionConfig|array{
     *   after_greeting_silence_millis?: int|null,
     *   between_words_silence_millis?: int|null,
     *   greeting_duration_millis?: int|null,
     *   greeting_silence_duration_millis?: int|null,
     *   greeting_total_analysis_time_millis?: int|null,
     *   initial_silence_millis?: int|null,
     *   maximum_number_of_words?: int|null,
     *   maximum_word_length_millis?: int|null,
     *   silence_threshold?: int|null,
     *   total_analysis_time_millis?: int|null,
     * } $answeringMachineDetectionConfig
     */
    public function withAnsweringMachineDetectionConfig(
        AnsweringMachineDetectionConfig|array $answeringMachineDetectionConfig
    ): self {
        $obj = clone $this;
        $obj['answering_machine_detection_config'] = $answeringMachineDetectionConfig;

        return $obj;
    }

    /**
     * The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj['audio_url'] = $audioURL;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj['custom_headers'] = $customHeaders;

        return $obj;
    }

    /**
     * If set to false, early media will not be passed to the originating leg.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $obj = clone $this;
        $obj['early_media'] = $earlyMedia;

        return $obj;
    }

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $obj = clone $this;
        $obj['from_display_name'] = $fromDisplayName;

        return $obj;
    }

    /**
     * Defines whether media should be encrypted on the new call leg.
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
     * The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['media_name'] = $mediaName;

        return $obj;
    }

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     */
    public function withMuteDtmf(MuteDtmf|string $muteDtmf): self
    {
        $obj = clone $this;
        $obj['mute_dtmf'] = $muteDtmf;

        return $obj;
    }

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $obj = clone $this;
        $obj['park_after_unbridge'] = $parkAfterUnbridge;

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
        $obj['record_custom_file_name'] = $recordCustomFileName;

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
        $obj['record_max_length'] = $recordMaxLength;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['record_timeout_secs'] = $recordTimeoutSecs;

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
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj['sip_auth_password'] = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj['sip_auth_username'] = $sipAuthUsername;

        return $obj;
    }

    /**
     * SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj['sip_headers'] = $sipHeaders;

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
     *
     * @param SoundModifications|array{
     *   octaves?: float|null,
     *   pitch?: float|null,
     *   semitone?: float|null,
     *   track?: string|null,
     * } $soundModifications
     */
    public function withSoundModifications(
        SoundModifications|array $soundModifications
    ): self {
        $obj = clone $this;
        $obj['sound_modifications'] = $soundModifications;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     */
    public function withTargetLegClientState(string $targetLegClientState): self
    {
        $obj = clone $this;
        $obj['target_leg_client_state'] = $targetLegClientState;

        return $obj;
    }

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    public function withTimeLimitSecs(int $timeLimitSecs): self
    {
        $obj = clone $this;
        $obj['time_limit_secs'] = $timeLimitSecs;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj['timeout_secs'] = $timeoutSecs;

        return $obj;
    }

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

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
