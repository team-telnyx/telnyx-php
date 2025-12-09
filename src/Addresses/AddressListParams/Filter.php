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
 *   addressBook?: AddressBook|null,
 *   customerReference?: string|null|UnionMember1,
 *   streetAddress?: StreetAddress|null,
 *   usedAsEmergency?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('address_book')]
    public ?AddressBook $addressBook;

    /**
     * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
     */
    #[Optional('customer_reference')]
    public string|UnionMember1|null $customerReference;

    #[Optional('street_address')]
    public ?StreetAddress $streetAddress;

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    #[Optional('used_as_emergency')]
    public ?string $usedAsEmergency;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AddressBook|array{eq?: string|null} $addressBook
     * @param string|UnionMember1|array{
     *   contains?: string|null, eq?: string|null
     * } $customerReference
     * @param StreetAddress|array{contains?: string|null} $streetAddress
     */
    public static function with(
        AddressBook|array|null $addressBook = null,
        string|UnionMember1|array|null $customerReference = null,
        StreetAddress|array|null $streetAddress = null,
        ?string $usedAsEmergency = null,
    ): self {
        $self = new self;

        null !== $addressBook && $self['addressBook'] = $addressBook;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;
        null !== $usedAsEmergency && $self['usedAsEmergency'] = $usedAsEmergency;

        return $self;
    }

    /**
     * @param AddressBook|array{eq?: string|null} $addressBook
     */
    public function withAddressBook(AddressBook|array $addressBook): self
    {
        $self = clone $this;
        $self['addressBook'] = $addressBook;

        return $self;
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
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param StreetAddress|array{contains?: string|null} $streetAddress
     */
    public function withStreetAddress(StreetAddress|array $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * If set as 'true', only addresses used as the emergency address for at least one active phone-number will be returned. When set to 'false', the opposite happens: only addresses not used as the emergency address from phone-numbers will be returned.
     */
    public function withUsedAsEmergency(string $usedAsEmergency): self
    {
        $self = clone $this;
        $self['usedAsEmergency'] = $usedAsEmergency;

        return $self;
    }
}
