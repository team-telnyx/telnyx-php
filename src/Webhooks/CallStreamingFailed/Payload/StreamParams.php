<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailed\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingFailed\Payload\StreamParams\Track;

/**
 * Streaming parameters as they were originally given to the Call Control API.
 *
 * @phpstan-type StreamParamsShape = array{
 *   streamURL?: string|null, track?: null|Track|value-of<Track>
 * }
 */
final class StreamParams implements BaseModel
{
    /** @use SdkModel<StreamParamsShape> */
    use SdkModel;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Optional('stream_url')]
    public ?string $streamURL;

    /**
     * Specifies which track should be streamed.
     *
     * @var value-of<Track>|null $track
     */
    #[Optional(enum: Track::class)]
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
        $self = new self;

        null !== $streamURL && $self['streamURL'] = $streamURL;
        null !== $track && $self['track'] = $track;

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
     * Specifies which track should be streamed.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
