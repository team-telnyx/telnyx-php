<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack;
use Telnyx\Calls\DialogflowConfig;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start streaming the media from a call to a specific WebSocket address or Dialogflow connection in near-realtime. Audio will be delivered as base64-encoded RTP payload (raw audio), wrapped in JSON payloads.
 *
 * Please find more details about media streaming messages specification under the [link](https://developers.telnyx.com/docs/voice/programmable-voice/media-streaming).
 *
 * @see Telnyx\Calls\Actions->startStreaming
 *
 * @phpstan-type ActionStartStreamingParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   dialogflow_config?: DialogflowConfig,
 *   enable_dialogflow?: bool,
 *   stream_bidirectional_codec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   stream_bidirectional_mode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   stream_bidirectional_sampling_rate?: 8000|16000|22050|24000|48000,
 *   stream_bidirectional_target_legs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   stream_codec?: StreamCodec|value-of<StreamCodec>,
 *   stream_track?: StreamTrack|value-of<StreamTrack>,
 *   stream_url?: string,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    #[Api(optional: true)]
    public ?DialogflowConfig $dialogflow_config;

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    #[Api(optional: true)]
    public ?bool $enable_dialogflow;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $stream_bidirectional_codec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $stream_bidirectional_mode
     * @param 8000|16000|22050|24000|48000 $stream_bidirectional_sampling_rate
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $stream_bidirectional_target_legs
     * @param StreamCodec|value-of<StreamCodec> $stream_codec
     * @param StreamTrack|value-of<StreamTrack> $stream_track
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        ?DialogflowConfig $dialogflow_config = null,
        ?bool $enable_dialogflow = null,
        StreamBidirectionalCodec|string|null $stream_bidirectional_codec = null,
        StreamBidirectionalMode|string|null $stream_bidirectional_mode = null,
        ?int $stream_bidirectional_sampling_rate = null,
        StreamBidirectionalTargetLegs|string|null $stream_bidirectional_target_legs = null,
        StreamCodec|string|null $stream_codec = null,
        StreamTrack|string|null $stream_track = null,
        ?string $stream_url = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $dialogflow_config && $obj->dialogflow_config = $dialogflow_config;
        null !== $enable_dialogflow && $obj->enable_dialogflow = $enable_dialogflow;
        null !== $stream_bidirectional_codec && $obj['stream_bidirectional_codec'] = $stream_bidirectional_codec;
        null !== $stream_bidirectional_mode && $obj['stream_bidirectional_mode'] = $stream_bidirectional_mode;
        null !== $stream_bidirectional_sampling_rate && $obj->stream_bidirectional_sampling_rate = $stream_bidirectional_sampling_rate;
        null !== $stream_bidirectional_target_legs && $obj['stream_bidirectional_target_legs'] = $stream_bidirectional_target_legs;
        null !== $stream_codec && $obj['stream_codec'] = $stream_codec;
        null !== $stream_track && $obj['stream_track'] = $stream_track;
        null !== $stream_url && $obj->stream_url = $stream_url;

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
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

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
}
