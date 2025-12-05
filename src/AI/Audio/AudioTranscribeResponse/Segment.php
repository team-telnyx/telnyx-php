<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeResponse;

use Telnyx\Core\Attributes\Api;
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
    #[Api]
    public float $id;

    /**
     * End time of the segment in seconds.
     */
    #[Api]
    public float $end;

    /**
     * Start time of the segment in seconds.
     */
    #[Api]
    public float $start;

    /**
     * Text content of the segment.
     */
    #[Api]
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['end'] = $end;
        $obj['start'] = $start;
        $obj['text'] = $text;

        return $obj;
    }

    /**
     * Unique identifier of the segment.
     */
    public function withID(float $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * End time of the segment in seconds.
     */
    public function withEnd(float $end): self
    {
        $obj = clone $this;
        $obj['end'] = $end;

        return $obj;
    }

    /**
     * Start time of the segment in seconds.
     */
    public function withStart(float $start): self
    {
        $obj = clone $this;
        $obj['start'] = $start;

        return $obj;
    }

    /**
     * Text content of the segment.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }
}
