<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderEndUserLocationShape = array{
 *   administrativeArea?: string|null,
 *   countryCode?: string|null,
 *   extendedAddress?: string|null,
 *   locality?: string|null,
 *   postalCode?: string|null,
 *   streetAddress?: string|null,
 * }
 */
final class PortingOrderEndUserLocation implements BaseModel
{
    /** @use SdkModel<PortingOrderEndUserLocationShape> */
    use SdkModel;

    /**
     * State, province, or similar of billing address.
     */
    #[Optional('administrative_area', nullable: true)]
    public ?string $administrativeArea;

    /**
     * ISO3166-1 alpha-2 country code of billing address.
     */
    #[Optional('country_code', nullable: true)]
    public ?string $countryCode;

    /**
     * Second line of billing address.
     */
    #[Optional('extended_address', nullable: true)]
    public ?string $extendedAddress;

    /**
     * City or municipality of billing address.
     */
    #[Optional(nullable: true)]
    public ?string $locality;

    /**
     * Postal Code of billing address.
     */
    #[Optional('postal_code', nullable: true)]
    public ?string $postalCode;

    /**
     * First line of billing address.
     */
    #[Optional('street_address', nullable: true)]
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
        ?string $administrativeArea = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $self = new self;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $locality && $self['locality'] = $locality;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * State, province, or similar of billing address.
     */
    public function withAdministrativeArea(?string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * ISO3166-1 alpha-2 country code of billing address.
     */
    public function withCountryCode(?string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Second line of billing address.
     */
    public function withExtendedAddress(?string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * City or municipality of billing address.
     */
    public function withLocality(?string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * Postal Code of billing address.
     */
    public function withPostalCode(?string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * First line of billing address.
     */
    public function withStreetAddress(?string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }
}
