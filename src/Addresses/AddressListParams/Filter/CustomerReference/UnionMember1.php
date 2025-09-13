<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams\Filter\CustomerReference;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type union_member1 = array{contains?: string, eq?: string}
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<union_member1> */
    use SdkModel;

    /**
     * Partial match for customer_reference. Matching is not case-sensitive.
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * Exact match for customer_reference.
     */
    #[Api(optional: true)]
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

        null !== $contains && $obj->contains = $contains;
        null !== $eq && $obj->eq = $eq;

        return $obj;
    }

    /**
     * Partial match for customer_reference. Matching is not case-sensitive.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }

    /**
     * Exact match for customer_reference.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
