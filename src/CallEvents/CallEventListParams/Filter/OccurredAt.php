<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListParams\Filter;

use Telnyx\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?string $eq;

    /**
     * Event occurred_at: greater than.
     */
    #[Api(optional: true)]
    public ?string $gt;

    /**
     * Event occurred_at: greater than or equal.
     */
    #[Api(optional: true)]
    public ?string $gte;

    /**
     * Event occurred_at: lower than.
     */
    #[Api(optional: true)]
    public ?string $lt;

    /**
     * Event occurred_at: lower than or equal.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $eq && $obj['eq'] = $eq;
        null !== $gt && $obj['gt'] = $gt;
        null !== $gte && $obj['gte'] = $gte;
        null !== $lt && $obj['lt'] = $lt;
        null !== $lte && $obj['lte'] = $lte;

        return $obj;
    }

    /**
     * Event occurred_at: equal.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * Event occurred_at: greater than.
     */
    public function withGt(string $gt): self
    {
        $obj = clone $this;
        $obj['gt'] = $gt;

        return $obj;
    }

    /**
     * Event occurred_at: greater than or equal.
     */
    public function withGte(string $gte): self
    {
        $obj = clone $this;
        $obj['gte'] = $gte;

        return $obj;
    }

    /**
     * Event occurred_at: lower than.
     */
    public function withLt(string $lt): self
    {
        $obj = clone $this;
        $obj['lt'] = $lt;

        return $obj;
    }

    /**
     * Event occurred_at: lower than or equal.
     */
    public function withLte(string $lte): self
    {
        $obj = clone $this;
        $obj['lte'] = $lte;

        return $obj;
    }
}
