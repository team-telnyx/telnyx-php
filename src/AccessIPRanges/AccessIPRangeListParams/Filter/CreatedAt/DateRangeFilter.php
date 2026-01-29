<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Date range filtering operations.
 *
 * @phpstan-type DateRangeFilterShape = array{
 *   gt?: \DateTimeInterface|null,
 *   gte?: \DateTimeInterface|null,
 *   lt?: \DateTimeInterface|null,
 *   lte?: \DateTimeInterface|null,
 * }
 */
final class DateRangeFilter implements BaseModel
{
    /** @use SdkModel<DateRangeFilterShape> */
    use SdkModel;

    /**
     * Filter for creation date-time greater than.
     */
    #[Optional]
    public ?\DateTimeInterface $gt;

    /**
     * Filter for creation date-time greater than or equal to.
     */
    #[Optional]
    public ?\DateTimeInterface $gte;

    /**
     * Filter for creation date-time less than.
     */
    #[Optional]
    public ?\DateTimeInterface $lt;

    /**
     * Filter for creation date-time less than or equal to.
     */
    #[Optional]
    public ?\DateTimeInterface $lte;

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
        ?\DateTimeInterface $gt = null,
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lt = null,
        ?\DateTimeInterface $lte = null,
    ): self {
        $self = new self;

        null !== $gt && $self['gt'] = $gt;
        null !== $gte && $self['gte'] = $gte;
        null !== $lt && $self['lt'] = $lt;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * Filter for creation date-time greater than.
     */
    public function withGt(\DateTimeInterface $gt): self
    {
        $self = clone $this;
        $self['gt'] = $gt;

        return $self;
    }

    /**
     * Filter for creation date-time greater than or equal to.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * Filter for creation date-time less than.
     */
    public function withLt(\DateTimeInterface $lt): self
    {
        $self = clone $this;
        $self['lt'] = $lt;

        return $self;
    }

    /**
     * Filter for creation date-time less than or equal to.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
