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
 *   customerReference?: CustomerReference|null, streetAddress?: StreetAddress|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter user addresses via the customer reference. Supports both exact matching (eq) and partial matching (contains). Matching is not case-sensitive.
     */
    #[Optional('customer_reference')]
    public ?CustomerReference $customerReference;

    /**
     * Filter user addresses via street address. Supports partial matching (contains). Matching is not case-sensitive.
     */
    #[Optional('street_address')]
    public ?StreetAddress $streetAddress;

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
     * } $customerReference
     * @param StreetAddress|array{contains?: string|null} $streetAddress
     */
    public static function with(
        CustomerReference|array|null $customerReference = null,
        StreetAddress|array|null $streetAddress = null,
    ): self {
        $self = new self;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;

        return $self;
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
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Filter user addresses via street address. Supports partial matching (contains). Matching is not case-sensitive.
     *
     * @param StreetAddress|array{contains?: string|null} $streetAddress
     */
    public function withStreetAddress(StreetAddress|array $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }
}
