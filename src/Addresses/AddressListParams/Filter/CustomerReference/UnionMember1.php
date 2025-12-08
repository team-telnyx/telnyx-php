<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams\Filter\CustomerReference;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember1Shape = array{
 *   contains?: string|null, eq?: string|null
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    /**
     * Partial match for customer_reference. Matching is not case-sensitive.
     */
    #[Optional]
    public ?string $contains;

    /**
     * Exact match for customer_reference.
     */
    #[Optional]
    public ?string $eq;

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
        ?string $contains = null,
        ?string $eq = null
    ): self {
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;
        null !== $eq && $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * Partial match for customer_reference. Matching is not case-sensitive.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * Exact match for customer_reference.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
