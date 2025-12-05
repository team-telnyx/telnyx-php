<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingFailedWebhookEvent\Data\Payload\StreamParams\Track;

/**
 * Streaming parameters as they were originally given to the Call Control API.
 *
 * @phpstan-type StreamParamsShape = array{
 *   stream_url?: string|null, track?: value-of<Track>|null
 * }
 */
final class StreamParams implements BaseModel
{
    /** @use SdkModel<StreamParamsShape> */
    use SdkModel;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Api(optional: true)]
    public ?string $stream_url;

    /**
     * Specifies which track should be streamed.
     *
     * @var value-of<Track>|null $track
     */
    #[Api(enum: Track::class, optional: true)]
    public ?string $track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Track|value-of<Track> $track
     */
    public static function with(
        ?string $stream_url = null,
        Track|string|null $track = null
    ): self {
        $obj = new self;

        null !== $stream_url && $obj['stream_url'] = $stream_url;
        null !== $track && $obj['track'] = $track;

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
     * Specifies which track should be streamed.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }
}
