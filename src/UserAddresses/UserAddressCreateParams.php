<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a user address.
 *
 * @see Telnyx\Services\UserAddressesService::create()
 *
 * @phpstan-type UserAddressCreateParamsShape = array{
 *   business_name: string,
 *   country_code: string,
 *   first_name: string,
 *   last_name: string,
 *   locality: string,
 *   street_address: string,
 *   administrative_area?: string,
 *   borough?: string,
 *   customer_reference?: string,
 *   extended_address?: string,
 *   neighborhood?: string,
 *   phone_number?: string,
 *   postal_code?: string,
 *   skip_address_verification?: string,
 * }
 */
final class UserAddressCreateParams implements BaseModel
{
    /** @use SdkModel<UserAddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The business name associated with the user address.
     */
    #[Required]
    public string $business_name;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    #[Required]
    public string $country_code;

    /**
     * The first name associated with the user address.
     */
    #[Required]
    public string $first_name;

    /**
     * The last name associated with the user address.
     */
    #[Required]
    public string $last_name;

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    #[Required]
    public string $locality;

    /**
     * The primary street address information about the user address.
     */
    #[Required]
    public string $street_address;

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    #[Optional]
    public ?string $administrative_area;

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $borough;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    #[Optional]
    public ?string $extended_address;

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $neighborhood;

    /**
     * The phone number associated with the user address.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * The postal code of the user address.
     */
    #[Optional]
    public ?string $postal_code;

    /**
     * An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    #[Optional]
    public ?string $skip_address_verification;

    /**
     * `new UserAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserAddressCreateParams::with(
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
     * (new UserAddressCreateParams)
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
        ?string $administrative_area = null,
        ?string $borough = null,
        ?string $customer_reference = null,
        ?string $extended_address = null,
        ?string $neighborhood = null,
        ?string $phone_number = null,
        ?string $postal_code = null,
        ?string $skip_address_verification = null,
    ): self {
        $obj = new self;

        $obj['business_name'] = $business_name;
        $obj['country_code'] = $country_code;
        $obj['first_name'] = $first_name;
        $obj['last_name'] = $last_name;
        $obj['locality'] = $locality;
        $obj['street_address'] = $street_address;

        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $borough && $obj['borough'] = $borough;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $neighborhood && $obj['neighborhood'] = $neighborhood;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $skip_address_verification && $obj['skip_address_verification'] = $skip_address_verification;

        return $obj;
    }

    /**
     * The business name associated with the user address.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['business_name'] = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * The first name associated with the user address.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the user address.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * The primary street address information about the user address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
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
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

        return $obj;
    }

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $obj = clone $this;
        $obj['neighborhood'] = $neighborhood;

        return $obj;
    }

    /**
     * The phone number associated with the user address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the user address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    public function withSkipAddressVerification(
        string $skipAddressVerification
    ): self {
        $obj = clone $this;
        $obj['skip_address_verification'] = $skipAddressVerification;

        return $obj;
    }
}
