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
 *   skipAddressVerification?: bool,
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
    #[Required('business_name')]
    public string $businessName;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * The first name associated with the user address.
     */
    #[Required('first_name')]
    public string $firstName;

    /**
     * The last name associated with the user address.
     */
    #[Required('last_name')]
    public string $lastName;

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    #[Required]
    public string $locality;

    /**
     * The primary street address information about the user address.
     */
    #[Required('street_address')]
    public string $streetAddress;

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $borough;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $neighborhood;

    /**
     * The phone number associated with the user address.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The postal code of the user address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    #[Optional('skip_address_verification')]
    public ?bool $skipAddressVerification;

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
        ?bool $skipAddressVerification = null,
    ): self {
        $self = new self;

        $self['businessName'] = $businessName;
        $self['countryCode'] = $countryCode;
        $self['firstName'] = $firstName;
        $self['lastName'] = $lastName;
        $self['locality'] = $locality;
        $self['streetAddress'] = $streetAddress;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $borough && $self['borough'] = $borough;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $neighborhood && $self['neighborhood'] = $neighborhood;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $skipAddressVerification && $self['skipAddressVerification'] = $skipAddressVerification;

        return $self;
    }

    /**
     * The business name associated with the user address.
     */
    public function withBusinessName(string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * The first name associated with the user address.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The last name associated with the user address.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * The primary street address information about the user address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withBorough(string $borough): self
    {
        $self = clone $this;
        $self['borough'] = $borough;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $self = clone $this;
        $self['neighborhood'] = $neighborhood;

        return $self;
    }

    /**
     * The phone number associated with the user address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The postal code of the user address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    public function withSkipAddressVerification(
        bool $skipAddressVerification
    ): self {
        $self = clone $this;
        $self['skipAddressVerification'] = $skipAddressVerification;

        return $self;
    }
}
