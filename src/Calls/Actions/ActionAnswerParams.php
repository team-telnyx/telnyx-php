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
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Azure;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Telnyx;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SipHeader\Name;
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
 * @phpstan-type ActionAnswerParamsShape = array{
 *   billingGroupID?: string,
 *   clientState?: string,
 *   commandID?: string,
 *   customHeaders?: list<CustomSipHeader|array{name: string, value: string}>,
 *   preferredCodecs?: PreferredCodecs|value-of<PreferredCodecs>,
 *   record?: Record|value-of<Record>,
 *   recordChannels?: RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string,
 *   recordFormat?: RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int,
 *   recordTimeoutSecs?: int,
 *   recordTrack?: RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: RecordTrim|value-of<RecordTrim>,
 *   sendSilenceWhenIdle?: bool,
 *   sipHeaders?: list<SipHeader|array{name: value-of<Name>, value: string}>,
 *   soundModifications?: SoundModifications|array{
 *     octaves?: float|null,
 *     pitch?: float|null,
 *     semitone?: float|null,
 *     track?: string|null,
 *   },
 *   streamBidirectionalCodec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalTargetLegs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: StreamCodec|value-of<StreamCodec>,
 *   streamTrack?: StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string,
 *   transcription?: bool,
 *   transcriptionConfig?: TranscriptionStartRequest|array{
 *     clientState?: string|null,
 *     commandID?: string|null,
 *     transcriptionEngine?: value-of<TranscriptionEngine>|null,
 *     transcriptionEngineConfig?: null|Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig,
 *     transcriptionTracks?: string|null,
 *   },
 *   webhookURL?: string,
 *   webhookURLMethod?: WebhookURLMethod|value-of<WebhookURLMethod>,
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
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferredCodecs
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     * @param SoundModifications|array{
     *   octaves?: float|null,
     *   pitch?: float|null,
     *   semitone?: float|null,
     *   track?: string|null,
     * } $soundModifications
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec> $streamCodec
     * @param StreamTrack|value-of<StreamTrack> $streamTrack
     * @param TranscriptionStartRequest|array{
     *   clientState?: string|null,
     *   commandID?: string|null,
     *   transcriptionEngine?: value-of<TranscriptionEngine>|null,
     *   transcriptionEngineConfig?: Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null,
     *   transcriptionTracks?: string|null,
     * } $transcriptionConfig
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
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
        $obj = new self;

        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $commandID && $obj['commandID'] = $commandID;
        null !== $customHeaders && $obj['customHeaders'] = $customHeaders;
        null !== $preferredCodecs && $obj['preferredCodecs'] = $preferredCodecs;
        null !== $record && $obj['record'] = $record;
        null !== $recordChannels && $obj['recordChannels'] = $recordChannels;
        null !== $recordCustomFileName && $obj['recordCustomFileName'] = $recordCustomFileName;
        null !== $recordFormat && $obj['recordFormat'] = $recordFormat;
        null !== $recordMaxLength && $obj['recordMaxLength'] = $recordMaxLength;
        null !== $recordTimeoutSecs && $obj['recordTimeoutSecs'] = $recordTimeoutSecs;
        null !== $recordTrack && $obj['recordTrack'] = $recordTrack;
        null !== $recordTrim && $obj['recordTrim'] = $recordTrim;
        null !== $sendSilenceWhenIdle && $obj['sendSilenceWhenIdle'] = $sendSilenceWhenIdle;
        null !== $sipHeaders && $obj['sipHeaders'] = $sipHeaders;
        null !== $soundModifications && $obj['soundModifications'] = $soundModifications;
        null !== $streamBidirectionalCodec && $obj['streamBidirectionalCodec'] = $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $obj['streamBidirectionalMode'] = $streamBidirectionalMode;
        null !== $streamBidirectionalTargetLegs && $obj['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;
        null !== $streamCodec && $obj['streamCodec'] = $streamCodec;
        null !== $streamTrack && $obj['streamTrack'] = $streamTrack;
        null !== $streamURL && $obj['streamURL'] = $streamURL;
        null !== $transcription && $obj['transcription'] = $transcription;
        null !== $transcriptionConfig && $obj['transcriptionConfig'] = $transcriptionConfig;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;
        null !== $webhookURLMethod && $obj['webhookURLMethod'] = $webhookURLMethod;

        return $obj;
    }

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['commandID'] = $commandID;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE response.
     *
     * @param list<CustomSipHeader|array{name: string, value: string}> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj['customHeaders'] = $customHeaders;

        return $obj;
    }

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     *
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferredCodecs
     */
    public function withPreferredCodecs(
        PreferredCodecs|string $preferredCodecs
    ): self {
        $obj = clone $this;
        $obj['preferredCodecs'] = $preferredCodecs;

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
        $obj['recordCustomFileName'] = $recordCustomFileName;

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
        $obj['recordMaxLength'] = $recordMaxLength;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['recordTimeoutSecs'] = $recordTimeoutSecs;

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
        $obj['sendSilenceWhenIdle'] = $sendSilenceWhenIdle;

        return $obj;
    }

    /**
     * SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj['sipHeaders'] = $sipHeaders;

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
        $obj['soundModifications'] = $soundModifications;

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
        $obj['streamURL'] = $streamURL;

        return $obj;
    }

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    public function withTranscription(bool $transcription): self
    {
        $obj = clone $this;
        $obj['transcription'] = $transcription;

        return $obj;
    }

    /**
     * @param TranscriptionStartRequest|array{
     *   clientState?: string|null,
     *   commandID?: string|null,
     *   transcriptionEngine?: value-of<TranscriptionEngine>|null,
     *   transcriptionEngineConfig?: Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null,
     *   transcriptionTracks?: string|null,
     * } $transcriptionConfig
     */
    public function withTranscriptionConfig(
        TranscriptionStartRequest|array $transcriptionConfig
    ): self {
        $obj = clone $this;
        $obj['transcriptionConfig'] = $transcriptionConfig;

        return $obj;
    }

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

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
