<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter by inserted_at date range using nested operations.
 *
 * @phpstan-type InsertedAtShape = array{
 *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
 * }
 */
final class InsertedAt implements BaseModel
{
    /** @use SdkModel<InsertedAtShape> */
    use SdkModel;

    /**
     * Filter by inserted_at date greater than or equal.
     */
    #[Optional]
    public ?\DateTimeInterface $gte;

    /**
     * Filter by inserted_at date less than or equal.
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
        $self = new self;

        null !== $gte && $self['gte'] = $gte;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * Filter by inserted_at date greater than or equal.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * Filter by inserted_at date less than or equal.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
