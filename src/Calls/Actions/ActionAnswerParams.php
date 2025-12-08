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
 *   billing_group_id?: string,
 *   client_state?: string,
 *   command_id?: string,
 *   custom_headers?: list<CustomSipHeader|array{name: string, value: string}>,
 *   preferred_codecs?: PreferredCodecs|value-of<PreferredCodecs>,
 *   record?: Record|value-of<Record>,
 *   record_channels?: RecordChannels|value-of<RecordChannels>,
 *   record_custom_file_name?: string,
 *   record_format?: RecordFormat|value-of<RecordFormat>,
 *   record_max_length?: int,
 *   record_timeout_secs?: int,
 *   record_track?: RecordTrack|value-of<RecordTrack>,
 *   record_trim?: RecordTrim|value-of<RecordTrim>,
 *   send_silence_when_idle?: bool,
 *   sip_headers?: list<SipHeader|array{name: value-of<Name>, value: string}>,
 *   sound_modifications?: SoundModifications|array{
 *     octaves?: float|null,
 *     pitch?: float|null,
 *     semitone?: float|null,
 *     track?: string|null,
 *   },
 *   stream_bidirectional_codec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   stream_bidirectional_mode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   stream_bidirectional_target_legs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   stream_codec?: StreamCodec|value-of<StreamCodec>,
 *   stream_track?: StreamTrack|value-of<StreamTrack>,
 *   stream_url?: string,
 *   transcription?: bool,
 *   transcription_config?: TranscriptionStartRequest|array{
 *     client_state?: string|null,
 *     command_id?: string|null,
 *     transcription_engine?: value-of<TranscriptionEngine>|null,
 *     transcription_engine_config?: null|Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig,
 *     transcription_tracks?: string|null,
 *   },
 *   webhook_url?: string,
 *   webhook_url_method?: WebhookURLMethod|value-of<WebhookURLMethod>,
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
    #[Optional]
    public ?string $billing_group_id;

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
     * Custom headers to be added to the SIP INVITE response.
     *
     * @var list<CustomSipHeader>|null $custom_headers
     */
    #[Optional(list: CustomSipHeader::class)]
    public ?array $custom_headers;

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     *
     * @var value-of<PreferredCodecs>|null $preferred_codecs
     */
    #[Optional(enum: PreferredCodecs::class)]
    public ?string $preferred_codecs;

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
     * Generate silence RTP packets when no transmission available.
     */
    #[Optional]
    public ?bool $send_silence_when_idle;

    /**
     * SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sip_headers
     */
    #[Optional(list: SipHeader::class)]
    public ?array $sip_headers;

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    #[Optional]
    public ?SoundModifications $sound_modifications;

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @var value-of<StreamBidirectionalCodec>|null $stream_bidirectional_codec
     */
    #[Optional(enum: StreamBidirectionalCodec::class)]
    public ?string $stream_bidirectional_codec;

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @var value-of<StreamBidirectionalMode>|null $stream_bidirectional_mode
     */
    #[Optional(enum: StreamBidirectionalMode::class)]
    public ?string $stream_bidirectional_mode;

    /**
     * Specifies which call legs should receive the bidirectional stream audio.
     *
     * @var value-of<StreamBidirectionalTargetLegs>|null $stream_bidirectional_target_legs
     */
    #[Optional(enum: StreamBidirectionalTargetLegs::class)]
    public ?string $stream_bidirectional_target_legs;

    /**
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
     *
     * @var value-of<StreamCodec>|null $stream_codec
     */
    #[Optional(enum: StreamCodec::class)]
    public ?string $stream_codec;

    /**
     * Specifies which track should be streamed.
     *
     * @var value-of<StreamTrack>|null $stream_track
     */
    #[Optional(enum: StreamTrack::class)]
    public ?string $stream_track;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Optional]
    public ?string $stream_url;

    /**
     * Enable transcription upon call answer. The default value is false.
     */
    #[Optional]
    public ?bool $transcription;

    #[Optional]
    public ?TranscriptionStartRequest $transcription_config;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CustomSipHeader|array{name: string, value: string}> $custom_headers
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferred_codecs
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $record_channels
     * @param RecordFormat|value-of<RecordFormat> $record_format
     * @param RecordTrack|value-of<RecordTrack> $record_track
     * @param RecordTrim|value-of<RecordTrim> $record_trim
     * @param list<SipHeader|array{name: value-of<Name>, value: string}> $sip_headers
     * @param SoundModifications|array{
     *   octaves?: float|null,
     *   pitch?: float|null,
     *   semitone?: float|null,
     *   track?: string|null,
     * } $sound_modifications
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $stream_bidirectional_codec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $stream_bidirectional_mode
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $stream_bidirectional_target_legs
     * @param StreamCodec|value-of<StreamCodec> $stream_codec
     * @param StreamTrack|value-of<StreamTrack> $stream_track
     * @param TranscriptionStartRequest|array{
     *   client_state?: string|null,
     *   command_id?: string|null,
     *   transcription_engine?: value-of<TranscriptionEngine>|null,
     *   transcription_engine_config?: Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null,
     *   transcription_tracks?: string|null,
     * } $transcription_config
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhook_url_method
     */
    public static function with(
        ?string $billing_group_id = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?array $custom_headers = null,
        PreferredCodecs|string|null $preferred_codecs = null,
        Record|string|null $record = null,
        RecordChannels|string|null $record_channels = null,
        ?string $record_custom_file_name = null,
        RecordFormat|string|null $record_format = null,
        ?int $record_max_length = null,
        ?int $record_timeout_secs = null,
        RecordTrack|string|null $record_track = null,
        RecordTrim|string|null $record_trim = null,
        ?bool $send_silence_when_idle = null,
        ?array $sip_headers = null,
        SoundModifications|array|null $sound_modifications = null,
        StreamBidirectionalCodec|string|null $stream_bidirectional_codec = null,
        StreamBidirectionalMode|string|null $stream_bidirectional_mode = null,
        StreamBidirectionalTargetLegs|string|null $stream_bidirectional_target_legs = null,
        StreamCodec|string|null $stream_codec = null,
        StreamTrack|string|null $stream_track = null,
        ?string $stream_url = null,
        ?bool $transcription = null,
        TranscriptionStartRequest|array|null $transcription_config = null,
        ?string $webhook_url = null,
        WebhookURLMethod|string|null $webhook_url_method = null,
    ): self {
        $obj = new self;

        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $custom_headers && $obj['custom_headers'] = $custom_headers;
        null !== $preferred_codecs && $obj['preferred_codecs'] = $preferred_codecs;
        null !== $record && $obj['record'] = $record;
        null !== $record_channels && $obj['record_channels'] = $record_channels;
        null !== $record_custom_file_name && $obj['record_custom_file_name'] = $record_custom_file_name;
        null !== $record_format && $obj['record_format'] = $record_format;
        null !== $record_max_length && $obj['record_max_length'] = $record_max_length;
        null !== $record_timeout_secs && $obj['record_timeout_secs'] = $record_timeout_secs;
        null !== $record_track && $obj['record_track'] = $record_track;
        null !== $record_trim && $obj['record_trim'] = $record_trim;
        null !== $send_silence_when_idle && $obj['send_silence_when_idle'] = $send_silence_when_idle;
        null !== $sip_headers && $obj['sip_headers'] = $sip_headers;
        null !== $sound_modifications && $obj['sound_modifications'] = $sound_modifications;
        null !== $stream_bidirectional_codec && $obj['stream_bidirectional_codec'] = $stream_bidirectional_codec;
        null !== $stream_bidirectional_mode && $obj['stream_bidirectional_mode'] = $stream_bidirectional_mode;
        null !== $stream_bidirectional_target_legs && $obj['stream_bidirectional_target_legs'] = $stream_bidirectional_target_legs;
        null !== $stream_codec && $obj['stream_codec'] = $stream_codec;
        null !== $stream_track && $obj['stream_track'] = $stream_track;
        null !== $stream_url && $obj['stream_url'] = $stream_url;
        null !== $transcription && $obj['transcription'] = $transcription;
        null !== $transcription_config && $obj['transcription_config'] = $transcription_config;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;
        null !== $webhook_url_method && $obj['webhook_url_method'] = $webhook_url_method;

        return $obj;
    }

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

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
     * Custom headers to be added to the SIP INVITE response.
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
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     *
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferredCodecs
     */
    public function withPreferredCodecs(
        PreferredCodecs|string $preferredCodecs
    ): self {
        $obj = clone $this;
        $obj['preferred_codecs'] = $preferredCodecs;

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
     * Generate silence RTP packets when no transmission available.
     */
    public function withSendSilenceWhenIdle(bool $sendSilenceWhenIdle): self
    {
        $obj = clone $this;
        $obj['send_silence_when_idle'] = $sendSilenceWhenIdle;

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
        $obj['sip_headers'] = $sipHeaders;

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
        $obj['stream_url'] = $streamURL;

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
     *   client_state?: string|null,
     *   command_id?: string|null,
     *   transcription_engine?: value-of<TranscriptionEngine>|null,
     *   transcription_engine_config?: Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null,
     *   transcription_tracks?: string|null,
     * } $transcriptionConfig
     */
    public function withTranscriptionConfig(
        TranscriptionStartRequest|array $transcriptionConfig
    ): self {
        $obj = clone $this;
        $obj['transcription_config'] = $transcriptionConfig;

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
