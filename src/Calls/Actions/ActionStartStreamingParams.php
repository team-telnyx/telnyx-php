<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartStreamingParams\CustomParameter;
use Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack;
use Telnyx\Calls\DialogflowConfig;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start streaming the media from a call to a specific WebSocket address or Dialogflow connection in near-realtime. Audio will be delivered as base64-encoded RTP payload (raw audio), wrapped in JSON payloads.
 *
 * Please find more details about media streaming messages specification under the [link](https://developers.telnyx.com/docs/voice/programmable-voice/media-streaming).
 *
 * @see Telnyx\Services\Calls\ActionsService::startStreaming()
 *
 * @phpstan-import-type CustomParameterShape from \Telnyx\Calls\Actions\ActionStartStreamingParams\CustomParameter
 * @phpstan-import-type DialogflowConfigShape from \Telnyx\Calls\DialogflowConfig
 *
 * @phpstan-type ActionStartStreamingParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   customParameters?: list<CustomParameter|CustomParameterShape>|null,
 *   dialogflowConfig?: null|DialogflowConfig|DialogflowConfigShape,
 *   enableDialogflow?: bool|null,
 *   streamAuthToken?: string|null,
 *   streamBidirectionalCodec?: null|StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: null|StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalSamplingRate?: null|StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate>,
 *   streamBidirectionalTargetLegs?: null|StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: null|StreamCodec|value-of<StreamCodec>,
 *   streamTrack?: null|StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string|null,
 * }
 */
final class ActionStartStreamingParams implements BaseModel
{
    /** @use SdkModel<ActionStartStreamingParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * Custom parameters to be sent as part of the WebSocket connection.
     *
     * @var list<CustomParameter>|null $customParameters
     */
    #[Optional('custom_parameters', list: CustomParameter::class)]
    public ?array $customParameters;

    #[Optional('dialogflow_config')]
    public ?DialogflowConfig $dialogflowConfig;

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    #[Optional('enable_dialogflow')]
    public ?bool $enableDialogflow;

    /**
     * An authentication token to be sent as part of the WebSocket connection. Maximum length is 4000 characters.
     */
    #[Optional('stream_auth_token')]
    public ?string $streamAuthToken;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CustomParameter|CustomParameterShape>|null $customParameters
     * @param DialogflowConfig|DialogflowConfigShape|null $dialogflowConfig
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>|null $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode>|null $streamBidirectionalMode
     * @param StreamBidirectionalSamplingRate|value-of<StreamBidirectionalSamplingRate>|null $streamBidirectionalSamplingRate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>|null $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec>|null $streamCodec
     * @param StreamTrack|value-of<StreamTrack>|null $streamTrack
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customParameters = null,
        DialogflowConfig|array|null $dialogflowConfig = null,
        ?bool $enableDialogflow = null,
        ?string $streamAuthToken = null,
        StreamBidirectionalCodec|string|null $streamBidirectionalCodec = null,
        StreamBidirectionalMode|string|null $streamBidirectionalMode = null,
        StreamBidirectionalSamplingRate|int|null $streamBidirectionalSamplingRate = null,
        StreamBidirectionalTargetLegs|string|null $streamBidirectionalTargetLegs = null,
        StreamCodec|string|null $streamCodec = null,
        StreamTrack|string|null $streamTrack = null,
        ?string $streamURL = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customParameters && $self['customParameters'] = $customParameters;
        null !== $dialogflowConfig && $self['dialogflowConfig'] = $dialogflowConfig;
        null !== $enableDialogflow && $self['enableDialogflow'] = $enableDialogflow;
        null !== $streamAuthToken && $self['streamAuthToken'] = $streamAuthToken;
        null !== $streamBidirectionalCodec && $self['streamBidirectionalCodec'] = $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $self['streamBidirectionalMode'] = $streamBidirectionalMode;
        null !== $streamBidirectionalSamplingRate && $self['streamBidirectionalSamplingRate'] = $streamBidirectionalSamplingRate;
        null !== $streamBidirectionalTargetLegs && $self['streamBidirectionalTargetLegs'] = $streamBidirectionalTargetLegs;
        null !== $streamCodec && $self['streamCodec'] = $streamCodec;
        null !== $streamTrack && $self['streamTrack'] = $streamTrack;
        null !== $streamURL && $self['streamURL'] = $streamURL;

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
     * Custom parameters to be sent as part of the WebSocket connection.
     *
     * @param list<CustomParameter|CustomParameterShape> $customParameters
     */
    public function withCustomParameters(array $customParameters): self
    {
        $self = clone $this;
        $self['customParameters'] = $customParameters;

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
     * An authentication token to be sent as part of the WebSocket connection. Maximum length is 4000 characters.
     */
    public function withStreamAuthToken(string $streamAuthToken): self
    {
        $self = clone $this;
        $self['streamAuthToken'] = $streamAuthToken;

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
}
