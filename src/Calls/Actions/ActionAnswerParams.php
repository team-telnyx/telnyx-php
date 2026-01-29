<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionAnswerParams\PreferredCodecs;
use Telnyx\Calls\Actions\ActionAnswerParams\Record;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordChannels;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordFormat;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordTrack;
use Telnyx\Calls\Actions\ActionAnswerParams\RecordTrim;
use Telnyx\Calls\Actions\ActionAnswerParams\StreamTrack;
use Telnyx\Calls\Actions\ActionAnswerParams\WebhookURLMethod;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SoundModifications;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Answer an incoming call. You must issue this command before executing subsequent commands on an incoming call.
 *
 * **Expected Webhooks:**
 *
 * - `call.answered`
 * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
 *
 * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
 *
 * @see Telnyx\Services\Calls\ActionsService::answer()
 *
 * @phpstan-import-type CustomSipHeaderShape from \Telnyx\Calls\CustomSipHeader
 * @phpstan-import-type SipHeaderShape from \Telnyx\Calls\SipHeader
 * @phpstan-import-type SoundModificationsShape from \Telnyx\Calls\SoundModifications
 * @phpstan-import-type TranscriptionStartRequestShape from \Telnyx\Calls\Actions\TranscriptionStartRequest
 *
 * @phpstan-type ActionAnswerParamsShape = array{
 *   billingGroupID?: string|null,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   customHeaders?: list<CustomSipHeader|CustomSipHeaderShape>|null,
 *   preferredCodecs?: null|PreferredCodecs|value-of<PreferredCodecs>,
 *   record?: null|Record|value-of<Record>,
 *   recordChannels?: null|RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string|null,
 *   recordFormat?: null|RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int|null,
 *   recordTimeoutSecs?: int|null,
 *   recordTrack?: null|RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: null|RecordTrim|value-of<RecordTrim>,
 *   sendSilenceWhenIdle?: bool|null,
 *   sipHeaders?: list<SipHeader|SipHeaderShape>|null,
 *   soundModifications?: null|SoundModifications|SoundModificationsShape,
 *   streamBidirectionalCodec?: null|StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: null|StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalTargetLegs?: null|StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: null|StreamCodec|value-of<StreamCodec>,
 *   streamTrack?: null|StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string|null,
 *   transcription?: bool|null,
 *   transcriptionConfig?: null|TranscriptionStartRequest|TranscriptionStartRequestShape,
 *   webhookURL?: string|null,
 *   webhookURLMethod?: null|WebhookURLMethod|value-of<WebhookURLMethod>,
 * }
 */
final class ActionAnswerParams implements BaseModel
{
    /** @use SdkModel<ActionAnswerParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

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
     * Custom headers to be added to the SIP INVITE response.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomSipHeader::class)]
    public ?array $customHeaders;

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     *
     * @var value-of<PreferredCodecs>|null $preferredCodecs
     */
    #[Optional('preferred_codecs', enum: PreferredCodecs::class)]
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
     * SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Optional('sip_headers', list: SipHeader::class)]
    public ?array $sipHeaders;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CustomSipHeader|CustomSipHeaderShape>|null $customHeaders
     * @param PreferredCodecs|value-of<PreferredCodecs>|null $preferredCodecs
     * @param Record|value-of<Record>|null $record
     * @param RecordChannels|value-of<RecordChannels>|null $recordChannels
     * @param RecordFormat|value-of<RecordFormat>|null $recordFormat
     * @param RecordTrack|value-of<RecordTrack>|null $recordTrack
     * @param RecordTrim|value-of<RecordTrim>|null $recordTrim
     * @param list<SipHeader|SipHeaderShape>|null $sipHeaders
     * @param SoundModifications|SoundModificationsShape|null $soundModifications
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>|null $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode>|null $streamBidirectionalMode
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>|null $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec>|null $streamCodec
     * @param StreamTrack|value-of<StreamTrack>|null $streamTrack
     * @param TranscriptionStartRequest|TranscriptionStartRequestShape|null $transcriptionConfig
     * @param WebhookURLMethod|value-of<WebhookURLMethod>|null $webhookURLMethod
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        PreferredCodecs|string|null $preferredCodecs = null,
        Record|string|null $record = null,
        RecordChannels|string|null $recordChannels = null,
        ?string $recordCustomFileName = null,
        RecordFormat|string|null $recordFormat = null,
        ?int $recordMaxLength = null,
        ?int $recordTimeoutSecs = null,
        RecordTrack|string|null $recordTrack = null,
        RecordTrim|string|null $recordTrim = null,
        ?bool $sendSilenceWhenIdle = null,
        ?array $sipHeaders = null,
        SoundModifications|array|null $soundModifications = null,
        StreamBidirectionalCodec|string|null $streamBidirectionalCodec = null,
        StreamBidirectionalMode|string|null $streamBidirectionalMode = null,
        StreamBidirectionalTargetLegs|string|null $streamBidirectionalTargetLegs = null,
        StreamCodec|string|null $streamCodec = null,
        StreamTrack|string|null $streamTrack = null,
        ?string $streamURL = null,
        ?bool $transcription = null,
        TranscriptionStartRequest|array|null $transcriptionConfig = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string|null $webhookURLMethod = null,
    ): self {
        $self = new self;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
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
        null !== $sipHeaders && $self['sipHeaders'] = $sipHeaders;
        null !== $soundModifications && $self['soundModifications'] = $soundModifications;
        null !== $streamBidirectionalCodec && $self['streamBidirectionalCodec'] = $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $self['streamBidirectionalMode'] = $streamBidirectionalMode;
        null !== $streamBidirectionalTargetLegs && $self['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;
        null !== $streamCodec && $self['streamCodec'] = $streamCodec;
        null !== $streamTrack && $self['streamTrack'] = $streamTrack;
        null !== $streamURL && $self['streamURL'] = $streamURL;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $transcriptionConfig && $self['transcriptionConfig'] = $transcriptionConfig;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $webhookURLMethod && $self['webhookURLMethod'] = $webhookURLMethod;

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
     * Custom headers to be added to the SIP INVITE response.
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
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     *
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferredCodecs
     */
    public function withPreferredCodecs(
        PreferredCodecs|string $preferredCodecs
    ): self {
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
     * SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
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
