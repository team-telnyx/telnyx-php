<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams;

use Telnyx\Addresses\AddressListParams\Filter\AddressBook;
use Telnyx\Addresses\AddressListParams\Filter\CustomerReference\CustomerReferenceMatcher;
use Telnyx\Addresses\AddressListParams\Filter\StreetAddress;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq].
 *
 * @phpstan-type FilterShape = array{
 *   address_book?: AddressBook|null,
 *   customer_reference?: string|null|CustomerReferenceMatcher,
 *   street_address?: StreetAddress|null,
 *   used_as_emergency?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?AddressBook $address_book;

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    #[Api(optional: true)]
    public string|CustomerReferenceMatcher|null $customer_reference;

    #[Api(optional: true)]
    public ?StreetAddress $street_address;

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    #[Api(optional: true)]
    public ?string $used_as_emergency;

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
        ?AddressBook $address_book = null,
        string|CustomerReferenceMatcher|null $customer_reference = null,
        ?StreetAddress $street_address = null,
        ?string $used_as_emergency = null,
    ): self {
        $obj = new self;

        null !== $address_book && $obj->address_book = $address_book;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $street_address && $obj->street_address = $street_address;
        null !== $used_as_emergency && $obj->used_as_emergency = $used_as_emergency;

        return $obj;
    }

    public function withAddressBook(AddressBook $addressBook): self
    {
        $obj = clone $this;
        $obj->address_book = $addressBook;

        return $obj;
    }

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    public function withCustomerReference(
        string|CustomerReferenceMatcher $customerReference
    ): self {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    public function withStreetAddress(StreetAddress $streetAddress): self
    {
        $obj = clone $this;
        $obj->street_address = $streetAddress;

        return $obj;
    }

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    public function withUsedAsEmergency(string $usedAsEmergency): self
    {
        $obj = clone $this;
        $obj->used_as_emergency = $usedAsEmergency;

        return $obj;
    }
}
