<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\StreamingFailedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\StreamingFailedWebhookEvent\Data\Payload\StreamParams\Track;

/**
 * Streaming parameters as they were originally given to the Call Control API.
 *
 * @phpstan-type stream_params = array{streamURL?: string, track?: value-of<Track>}
 */
final class StreamParams implements BaseModel
{
    /** @use SdkModel<stream_params> */
    use SdkModel;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Api('stream_url', optional: true)]
    public ?string $streamURL;

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
        ?string $streamURL = null,
        Track|string|null $track = null
    ): self {
        $obj = new self;

        null !== $streamURL && $obj->streamURL = $streamURL;
        null !== $track && $obj->track = $track instanceof Track ? $track->value : $track;

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
     * Specifies which track should be streamed.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $obj = clone $this;
        $obj->track = $track instanceof Track ? $track->value : $track;

        return $obj;
    }
}
