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
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionAnswerParams); // set properties as needed
 * $client->calls.actions->answer(...$params->toArray());
 * ```
 * Answer an incoming call. You must issue this command before executing subsequent commands on an incoming call.
 *
 * **Expected Webhooks:**
 *
 * - `call.answered`
 * - `streaming.started`, `streaming.stopped` or `streaming.failed` if `stream_url` was set
 *
 * When the `record` parameter is set to `record-from-answer`, the response will include a `recording_id` field.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->answer(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->answer
 *
 * @phpstan-type action_answer_params = array{
 *   billingGroupID?: string,
 *   clientState?: string,
 *   commandID?: string,
 *   customHeaders?: list<CustomSipHeader>,
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
 *   sipHeaders?: list<SipHeader>,
 *   soundModifications?: SoundModifications,
 *   streamBidirectionalCodec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalTargetLegs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: StreamCodec|value-of<StreamCodec>,
 *   streamTrack?: StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string,
 *   transcription?: bool,
 *   transcriptionConfig?: TranscriptionStartRequest,
 *   webhookURL?: string,
 *   webhookURLMethod?: WebhookURLMethod|value-of<WebhookURLMethod>,
 * }
 */
final class ActionAnswerParams implements BaseModel
{
    /** @use SdkModel<action_answer_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to set the Billing Group ID for the call. Must be a valid and existing Billing Group ID.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Custom headers to be added to the SIP INVITE response.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomSipHeader::class, optional: true)]
    public ?array $customHeaders;

    /**
     * The list of comma-separated codecs in a preferred order for the forked media to be received.
     *
     * @var value-of<PreferredCodecs>|null $preferredCodecs
     */
    #[Api('preferred_codecs', enum: PreferredCodecs::class, optional: true)]
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
     * SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Api('sip_headers', list: SipHeader::class, optional: true)]
    public ?array $sipHeaders;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CustomSipHeader> $customHeaders
     * @param PreferredCodecs|value-of<PreferredCodecs> $preferredCodecs
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     * @param list<SipHeader> $sipHeaders
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec> $streamCodec
     * @param StreamTrack|value-of<StreamTrack> $streamTrack
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
        ?SoundModifications $soundModifications = null,
        StreamBidirectionalCodec|string|null $streamBidirectionalCodec = null,
        StreamBidirectionalMode|string|null $streamBidirectionalMode = null,
        StreamBidirectionalTargetLegs|string|null $streamBidirectionalTargetLegs = null,
        StreamCodec|string|null $streamCodec = null,
        StreamTrack|string|null $streamTrack = null,
        ?string $streamURL = null,
        ?bool $transcription = null,
        ?TranscriptionStartRequest $transcriptionConfig = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string|null $webhookURLMethod = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $preferredCodecs && $obj->preferredCodecs = $preferredCodecs instanceof PreferredCodecs ? $preferredCodecs->value : $preferredCodecs;
        null !== $record && $obj->record = $record instanceof Record ? $record->value : $record;
        null !== $recordChannels && $obj->recordChannels = $recordChannels instanceof RecordChannels ? $recordChannels->value : $recordChannels;
        null !== $recordCustomFileName && $obj->recordCustomFileName = $recordCustomFileName;
        null !== $recordFormat && $obj->recordFormat = $recordFormat instanceof RecordFormat ? $recordFormat->value : $recordFormat;
        null !== $recordMaxLength && $obj->recordMaxLength = $recordMaxLength;
        null !== $recordTimeoutSecs && $obj->recordTimeoutSecs = $recordTimeoutSecs;
        null !== $recordTrack && $obj->recordTrack = $recordTrack instanceof RecordTrack ? $recordTrack->value : $recordTrack;
        null !== $recordTrim && $obj->recordTrim = $recordTrim instanceof RecordTrim ? $recordTrim->value : $recordTrim;
        null !== $sendSilenceWhenIdle && $obj->sendSilenceWhenIdle = $sendSilenceWhenIdle;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;
        null !== $soundModifications && $obj->soundModifications = $soundModifications;
        null !== $streamBidirectionalCodec && $obj->streamBidirectionalCodec = $streamBidirectionalCodec instanceof StreamBidirectionalCodec ? $streamBidirectionalCodec->value : $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $obj->streamBidirectionalMode = $streamBidirectionalMode instanceof StreamBidirectionalMode ? $streamBidirectionalMode->value : $streamBidirectionalMode;
        null !== $streamBidirectionalTargetLegs && $obj->streamBidirectionalTargetLegs = $streamBidirectionalTargetLegs instanceof StreamBidirectionalTargetLegs ? $streamBidirectionalTargetLegs->value : $streamBidirectionalTargetLegs;
        null !== $streamCodec && $obj->streamCodec = $streamCodec instanceof StreamCodec ? $streamCodec->value : $streamCodec;
        null !== $streamTrack && $obj->streamTrack = $streamTrack instanceof StreamTrack ? $streamTrack->value : $streamTrack;
        null !== $streamURL && $obj->streamURL = $streamURL;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $transcriptionConfig && $obj->transcriptionConfig = $transcriptionConfig;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;
        null !== $webhookURLMethod && $obj->webhookURLMethod = $webhookURLMethod instanceof WebhookURLMethod ? $webhookURLMethod->value : $webhookURLMethod;

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
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE response.
     *
     * @param list<CustomSipHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

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
        $obj->preferredCodecs = $preferredCodecs instanceof PreferredCodecs ? $preferredCodecs->value : $preferredCodecs;

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
        $obj->record = $record instanceof Record ? $record->value : $record;

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
        $obj->recordChannels = $recordChannels instanceof RecordChannels ? $recordChannels->value : $recordChannels;

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
        $obj->recordFormat = $recordFormat instanceof RecordFormat ? $recordFormat->value : $recordFormat;

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
        $obj->recordTrack = $recordTrack instanceof RecordTrack ? $recordTrack->value : $recordTrack;

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
        $obj->recordTrim = $recordTrim instanceof RecordTrim ? $recordTrim->value : $recordTrim;

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
     * SIP headers to be added to the SIP INVITE response. Currently only User-to-User header is supported.
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
        $obj->streamBidirectionalCodec = $streamBidirectionalCodec instanceof StreamBidirectionalCodec ? $streamBidirectionalCodec->value : $streamBidirectionalCodec;

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
        $obj->streamBidirectionalMode = $streamBidirectionalMode instanceof StreamBidirectionalMode ? $streamBidirectionalMode->value : $streamBidirectionalMode;

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
        $obj->streamBidirectionalTargetLegs = $streamBidirectionalTargetLegs instanceof StreamBidirectionalTargetLegs ? $streamBidirectionalTargetLegs->value : $streamBidirectionalTargetLegs;

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
        $obj->streamCodec = $streamCodec instanceof StreamCodec ? $streamCodec->value : $streamCodec;

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
        $obj->streamTrack = $streamTrack instanceof StreamTrack ? $streamTrack->value : $streamTrack;

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
        $obj->webhookURLMethod = $webhookURLMethod instanceof WebhookURLMethod ? $webhookURLMethod->value : $webhookURLMethod;

        return $obj;
    }
}
