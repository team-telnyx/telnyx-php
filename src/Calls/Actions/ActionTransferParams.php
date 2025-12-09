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
 *   answeringMachineDetection?: AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
 *   answeringMachineDetectionConfig?: AnsweringMachineDetectionConfig|array{
 *     afterGreetingSilenceMillis?: int|null,
 *     betweenWordsSilenceMillis?: int|null,
 *     greetingDurationMillis?: int|null,
 *     greetingSilenceDurationMillis?: int|null,
 *     greetingTotalAnalysisTimeMillis?: int|null,
 *     initialSilenceMillis?: int|null,
 *     maximumNumberOfWords?: int|null,
 *     maximumWordLengthMillis?: int|null,
 *     silenceThreshold?: int|null,
 *     totalAnalysisTimeMillis?: int|null,
 *   },
 *   audioURL?: string,
 *   clientState?: string,
 *   commandID?: string,
 *   customHeaders?: list<CustomSipHeader|array{name: string, value: string}>,
 *   earlyMedia?: bool,
 *   from?: string,
 *   fromDisplayName?: string,
 *   mediaEncryption?: MediaEncryption|value-of<MediaEncryption>,
 *   mediaName?: string,
 *   muteDtmf?: MuteDtmf|value-of<MuteDtmf>,
 *   parkAfterUnbridge?: string,
 *   record?: Record|value-of<Record>,
 *   recordChannels?: RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string,
 *   recordFormat?: RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int,
 *   recordTimeoutSecs?: int,
 *   recordTrack?: RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: RecordTrim|value-of<RecordTrim>,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 *   sipHeaders?: list<SipHeader|array{name: value-of<Name>, value: string}>,
 *   sipRegion?: SipRegion|value-of<SipRegion>,
 *   sipTransportProtocol?: SipTransportProtocol|value-of<SipTransportProtocol>,
 *   soundModifications?: SoundModifications|array{
 *     octaves?: float|null,
 *     pitch?: float|null,
 *     semitone?: float|null,
 *     track?: string|null,
 *   },
 *   targetLegClientState?: string,
 *   timeLimitSecs?: int,
 *   timeoutSecs?: int,
 *   webhookURL?: string,
 *   webhookURLMethod?: WebhookURLMethod|value-of<WebhookURLMethod>,
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
     * The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Optional('audio_url')]
    public ?string $audioURL;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

    /**
     * If set to false, early media will not be passed to the originating leg.
     */
    #[Optional('early_media')]
    public ?bool $earlyMedia;

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     */
    #[Optional]
    public ?string $from;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    #[Optional('from_display_name')]
    public ?string $fromDisplayName;

    /**
     * Defines whether media should be encrypted on the new call leg.
     *
     * @var value-of<MediaEncryption>|null $mediaEncryption
     */
    #[Optional('media_encryption', enum: MediaEncryption::class)]
    public ?string $mediaEncryption;

    /**
     * The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @var value-of<MuteDtmf>|null $muteDtmf
     */
    #[Optional('mute_dtmf', enum: MuteDtmf::class)]
    public ?string $muteDtmf;

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    #[Optional('park_after_unbridge')]
    public ?string $parkAfterUnbridge;

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
     * SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
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
     * Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     */
    #[Optional('target_leg_client_state')]
    public ?string $targetLegClientState;

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    #[Optional('time_limit_secs')]
    public ?int $timeLimitSecs;

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

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
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection
     * @param AnsweringMachineDetectionConfig|array{
     *   afterGreetingSilenceMillis?: int|null,
     *   betweenWordsSilenceMillis?: int|null,
     *   greetingDurationMillis?: int|null,
     *   greetingSilenceDurationMillis?: int|null,
     *   greetingTotalAnalysisTimeMillis?: int|null,
     *   initialSilenceMillis?: int|null,
     *   maximumNumberOfWords?: int|null,
     *   maximumWordLengthMillis?: int|null,
     *   silenceThreshold?: int|null,
     *   totalAnalysisTimeMillis?: int|null,
     * } $answeringMachineDetectionConfig
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     * @param SipRegion|value-of<SipRegion> $sipRegion
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol
     * @param SoundModifications|array{
     *   octaves?: float|null,
     *   pitch?: float|null,
     *   semitone?: float|null,
     *   track?: string|null,
     * } $soundModifications
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
     */
    public static function with(
        string $to,
        AnsweringMachineDetection|string|null $answeringMachineDetection = null,
        AnsweringMachineDetectionConfig|array|null $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        ?bool $earlyMedia = null,
        ?string $from = null,
        ?string $fromDisplayName = null,
        MediaEncryption|string|null $mediaEncryption = null,
        ?string $mediaName = null,
        MuteDtmf|string|null $muteDtmf = null,
        ?string $parkAfterUnbridge = null,
        Record|string|null $record = null,
        RecordChannels|string|null $recordChannels = null,
        ?string $recordCustomFileName = null,
        RecordFormat|string|null $recordFormat = null,
        ?int $recordMaxLength = null,
        ?int $recordTimeoutSecs = null,
        RecordTrack|string|null $recordTrack = null,
        RecordTrim|string|null $recordTrim = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        SipRegion|string|null $sipRegion = null,
        SipTransportProtocol|string|null $sipTransportProtocol = null,
        SoundModifications|array|null $soundModifications = null,
        ?string $targetLegClientState = null,
        ?int $timeLimitSecs = null,
        ?int $timeoutSecs = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string|null $webhookURLMethod = null,
    ): self {
        $self = new self;

        $self['to'] = $to;

        null !== $answeringMachineDetection && $self['answeringMachineDetection'] = $answeringMachineDetection;
        null !== $answeringMachineDetectionConfig && $self['answeringMachineDetectionConfig'] = $answeringMachineDetectionConfig;
        null !== $audioURL && $self['audioURL'] = $audioURL;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $earlyMedia && $self['earlyMedia'] = $earlyMedia;
        null !== $from && $self['from'] = $from;
        null !== $fromDisplayName && $self['fromDisplayName'] = $fromDisplayName;
        null !== $mediaEncryption && $self['mediaEncryption'] = $mediaEncryption;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $muteDtmf && $self['muteDtmf'] = $muteDtmf;
        null !== $parkAfterUnbridge && $self['parkAfterUnbridge'] = $parkAfterUnbridge;
        null !== $record && $self['record'] = $record;
        null !== $recordChannels && $self['recordChannels'] = $recordChannels;
        null !== $recordCustomFileName && $self['recordCustomFileName'] = $recordCustomFileName;
        null !== $recordFormat && $self['recordFormat'] = $recordFormat;
        null !== $recordMaxLength && $self['recordMaxLength'] = $recordMaxLength;
        null !== $recordTimeoutSecs && $self['recordTimeoutSecs'] = $recordTimeoutSecs;
        null !== $recordTrack && $self['recordTrack'] = $recordTrack;
        null !== $recordTrim && $self['recordTrim'] = $recordTrim;
        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;
        null !== $sipHeaders && $self['sipHeaders'] = $sipHeaders;
        null !== $sipRegion && $self['sipRegion'] = $sipRegion;
        null !== $sipTransportProtocol && $self['sipTransportProtocol'] = $sipTransportProtocol;
        null !== $soundModifications && $self['soundModifications'] = $soundModifications;
        null !== $targetLegClientState && $self['targetLegClientState'] = $targetLegClientState;
        null !== $timeLimitSecs && $self['timeLimitSecs'] = $timeLimitSecs;
        null !== $timeoutSecs && $self['timeoutSecs'] = $timeoutSecs;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $webhookURLMethod && $self['webhookURLMethod'] = $webhookURLMethod;

        return $self;
    }

    /**
     * The DID or SIP URI to dial out to.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
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
     * @param AnsweringMachineDetectionConfig|array{
     *   afterGreetingSilenceMillis?: int|null,
     *   betweenWordsSilenceMillis?: int|null,
     *   greetingDurationMillis?: int|null,
     *   greetingSilenceDurationMillis?: int|null,
     *   greetingTotalAnalysisTimeMillis?: int|null,
     *   initialSilenceMillis?: int|null,
     *   maximumNumberOfWords?: int|null,
     *   maximumWordLengthMillis?: int|null,
     *   silenceThreshold?: int|null,
     *   totalAnalysisTimeMillis?: int|null,
     * } $answeringMachineDetectionConfig
     */
    public function withAnsweringMachineDetectionConfig(
        AnsweringMachineDetectionConfig|array $answeringMachineDetectionConfig
    ): self {
        $self = clone $this;
        $self['answeringMachineDetectionConfig'] = $answeringMachineDetectionConfig;

        return $self;
    }

    /**
     * The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $self = clone $this;
        $self['audioURL'] = $audioURL;

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
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * If set to false, early media will not be passed to the originating leg.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $self = clone $this;
        $self['earlyMedia'] = $earlyMedia;

        return $self;
    }

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

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
     * Defines whether media should be encrypted on the new call leg.
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
     * The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     */
    public function withMuteDtmf(MuteDtmf|string $muteDtmf): self
    {
        $self = clone $this;
        $self['muteDtmf'] = $muteDtmf;

        return $self;
    }

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $self = clone $this;
        $self['parkAfterUnbridge'] = $parkAfterUnbridge;

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
     * SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
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
        $self = clone $this;
        $self['soundModifications'] = $soundModifications;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     */
    public function withTargetLegClientState(string $targetLegClientState): self
    {
        $self = clone $this;
        $self['targetLegClientState'] = $targetLegClientState;

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
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

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
