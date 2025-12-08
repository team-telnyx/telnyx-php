<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter by ported_out_at date range using nested operations.
 *
 * @phpstan-type PortedOutAtShape = array{
 *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
 * }
 */
final class PortedOutAt implements BaseModel
{
    /** @use SdkModel<PortedOutAtShape> */
    use SdkModel;

    /**
     * Filter by ported_out_at date greater than or equal.
     */
    #[Optional]
    public ?\DateTimeInterface $gte;

    /**
     * Filter by ported_out_at date less than or equal.
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
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lte = null
    ): self {
        $obj = new self;

        null !== $gte && $obj['gte'] = $gte;
        null !== $lte && $obj['lte'] = $lte;

        return $obj;
    }

    /**
     * Filter by ported_out_at date greater than or equal.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $obj = clone $this;
        $obj['gte'] = $gte;

        return $obj;
    }

    /**
     * Filter by ported_out_at date less than or equal.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $obj = clone $this;
        $obj['lte'] = $lte;

        return $obj;
    }
}
