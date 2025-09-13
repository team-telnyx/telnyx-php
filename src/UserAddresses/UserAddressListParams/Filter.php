<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses\UserAddressListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UserAddresses\UserAddressListParams\Filter\CustomerReference;
use Telnyx\UserAddresses\UserAddressListParams\Filter\StreetAddress;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[street_address][contains].
 *
 * @phpstan-type filter_alias = array{
 *   customerReference?: CustomerReference, streetAddress?: StreetAddress
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter user addresses via the customer reference. Supports both exact matching (eq) and partial matching (contains). Matching is not case-sensitive.
     */
    #[Api('customer_reference', optional: true)]
    public ?CustomerReference $customerReference;

    /**
     * Filter user addresses via street address. Supports partial matching (contains). Matching is not case-sensitive.
     */
    #[Api('street_address', optional: true)]
    public ?StreetAddress $streetAddress;

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
        ?CustomerReference $customerReference = null,
        ?StreetAddress $streetAddress = null,
    ): self {
        $obj = new self;

        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $streetAddress && $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * Filter user addresses via the customer reference. Supports both exact matching (eq) and partial matching (contains). Matching is not case-sensitive.
     */
    public function withCustomerReference(
        CustomerReference $customerReference
    ): self {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Filter user addresses via street address. Supports partial matching (contains). Matching is not case-sensitive.
     */
    public function withStreetAddress(StreetAddress $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }
}
