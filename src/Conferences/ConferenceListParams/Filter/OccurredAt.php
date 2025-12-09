<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Event occurred_at filters.
 *
 * @phpstan-type OccurredAtShape = array{
 *   eq?: string|null,
 *   gt?: string|null,
 *   gte?: string|null,
 *   lt?: string|null,
 *   lte?: string|null,
 * }
 */
final class OccurredAt implements BaseModel
{
    /** @use SdkModel<OccurredAtShape> */
    use SdkModel;

    /**
     * Event occurred_at: equal.
     */
    #[Optional]
    public ?string $eq;

    /**
     * Event occurred_at: greater than.
     */
    #[Optional]
    public ?string $gt;

    /**
     * Event occurred_at: greater than or equal.
     */
    #[Optional]
    public ?string $gte;

    /**
     * Event occurred_at: lower than.
     */
    #[Optional]
    public ?string $lt;

    /**
     * Event occurred_at: lower than or equal.
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
        ?string $gt = null,
        ?string $gte = null,
        ?string $lt = null,
        ?string $lte = null,
    ): self {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;
        null !== $gt && $self['gt'] = $gt;
        null !== $gte && $self['gte'] = $gte;
        null !== $lt && $self['lt'] = $lt;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * Event occurred_at: equal.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }

    /**
     * Event occurred_at: greater than.
     */
    public function withGt(string $gt): self
    {
        $self = clone $this;
        $self['gt'] = $gt;

        return $self;
    }

    /**
     * Event occurred_at: greater than or equal.
     */
    public function withGte(string $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * Event occurred_at: lower than.
     */
    public function withLt(string $lt): self
    {
        $self = clone $this;
        $self['lt'] = $lt;

        return $self;
    }

    /**
     * Event occurred_at: lower than or equal.
     */
    public function withLte(string $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
