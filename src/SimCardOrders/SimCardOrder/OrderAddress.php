<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrder;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object representing the address information from when the order was submitted.
 *
 * @phpstan-type OrderAddressShape = array{
 *   id?: string|null,
 *   administrativeArea?: string|null,
 *   businessName?: string|null,
 *   countryCode?: string|null,
 *   extendedAddress?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   locality?: string|null,
 *   postalCode?: string|null,
 *   streetAddress?: string|null,
 * }
 */
final class OrderAddress implements BaseModel
{
    /** @use SdkModel<OrderAddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Optional]
    public ?string $id;

    /**
     * State or province where the address is located.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * The name of the business where the address is located.
     */
    #[Optional('business_name')]
    public ?string $businessName;

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Supplemental field for address information.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * The first name of the shipping recipient.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * The last name of the shipping recipient.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * The name of the city where the address is located.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Postal code for the address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * The name of the street where the address is located.
     */
    #[Optional('street_address')]
    public ?string $streetAddress;

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
        ?string $businessName = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $businessName && $self['businessName'] = $businessName;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $locality && $self['locality'] = $locality;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * State or province where the address is located.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * The name of the business where the address is located.
     */
    public function withBusinessName(string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Supplemental field for address information.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * The first name of the shipping recipient.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The last name of the shipping recipient.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The name of the city where the address is located.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * Postal code for the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * The name of the street where the address is located.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }
}
