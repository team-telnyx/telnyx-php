<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CreatedAt;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Date range filtering operations.
 *
 * @phpstan-type date_range_filter = array{
 *   gt?: \DateTimeInterface|null,
 *   gte?: \DateTimeInterface|null,
 *   lt?: \DateTimeInterface|null,
 *   lte?: \DateTimeInterface|null,
 * }
 */
final class DateRangeFilter implements BaseModel
{
    /** @use SdkModel<date_range_filter> */
    use SdkModel;

    /**
     * Filter for creation date-time greater than.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gt;

    /**
     * Filter for creation date-time greater than or equal to.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gte;

    /**
     * Filter for creation date-time less than.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $lt;

    /**
     * Filter for creation date-time less than or equal to.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $gt && $obj->gt = $gt;
        null !== $gte && $obj->gte = $gte;
        null !== $lt && $obj->lt = $lt;
        null !== $lte && $obj->lte = $lte;

        return $obj;
    }

    /**
     * Filter for creation date-time greater than.
     */
    public function withGt(\DateTimeInterface $gt): self
    {
        $obj = clone $this;
        $obj->gt = $gt;

        return $obj;
    }

    /**
     * Filter for creation date-time greater than or equal to.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $obj = clone $this;
        $obj->gte = $gte;

        return $obj;
    }

    /**
     * Filter for creation date-time less than.
     */
    public function withLt(\DateTimeInterface $lt): self
    {
        $obj = clone $this;
        $obj->lt = $lt;

        return $obj;
    }

    /**
     * Filter for creation date-time less than or equal to.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $obj = clone $this;
        $obj->lte = $lte;

        return $obj;
    }
}
