<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the company.
 *
 * @phpstan-type AddressShape = array{
 *   city?: string|null,
 *   countryCode?: string|null,
 *   extendedAddress?: string|null,
 *   state?: string|null,
 *   streetAddress?: string|null,
 *   zipCode?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The locality of the company.
     */
    #[Optional]
    public ?string $city;

    /**
     * The country code of the company.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * The extended address of the company.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * The administrative area of the company.
     */
    #[Optional]
    public ?string $state;

    /**
     * The street address of the company.
     */
    #[Optional('street_address')]
    public ?string $streetAddress;

    /**
     * The postal code of the company.
     */
    #[Optional('zip_code')]
    public ?string $zipCode;

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
        ?string $city = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $state = null,
        ?string $streetAddress = null,
        ?string $zipCode = null,
    ): self {
        $self = new self;

        null !== $city && $self['city'] = $city;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $state && $self['state'] = $state;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;
        null !== $zipCode && $self['zipCode'] = $zipCode;

        return $self;
    }

    /**
     * The locality of the company.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * The country code of the company.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * The extended address of the company.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * The administrative area of the company.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The street address of the company.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * The postal code of the company.
     */
    public function withZipCode(string $zipCode): self
    {
        $self = clone $this;
        $self['zipCode'] = $zipCode;

        return $self;
    }
}
