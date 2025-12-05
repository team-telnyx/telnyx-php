<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the company.
 *
 * @phpstan-type AddressShape = array{
 *   city?: string|null,
 *   country_code?: string|null,
 *   extended_address?: string|null,
 *   state?: string|null,
 *   street_address?: string|null,
 *   zip_code?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The locality of the company.
     */
    #[Api(optional: true)]
    public ?string $city;

    /**
     * The country code of the company.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * The extended address of the company.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * The administrative area of the company.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * The street address of the company.
     */
    #[Api(optional: true)]
    public ?string $street_address;

    /**
     * The postal code of the company.
     */
    #[Api(optional: true)]
    public ?string $zip_code;

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
        ?string $country_code = null,
        ?string $extended_address = null,
        ?string $state = null,
        ?string $street_address = null,
        ?string $zip_code = null,
    ): self {
        $obj = new self;

        null !== $city && $obj['city'] = $city;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $state && $obj['state'] = $state;
        null !== $street_address && $obj['street_address'] = $street_address;
        null !== $zip_code && $obj['zip_code'] = $zip_code;

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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * The extended address of the company.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

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
        $obj['street_address'] = $streetAddress;

        return $obj;
    }

    /**
     * The postal code of the company.
     */
    public function withZipCode(string $zipCode): self
    {
        $obj = clone $this;
        $obj['zip_code'] = $zipCode;

        return $obj;
    }
}
