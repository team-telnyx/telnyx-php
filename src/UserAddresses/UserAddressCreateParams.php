<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a user address.
 *
 * @see Telnyx\UserAddresses->create
 *
 * @phpstan-type UserAddressCreateParamsShape = array{
 *   businessName: string,
 *   countryCode: string,
 *   firstName: string,
 *   lastName: string,
 *   locality: string,
 *   streetAddress: string,
 *   administrativeArea?: string,
 *   borough?: string,
 *   customerReference?: string,
 *   extendedAddress?: string,
 *   neighborhood?: string,
 *   phoneNumber?: string,
 *   postalCode?: string,
 *   skipAddressVerification?: string,
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
    #[Api('business_name')]
    public string $businessName;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    #[Api('country_code')]
    public string $countryCode;

    /**
     * The first name associated with the user address.
     */
    #[Api('first_name')]
    public string $firstName;

    /**
     * The last name associated with the user address.
     */
    #[Api('last_name')]
    public string $lastName;

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    #[Api]
    public string $locality;

    /**
     * The primary street address information about the user address.
     */
    #[Api('street_address')]
    public string $streetAddress;

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $borough;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $neighborhood;

    /**
     * The phone number associated with the user address.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The postal code of the user address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    #[Api('skip_address_verification', optional: true)]
    public ?string $skipAddressVerification;

    /**
     * `new UserAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserAddressCreateParams::with(
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
        string $businessName,
        string $countryCode,
        string $firstName,
        string $lastName,
        string $locality,
        string $streetAddress,
        ?string $administrativeArea = null,
        ?string $borough = null,
        ?string $customerReference = null,
        ?string $extendedAddress = null,
        ?string $neighborhood = null,
        ?string $phoneNumber = null,
        ?string $postalCode = null,
        ?string $skipAddressVerification = null,
    ): self {
        $obj = new self;

        $obj->businessName = $businessName;
        $obj->countryCode = $countryCode;
        $obj->firstName = $firstName;
        $obj->lastName = $lastName;
        $obj->locality = $locality;
        $obj->streetAddress = $streetAddress;

        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $borough && $obj->borough = $borough;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $neighborhood && $obj->neighborhood = $neighborhood;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $skipAddressVerification && $obj->skipAddressVerification = $skipAddressVerification;

        return $obj;
    }

    /**
     * The business name associated with the user address.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj->businessName = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * The first name associated with the user address.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the user address.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * The primary street address information about the user address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
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
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

        return $obj;
    }

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $obj = clone $this;
        $obj->neighborhood = $neighborhood;

        return $obj;
    }

    /**
     * The phone number associated with the user address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the user address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    public function withSkipAddressVerification(
        string $skipAddressVerification
    ): self {
        $obj = clone $this;
        $obj->skipAddressVerification = $skipAddressVerification;

        return $obj;
    }
}
