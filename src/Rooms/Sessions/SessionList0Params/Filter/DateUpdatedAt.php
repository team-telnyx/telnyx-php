<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\SessionList0Params\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DateUpdatedAtShape = array{
 *   eq?: \DateTimeInterface, gte?: \DateTimeInterface, lte?: \DateTimeInterface
 * }
 */
final class DateUpdatedAt implements BaseModel
{
    /** @use SdkModel<DateUpdatedAtShape> */
    use SdkModel;

    /**
     * ISO 8601 date for filtering room sessions updated on that date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $eq;

    /**
     * ISO 8601 date for filtering room sessions updated on or after that date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gte;

    /**
     * ISO 8601 date for filtering room sessions updated on or before that date.
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
        ?\DateTimeInterface $eq = null,
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lte = null,
    ): self {
        $obj = new self;

        null !== $eq && $obj->eq = $eq;
        null !== $gte && $obj->gte = $gte;
        null !== $lte && $obj->lte = $lte;

        return $obj;
    }

    /**
     * ISO 8601 date for filtering room sessions updated on that date.
     */
    public function withEq(\DateTimeInterface $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }

    /**
     * ISO 8601 date for filtering room sessions updated on or after that date.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $obj = clone $this;
        $obj->gte = $gte;

        return $obj;
    }

    /**
     * ISO 8601 date for filtering room sessions updated on or before that date.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $obj = clone $this;
        $obj->lte = $lte;

        return $obj;
    }
}
