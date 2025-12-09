<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   id?: string|null,
 *   addressBook?: bool|null,
 *   administrativeArea?: string|null,
 *   borough?: string|null,
 *   businessName?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   extendedAddress?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   locality?: string|null,
 *   neighborhood?: string|null,
 *   phoneNumber?: string|null,
 *   postalCode?: string|null,
 *   recordType?: string|null,
 *   streetAddress?: string|null,
 *   updatedAt?: string|null,
 *   validateAddress?: bool|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the address.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicates whether or not the address should be considered part of your list of addresses that appear for regular use.
     */
    #[Optional('address_book')]
    public ?bool $addressBook;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $borough;

    /**
     * The business name associated with the address. An address must have either a first last name or a business name.
     */
    #[Optional('business_name')]
    public ?string $businessName;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * The first name associated with the address. An address must have either a first last name or a business name.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * The last name associated with the address. An address must have either a first last name or a business name.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Optional]
    public ?string $locality;

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $neighborhood;

    /**
     * The phone number associated with the address.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The postal code of the address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The primary street address information about the address.
     */
    #[Optional('street_address')]
    public ?string $streetAddress;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    #[Optional('validate_address')]
    public ?bool $validateAddress;

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
        ?string $id = null,
        ?bool $addressBook = null,
        ?string $administrativeArea = null,
        ?string $borough = null,
        ?string $businessName = null,
        ?string $countryCode = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?string $extendedAddress = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $locality = null,
        ?string $neighborhood = null,
        ?string $phoneNumber = null,
        ?string $postalCode = null,
        ?string $recordType = null,
        ?string $streetAddress = null,
        ?string $updatedAt = null,
        ?bool $validateAddress = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $addressBook && $obj['addressBook'] = $addressBook;
        null !== $administrativeArea && $obj['administrativeArea'] = $administrativeArea;
        null !== $borough && $obj['borough'] = $borough;
        null !== $businessName && $obj['businessName'] = $businessName;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $extendedAddress && $obj['extendedAddress'] = $extendedAddress;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $locality && $obj['locality'] = $locality;
        null !== $neighborhood && $obj['neighborhood'] = $neighborhood;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $postalCode && $obj['postalCode'] = $postalCode;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $streetAddress && $obj['streetAddress'] = $streetAddress;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $validateAddress && $obj['validateAddress'] = $validateAddress;

        return $obj;
    }

    /**
     * Uniquely identifies the address.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Indicates whether or not the address should be considered part of your list of addresses that appear for regular use.
     */
    public function withAddressBook(bool $addressBook): self
    {
        $obj = clone $this;
        $obj['addressBook'] = $addressBook;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrativeArea'] = $administrativeArea;

        return $obj;
    }

    /**
     * The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withBorough(string $borough): self
    {
        $obj = clone $this;
        $obj['borough'] = $borough;

        return $obj;
    }

    /**
     * The business name associated with the address. An address must have either a first last name or a business name.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['businessName'] = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extendedAddress'] = $extendedAddress;

        return $obj;
    }

    /**
     * The first name associated with the address. An address must have either a first last name or a business name.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the address. An address must have either a first last name or a business name.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $obj = clone $this;
        $obj['neighborhood'] = $neighborhood;

        return $obj;
    }

    /**
     * The phone number associated with the address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postalCode'] = $postalCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['streetAddress'] = $streetAddress;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    public function withValidateAddress(bool $validateAddress): self
    {
        $obj = clone $this;
        $obj['validateAddress'] = $validateAddress;

        return $obj;
    }
}
