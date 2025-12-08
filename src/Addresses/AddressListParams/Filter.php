<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams;

use Telnyx\Addresses\AddressListParams\Filter\AddressBook;
use Telnyx\Addresses\AddressListParams\Filter\CustomerReference\UnionMember1;
use Telnyx\Addresses\AddressListParams\Filter\StreetAddress;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq].
 *
 * @phpstan-type FilterShape = array{
 *   address_book?: AddressBook|null,
 *   customer_reference?: string|null|UnionMember1,
 *   street_address?: StreetAddress|null,
 *   used_as_emergency?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?AddressBook $address_book;

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    #[Optional]
    public string|UnionMember1|null $customer_reference;

    #[Optional]
    public ?StreetAddress $street_address;

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    #[Optional]
    public ?string $used_as_emergency;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AddressBook|array{eq?: string|null} $address_book
     * @param string|UnionMember1|array{
     *   contains?: string|null, eq?: string|null
     * } $customer_reference
     * @param StreetAddress|array{contains?: string|null} $street_address
     */
    public static function with(
        AddressBook|array|null $address_book = null,
        string|UnionMember1|array|null $customer_reference = null,
        StreetAddress|array|null $street_address = null,
        ?string $used_as_emergency = null,
    ): self {
        $obj = new self;

        null !== $address_book && $obj['address_book'] = $address_book;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $street_address && $obj['street_address'] = $street_address;
        null !== $used_as_emergency && $obj['used_as_emergency'] = $used_as_emergency;

        return $obj;
    }

    /**
     * @param AddressBook|array{eq?: string|null} $addressBook
     */
    public function withAddressBook(AddressBook|array $addressBook): self
    {
        $obj = clone $this;
        $obj['address_book'] = $addressBook;

        return $obj;
    }

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     *
     * @param string|UnionMember1|array{
     *   contains?: string|null, eq?: string|null
     * } $customerReference
     */
    public function withCustomerReference(
        string|UnionMember1|array $customerReference
    ): self {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * @param StreetAddress|array{contains?: string|null} $streetAddress
     */
    public function withStreetAddress(StreetAddress|array $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    public function withUsedAsEmergency(string $usedAsEmergency): self
    {
        $obj = clone $this;
        $obj['used_as_emergency'] = $usedAsEmergency;

        return $obj;
    }
}
