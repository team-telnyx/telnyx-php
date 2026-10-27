<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Provides normalized address when available.
 *
 * @phpstan-type SuggestedShape = array{
 *   administrativeArea?: string|null,
 *   borough?: string|null,
 *   countryCode?: string|null,
 *   extendedAddress?: string|null,
 *   latitude?: float|null,
 *   locality?: string|null,
 *   longitude?: float|null,
 *   neighborhood?: string|null,
 *   postalCode?: string|null,
 *   streetAddress?: string|null,
 * }
 */
final class Suggested implements BaseModel
{
    /** @use SdkModel<SuggestedShape> */
    use SdkModel;

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
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * Latitude of the suggested address, when available.
     */
    #[Optional(nullable: true)]
    public ?float $latitude;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Longitude of the suggested address, when available.
     */
    #[Optional(nullable: true)]
    public ?float $longitude;

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Optional]
    public ?string $neighborhood;

    /**
     * The postal code of the address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * The primary street address information about the address.
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
        float|Omitted|null $latitude = Omitted::VALUE,
        float|Omitted|null $longitude = Omitted::VALUE,
        ?string $administrativeArea = null,
        ?string $borough = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
        ?string $neighborhood = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $self = new self;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $borough && $self['borough'] = $borough;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        Omitted::VALUE !== $latitude && $self['latitude'] = $latitude;
        null !== $locality && $self['locality'] = $locality;
        Omitted::VALUE !== $longitude && $self['longitude'] = $longitude;
        null !== $neighborhood && $self['neighborhood'] = $neighborhood;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withBorough(string $borough): self
    {
        $self = clone $this;
        $self['borough'] = $borough;

        return $self;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * Latitude of the suggested address, when available.
     */
    public function withLatitude(?float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * Longitude of the suggested address, when available.
     */
    public function withLongitude(?float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    /**
     * The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $self = clone $this;
        $self['neighborhood'] = $neighborhood;

        return $self;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }
}
