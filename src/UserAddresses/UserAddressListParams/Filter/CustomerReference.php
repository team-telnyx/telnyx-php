<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses\UserAddressListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter user addresses via the customer reference. Supports both exact matching (eq) and partial matching (contains). Matching is not case-sensitive.
 *
 * @phpstan-type CustomerReferenceShape = array{
 *   contains?: string|null, eq?: string|null
 * }
 */
final class CustomerReference implements BaseModel
{
    /** @use SdkModel<CustomerReferenceShape> */
    use SdkModel;

    /**
     * If present, user addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    #[Optional]
    public ?string $contains;

    /**
     * Filter user addresses via exact customer reference match. Matching is not case-sensitive.
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
     * If present, user addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * Filter user addresses via exact customer reference match. Matching is not case-sensitive.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
