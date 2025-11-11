<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the company.
 *
 * @phpstan-type AddressShape = array{
 *   city: string,
 *   country_code: string,
 *   state: string,
 *   street_address: string,
 *   zip_code: string,
 *   extended_address?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The locality of the company.
     */
    #[Api]
    public string $city;

    /**
     * The country code of the company.
     */
    #[Api]
    public string $country_code;

    /**
     * The administrative area of the company.
     */
    #[Api]
    public string $state;

    /**
     * The street address of the company.
     */
    #[Api]
    public string $street_address;

    /**
     * The postal code of the company.
     */
    #[Api]
    public string $zip_code;

    /**
     * The extended address of the company.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * `new Address()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Address::with(
     *   city: ..., country_code: ..., state: ..., street_address: ..., zip_code: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Address)
     *   ->withCity(...)
     *   ->withCountryCode(...)
     *   ->withState(...)
     *   ->withStreetAddress(...)
     *   ->withZipCode(...)
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
        string $city,
        string $country_code,
        string $state,
        string $street_address,
        string $zip_code,
        ?string $extended_address = null,
    ): self {
        $obj = new self;

        $obj->city = $city;
        $obj->country_code = $country_code;
        $obj->state = $state;
        $obj->street_address = $street_address;
        $obj->zip_code = $zip_code;

        null !== $extended_address && $obj->extended_address = $extended_address;

        return $obj;
    }

    /**
     * The locality of the company.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    /**
     * The country code of the company.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * The administrative area of the company.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * The street address of the company.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->street_address = $streetAddress;

        return $obj;
    }

    /**
     * The postal code of the company.
     */
    public function withZipCode(string $zipCode): self
    {
        $obj = clone $this;
        $obj->zip_code = $zipCode;

        return $obj;
    }

    /**
     * The extended address of the company.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extended_address = $extendedAddress;

        return $obj;
    }
}
