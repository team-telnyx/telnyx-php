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
        $obj = new self;

        null !== $city && $obj['city'] = $city;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $extendedAddress && $obj['extendedAddress'] = $extendedAddress;
        null !== $state && $obj['state'] = $state;
        null !== $streetAddress && $obj['streetAddress'] = $streetAddress;
        null !== $zipCode && $obj['zipCode'] = $zipCode;

        return $obj;
    }

    /**
     * The locality of the company.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj['city'] = $city;

        return $obj;
    }

    /**
     * The country code of the company.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * The extended address of the company.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extendedAddress'] = $extendedAddress;

        return $obj;
    }

    /**
     * The administrative area of the company.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * The street address of the company.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['streetAddress'] = $streetAddress;

        return $obj;
    }

    /**
     * The postal code of the company.
     */
    public function withZipCode(string $zipCode): self
    {
        $obj = clone $this;
        $obj['zipCode'] = $zipCode;

        return $obj;
    }
}
