<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserAddressShape = array{
 *   id?: string|null,
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
 * }
 */
final class UserAddress implements BaseModel
{
    /** @use SdkModel<UserAddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the user address.
     */
    #[Optional]
    public ?string $id;

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
     * The business name associated with the user address.
     */
    #[Optional('business_name')]
    public ?string $businessName;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
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
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * The first name associated with the user address.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * The last name associated with the user address.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    #[Optional]
    public ?string $locality;

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
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The primary street address information about the user address.
     */
    #[Optional('street_address')]
    public ?string $streetAddress;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $borough && $self['borough'] = $borough;
        null !== $businessName && $self['businessName'] = $businessName;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $locality && $self['locality'] = $locality;
        null !== $neighborhood && $self['neighborhood'] = $neighborhood;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies the user address.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
