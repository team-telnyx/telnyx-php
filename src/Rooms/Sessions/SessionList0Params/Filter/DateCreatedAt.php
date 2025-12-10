<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\SessionList0Params\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DateCreatedAtShape = array{
 *   eq?: string|null, gte?: string|null, lte?: string|null
 * }
 */
final class DateCreatedAt implements BaseModel
{
    /** @use SdkModel<DateCreatedAtShape> */
    use SdkModel;

    /**
     * ISO 8601 date for filtering room sessions created on that date.
     */
    #[Optional]
    public ?string $eq;

    /**
     * ISO 8601 date for filtering room sessions created on or after that date.
     */
    #[Optional]
    public ?string $gte;

    /**
     * ISO 8601 date for filtering room sessions created on or before that date.
     */
    #[Optional]
    public ?string $lte;

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
        ?string $eq = null,
        ?string $gte = null,
        ?string $lte = null
    ): self {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;
        null !== $gte && $self['gte'] = $gte;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * ISO 8601 date for filtering room sessions created on that date.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }

    /**
     * ISO 8601 date for filtering room sessions created on or after that date.
     */
    public function withGte(string $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * ISO 8601 date for filtering room sessions created on or before that date.
     */
    public function withLte(string $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
