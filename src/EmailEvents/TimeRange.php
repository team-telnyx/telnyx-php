<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TimeRangeShape = array{
 *   from: \DateTimeInterface|null, to: \DateTimeInterface|null
 * }
 */
final class TimeRange implements BaseModel
{
    /** @use SdkModel<TimeRangeShape> */
    use SdkModel;

    #[Required]
    public ?\DateTimeInterface $from;

    #[Required]
    public ?\DateTimeInterface $to;

    /**
     * `new TimeRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimeRange::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimeRange)->withFrom(...)->withTo(...)
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
        ?\DateTimeInterface $from,
        ?\DateTimeInterface $to
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        return $self;
    }

    public function withFrom(?\DateTimeInterface $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withTo(?\DateTimeInterface $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
