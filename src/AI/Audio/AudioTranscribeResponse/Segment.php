<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SegmentShape = array{
 *   id: float, end: float, start: float, text: string
 * }
 */
final class Segment implements BaseModel
{
    /** @use SdkModel<SegmentShape> */
    use SdkModel;

    /**
     * Unique identifier of the segment.
     */
    #[Required]
    public float $id;

    /**
     * End time of the segment in seconds.
     */
    #[Required]
    public float $end;

    /**
     * Start time of the segment in seconds.
     */
    #[Required]
    public float $start;

    /**
     * Text content of the segment.
     */
    #[Required]
    public string $text;

    /**
     * `new Segment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Segment::with(id: ..., end: ..., start: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Segment)->withID(...)->withEnd(...)->withStart(...)->withText(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        float $id,
        float $end,
        float $start,
        string $text
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['end'] = $end;
        $self['start'] = $start;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Unique identifier of the segment.
     */
    public function withID(float $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * End time of the segment in seconds.
     */
    public function withEnd(float $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * Start time of the segment in seconds.
     */
    public function withStart(float $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    /**
     * Text content of the segment.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
