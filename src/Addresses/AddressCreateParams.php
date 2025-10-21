<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an address.
 *
 * @see Telnyx\Addresses->create
 *
 * @phpstan-type address_create_params = array{
 *   businessName: string,
 *   countryCode: string,
 *   firstName: string,
 *   lastName: string,
 *   locality: string,
 *   streetAddress: string,
 *   addressBook?: bool,
 *   administrativeArea?: string,
 *   borough?: string,
 *   customerReference?: string,
 *   extendedAddress?: string,
 *   neighborhood?: string,
 *   phoneNumber?: string,
 *   postalCode?: string,
 *   validateAddress?: bool,
 * }
 */
final class AddressCreateParams implements BaseModel
{
    /** @use SdkModel<address_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The business name associated with the address. An address must have either a first last name or a business name.
     */
    #[Api('business_name')]
    public string $businessName;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Api('country_code')]
    public string $countryCode;

    /**
     * The first name associated with the address. An address must have either a first last name or a business name.
     */
    #[Api('first_name')]
    public string $firstName;

    /**
     * The last name associated with the address. An address must have either a first last name or a business name.
     */
    #[Api('last_name')]
    public string $lastName;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Api]
    public string $locality;

    /**
     * The primary street address information about the address.
     */
    #[Api('street_address')]
    public string $streetAddress;

    /**
     * Indicates whether or not the address should be considered part of your list of addresses that appear for regular use.
     */
    #[Api('address_book', optional: true)]
    public ?bool $addressBook;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $borough;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $neighborhood;

    /**
     * The phone number associated with the address.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The postal code of the address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    #[Api('validate_address', optional: true)]
    public ?bool $validateAddress;

    /**
     * `new AddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AddressCreateParams::with(
     *   businessName: ...,
     *   countryCode: ...,
     *   firstName: ...,
     *   lastName: ...,
     *   locality: ...,
     *   streetAddress: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AddressCreateParams)
     *   ->withBusinessName(...)
     *   ->withCountryCode(...)
     *   ->withFirstName(...)
     *   ->withLastName(...)
     *   ->withLocality(...)
     *   ->withStreetAddress(...)
     * ```
     */
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
        string $businessName,
        string $countryCode,
        string $firstName,
        string $lastName,
        string $locality,
        string $streetAddress,
        ?bool $addressBook = null,
        ?string $administrativeArea = null,
        ?string $borough = null,
        ?string $customerReference = null,
        ?string $extendedAddress = null,
        ?string $neighborhood = null,
        ?string $phoneNumber = null,
        ?string $postalCode = null,
        ?bool $validateAddress = null,
    ): self {
        $obj = new self;

        $obj->businessName = $businessName;
        $obj->countryCode = $countryCode;
        $obj->firstName = $firstName;
        $obj->lastName = $lastName;
        $obj->locality = $locality;
        $obj->streetAddress = $streetAddress;

        null !== $addressBook && $obj->addressBook = $addressBook;
        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $borough && $obj->borough = $borough;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $neighborhood && $obj->neighborhood = $neighborhood;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $validateAddress && $obj->validateAddress = $validateAddress;

        return $obj;
    }

    /**
     * The business name associated with the address. An address must have either a first last name or a business name.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj->businessName = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * The first name associated with the address. An address must have either a first last name or a business name.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the address. An address must have either a first last name or a business name.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * Indicates whether or not the address should be considered part of your list of addresses that appear for regular use.
     */
    public function withAddressBook(bool $addressBook): self
    {
        $obj = clone $this;
        $obj->addressBook = $addressBook;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withBorough(string $borough): self
    {
        $obj = clone $this;
        $obj->borough = $borough;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

        return $obj;
    }

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $obj = clone $this;
        $obj->neighborhood = $neighborhood;

        return $obj;
    }

    /**
     * The phone number associated with the address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    public function withValidateAddress(bool $validateAddress): self
    {
        $obj = clone $this;
        $obj->validateAddress = $validateAddress;

        return $obj;
    }
}
