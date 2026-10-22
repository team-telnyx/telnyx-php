<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerIdentity;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Postal address associated with the phone number's owner.
 *
 * @phpstan-type AddressShape = array{
 *   city?: string|null,
 *   countryCode?: string|null,
 *   postalCode?: string|null,
 *   stateCode?: string|null,
 *   streetLine1?: string|null,
 *   streetLine2?: string|null,
 *   zip4?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * City.
     */
    #[Optional(nullable: true)]
    public ?string $city;

    /**
     * Two-letter ISO 3166-1 country code.
     */
    #[Optional('country_code', nullable: true)]
    public ?string $countryCode;

    /**
     * Postal or ZIP code.
     */
    #[Optional('postal_code', nullable: true)]
    public ?string $postalCode;

    /**
     * Two-letter state or province code.
     */
    #[Optional('state_code', nullable: true)]
    public ?string $stateCode;

    /**
     * First line of the street address.
     */
    #[Optional('street_line_1', nullable: true)]
    public ?string $streetLine1;

    /**
     * Second line of the street address, if any.
     */
    #[Optional('street_line_2', nullable: true)]
    public ?string $streetLine2;

    /**
     * ZIP+4 extension, if available.
     */
    #[Optional(nullable: true)]
    public ?string $zip4;

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
        string|Omitted|null $city = Omitted::VALUE,
        string|Omitted|null $countryCode = Omitted::VALUE,
        string|Omitted|null $postalCode = Omitted::VALUE,
        string|Omitted|null $stateCode = Omitted::VALUE,
        string|Omitted|null $streetLine1 = Omitted::VALUE,
        string|Omitted|null $streetLine2 = Omitted::VALUE,
        string|Omitted|null $zip4 = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $city && $self['city'] = $city;
        Omitted::VALUE !== $countryCode && $self['countryCode'] = $countryCode;
        Omitted::VALUE !== $postalCode && $self['postalCode'] = $postalCode;
        Omitted::VALUE !== $stateCode && $self['stateCode'] = $stateCode;
        Omitted::VALUE !== $streetLine1 && $self['streetLine1'] = $streetLine1;
        Omitted::VALUE !== $streetLine2 && $self['streetLine2'] = $streetLine2;
        Omitted::VALUE !== $zip4 && $self['zip4'] = $zip4;

        return $self;
    }

    /**
     * City.
     */
    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * Two-letter ISO 3166-1 country code.
     */
    public function withCountryCode(?string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Postal or ZIP code.
     */
    public function withPostalCode(?string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Two-letter state or province code.
     */
    public function withStateCode(?string $stateCode): self
    {
        $self = clone $this;
        $self['stateCode'] = $stateCode;

        return $self;
    }

    /**
     * First line of the street address.
     */
    public function withStreetLine1(?string $streetLine1): self
    {
        $self = clone $this;
        $self['streetLine1'] = $streetLine1;

        return $self;
    }

    /**
     * Second line of the street address, if any.
     */
    public function withStreetLine2(?string $streetLine2): self
    {
        $self = clone $this;
        $self['streetLine2'] = $streetLine2;

        return $self;
    }

    /**
     * ZIP+4 extension, if available.
     */
    public function withZip4(?string $zip4): self
    {
        $self = clone $this;
        $self['zip4'] = $zip4;

        return $self;
    }
}
