<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Created at date range filtering operations.
 *
 * @phpstan-type CreatedAtShape = array{
 *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
 * }
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    /**
     * Filter by created at greater than or equal to.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gte;

    /**
     * Filter by created at less than or equal to.
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
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lte = null
    ): self {
        $obj = new self;

        null !== $gte && $obj->gte = $gte;
        null !== $lte && $obj->lte = $lte;

        return $obj;
    }

    /**
     * Filter by created at greater than or equal to.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $obj = clone $this;
        $obj->gte = $gte;

        return $obj;
    }

    /**
     * Filter by created at less than or equal to.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $obj = clone $this;
        $obj->lte = $lte;

        return $obj;
    }
}
