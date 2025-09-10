<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartStreamingParams\StreamTrack;
use Telnyx\Calls\DialogflowConfig;
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
 * $params = (new ActionStartStreamingParams); // set properties as needed
 * $client->calls.actions->startStreaming(...$params->toArray());
 * ```
 * Start streaming the media from a call to a specific WebSocket address or Dialogflow connection in near-realtime. Audio will be delivered as base64-encoded RTP payload (raw audio), wrapped in JSON payloads.
 *
 * Please find more details about media streaming messages specification under the [link](https://developers.telnyx.com/docs/voice/programmable-voice/media-streaming).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->startStreaming(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->startStreaming
 *
 * @phpstan-type action_start_streaming_params = array{
 *   clientState?: string,
 *   commandID?: string,
 *   dialogflowConfig?: DialogflowConfig,
 *   enableDialogflow?: bool,
 *   streamBidirectionalCodec?: StreamBidirectionalCodec|value-of<StreamBidirectionalCodec>,
 *   streamBidirectionalMode?: StreamBidirectionalMode|value-of<StreamBidirectionalMode>,
 *   streamBidirectionalTargetLegs?: StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs>,
 *   streamCodec?: StreamCodec|value-of<StreamCodec>,
 *   streamTrack?: StreamTrack|value-of<StreamTrack>,
 *   streamURL?: string,
 * }
 */
final class ActionStartStreamingParams implements BaseModel
{
    /** @use SdkModel<action_start_streaming_params> */
    use SdkModel;
    use SdkParams;

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

    #[Api('dialogflow_config', optional: true)]
    public ?DialogflowConfig $dialogflowConfig;

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    #[Api('enable_dialogflow', optional: true)]
    public ?bool $enableDialogflow;

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
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used. Currently, transcoding is only supported between PCMU and PCMA codecs.
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StreamBidirectionalCodec|value-of<StreamBidirectionalCodec> $streamBidirectionalCodec
     * @param StreamBidirectionalMode|value-of<StreamBidirectionalMode> $streamBidirectionalMode
     * @param StreamBidirectionalTargetLegs|value-of<StreamBidirectionalTargetLegs> $streamBidirectionalTargetLegs
     * @param StreamCodec|value-of<StreamCodec> $streamCodec
     * @param StreamTrack|value-of<StreamTrack> $streamTrack
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        ?DialogflowConfig $dialogflowConfig = null,
        ?bool $enableDialogflow = null,
        StreamBidirectionalCodec|string|null $streamBidirectionalCodec = null,
        StreamBidirectionalMode|string|null $streamBidirectionalMode = null,
        StreamBidirectionalTargetLegs|string|null $streamBidirectionalTargetLegs = null,
        StreamCodec|string|null $streamCodec = null,
        StreamTrack|string|null $streamTrack = null,
        ?string $streamURL = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $dialogflowConfig && $obj->dialogflowConfig = $dialogflowConfig;
        null !== $enableDialogflow && $obj->enableDialogflow = $enableDialogflow;
        null !== $streamBidirectionalCodec && $obj->streamBidirectionalCodec = $streamBidirectionalCodec instanceof StreamBidirectionalCodec ? $streamBidirectionalCodec->value : $streamBidirectionalCodec;
        null !== $streamBidirectionalMode && $obj->streamBidirectionalMode = $streamBidirectionalMode instanceof StreamBidirectionalMode ? $streamBidirectionalMode->value : $streamBidirectionalMode;
        null !== $streamBidirectionalTargetLegs && $obj->streamBidirectionalTargetLegs = $streamBidirectionalTargetLegs instanceof StreamBidirectionalTargetLegs ? $streamBidirectionalTargetLegs->value : $streamBidirectionalTargetLegs;
        null !== $streamCodec && $obj->streamCodec = $streamCodec instanceof StreamCodec ? $streamCodec->value : $streamCodec;
        null !== $streamTrack && $obj->streamTrack = $streamTrack instanceof StreamTrack ? $streamTrack->value : $streamTrack;
        null !== $streamURL && $obj->streamURL = $streamURL;

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

    public function withDialogflowConfig(
        DialogflowConfig $dialogflowConfig
    ): self {
        $obj = clone $this;
        $obj->dialogflowConfig = $dialogflowConfig;

        return $obj;
    }

    /**
     * Enables Dialogflow for the current call. The default value is false.
     */
    public function withEnableDialogflow(bool $enableDialogflow): self
    {
        $obj = clone $this;
        $obj->enableDialogflow = $enableDialogflow;

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
     * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used. Currently, transcoding is only supported between PCMU and PCMA codecs.
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
}
