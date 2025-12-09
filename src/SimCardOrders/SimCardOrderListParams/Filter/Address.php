<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   id?: string|null,
 *   administrativeArea?: string|null,
 *   countryCode?: string|null,
 *   extendedAddress?: string|null,
 *   locality?: string|null,
 *   postalCode?: string|null,
 *   streetAddress?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Optional]
    public ?string $id;

    /**
     * Filter by state or province where the address is located.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * Filter by the name of the city where the address is located.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Filter by postal code for the address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * Returns entries with matching name of the street where the address is located.
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
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
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
     * Filter by state or province where the address is located.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * Filter by the name of the city where the address is located.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * Filter by postal code for the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }
}
