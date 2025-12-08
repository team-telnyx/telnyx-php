<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an address.
 *
 * @see Telnyx\Services\AddressesService::create()
 *
 * @phpstan-type AddressCreateParamsShape = array{
 *   business_name: string,
 *   country_code: string,
 *   first_name: string,
 *   last_name: string,
 *   locality: string,
 *   street_address: string,
 *   address_book?: bool,
 *   administrative_area?: string,
 *   borough?: string,
 *   customer_reference?: string,
 *   extended_address?: string,
 *   neighborhood?: string,
 *   phone_number?: string,
 *   postal_code?: string,
 *   validate_address?: bool,
 * }
 */
final class AddressCreateParams implements BaseModel
{
    /** @use SdkModel<AddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The business name associated with the address. An address must have either a first last name or a business name.
     */
    #[Required]
    public string $business_name;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Required]
    public string $country_code;

    /**
     * The first name associated with the address. An address must have either a first last name or a business name.
     */
    #[Required]
    public string $first_name;

    /**
     * The last name associated with the address. An address must have either a first last name or a business name.
     */
    #[Required]
    public string $last_name;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Required]
    public string $locality;

    /**
     * The primary street address information about the address.
     */
    #[Required]
    public string $street_address;

    /**
     * Indicates whether or not the address should be considered part of your list of addresses that appear for regular use.
     */
    #[Optional]
    public ?bool $address_book;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Optional]
    public ?string $administrative_area;

    /**
     * The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $borough;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Optional]
    public ?string $extended_address;

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $neighborhood;

    /**
     * The phone number associated with the address.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * The postal code of the address.
     */
    #[Optional]
    public ?string $postal_code;

    /**
     * Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    #[Optional]
    public ?bool $validate_address;

    /**
     * `new AddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AddressCreateParams::with(
     *   business_name: ...,
     *   country_code: ...,
     *   first_name: ...,
     *   last_name: ...,
     *   locality: ...,
     *   street_address: ...,
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
        string $business_name,
        string $country_code,
        string $first_name,
        string $last_name,
        string $locality,
        string $street_address,
        ?bool $address_book = null,
        ?string $administrative_area = null,
        ?string $borough = null,
        ?string $customer_reference = null,
        ?string $extended_address = null,
        ?string $neighborhood = null,
        ?string $phone_number = null,
        ?string $postal_code = null,
        ?bool $validate_address = null,
    ): self {
        $obj = new self;

        $obj['business_name'] = $business_name;
        $obj['country_code'] = $country_code;
        $obj['first_name'] = $first_name;
        $obj['last_name'] = $last_name;
        $obj['locality'] = $locality;
        $obj['street_address'] = $street_address;

        null !== $address_book && $obj['address_book'] = $address_book;
        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $borough && $obj['borough'] = $borough;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $neighborhood && $obj['neighborhood'] = $neighborhood;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $validate_address && $obj['validate_address'] = $validate_address;

        return $obj;
    }

    /**
     * The business name associated with the address. An address must have either a first last name or a business name.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['business_name'] = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * The first name associated with the address. An address must have either a first last name or a business name.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the address. An address must have either a first last name or a business name.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

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
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }

    /**
     * Indicates whether or not the address should be considered part of your list of addresses that appear for regular use.
     */
    public function withAddressBook(bool $addressBook): self
    {
        $obj = clone $this;
        $obj['address_book'] = $addressBook;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

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
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

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
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    public function withValidateAddress(bool $validateAddress): self
    {
        $obj = clone $this;
        $obj['validate_address'] = $validateAddress;

        return $obj;
    }
}
