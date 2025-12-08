<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses\UserAddressListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UserAddresses\UserAddressListParams\Filter\CustomerReference;
use Telnyx\UserAddresses\UserAddressListParams\Filter\StreetAddress;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[street_address][contains].
 *
 * @phpstan-type FilterShape = array{
 *   customer_reference?: CustomerReference|null,
 *   street_address?: StreetAddress|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter user addresses via the customer reference. Supports both exact matching (eq) and partial matching (contains). Matching is not case-sensitive.
     */
    #[Optional]
    public ?CustomerReference $customer_reference;

    /**
     * Filter user addresses via street address. Supports partial matching (contains). Matching is not case-sensitive.
     */
    #[Optional]
    public ?StreetAddress $street_address;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CustomerReference|array{
     *   contains?: string|null, eq?: string|null
     * } $customer_reference
     * @param StreetAddress|array{contains?: string|null} $street_address
     */
    public static function with(
        CustomerReference|array|null $customer_reference = null,
        StreetAddress|array|null $street_address = null,
    ): self {
        $obj = new self;

        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $street_address && $obj['street_address'] = $street_address;

        return $obj;
    }

    /**
     * Filter user addresses via the customer reference. Supports both exact matching (eq) and partial matching (contains). Matching is not case-sensitive.
     *
     * @param CustomerReference|array{
     *   contains?: string|null, eq?: string|null
     * } $customerReference
     */
    public function withCustomerReference(
        CustomerReference|array $customerReference
    ): self {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter user addresses via street address. Supports partial matching (contains). Matching is not case-sensitive.
     *
     * @param StreetAddress|array{contains?: string|null} $streetAddress
     */
    public function withStreetAddress(StreetAddress|array $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }
}
