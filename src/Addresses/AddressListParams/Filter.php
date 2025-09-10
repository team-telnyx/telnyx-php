<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams;

use Telnyx\Addresses\AddressListParams\Filter\AddressBook;
use Telnyx\Addresses\AddressListParams\Filter\CustomerReference\UnionMember1;
use Telnyx\Addresses\AddressListParams\Filter\StreetAddress;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq].
 *
 * @phpstan-type filter_alias = array{
 *   addressBook?: AddressBook|null,
 *   customerReference?: string|null|UnionMember1,
 *   streetAddress?: StreetAddress|null,
 *   usedAsEmergency?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api('address_book', optional: true)]
    public ?AddressBook $addressBook;

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    #[Api('customer_reference', optional: true)]
    public string|UnionMember1|null $customerReference;

    #[Api('street_address', optional: true)]
    public ?StreetAddress $streetAddress;

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    #[Api('used_as_emergency', optional: true)]
    public ?string $usedAsEmergency;

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
        ?AddressBook $addressBook = null,
        string|UnionMember1|null $customerReference = null,
        ?StreetAddress $streetAddress = null,
        ?string $usedAsEmergency = null,
    ): self {
        $obj = new self;

        null !== $addressBook && $obj->addressBook = $addressBook;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $streetAddress && $obj->streetAddress = $streetAddress;
        null !== $usedAsEmergency && $obj->usedAsEmergency = $usedAsEmergency;

        return $obj;
    }

    public function withAddressBook(AddressBook $addressBook): self
    {
        $obj = clone $this;
        $obj->addressBook = $addressBook;

        return $obj;
    }

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    public function withCustomerReference(
        string|UnionMember1 $customerReference
    ): self {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    public function withStreetAddress(StreetAddress $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    public function withUsedAsEmergency(string $usedAsEmergency): self
    {
        $obj = clone $this;
        $obj->usedAsEmergency = $usedAsEmergency;

        return $obj;
    }
}
