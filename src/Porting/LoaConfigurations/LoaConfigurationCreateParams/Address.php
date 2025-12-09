<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the company.
 *
 * @phpstan-type AddressShape = array{
 *   city: string,
 *   countryCode: string,
 *   state: string,
 *   streetAddress: string,
 *   zipCode: string,
 *   extendedAddress?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The locality of the company.
     */
    #[Required]
    public string $city;

    /**
     * The country code of the company.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * The administrative area of the company.
     */
    #[Required]
    public string $state;

    /**
     * The street address of the company.
     */
    #[Required('street_address')]
    public string $streetAddress;

    /**
     * The postal code of the company.
     */
    #[Required('zip_code')]
    public string $zipCode;

    /**
     * The extended address of the company.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * `new Address()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Address::with(
     *   city: ..., countryCode: ..., state: ..., streetAddress: ..., zipCode: ...
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
        string $countryCode,
        string $state,
        string $streetAddress,
        string $zipCode,
        ?string $extendedAddress = null,
    ): self {
        $obj = new self;

        $obj['city'] = $city;
        $obj['countryCode'] = $countryCode;
        $obj['state'] = $state;
        $obj['streetAddress'] = $streetAddress;
        $obj['zipCode'] = $zipCode;

        null !== $extendedAddress && $obj['extendedAddress'] = $extendedAddress;

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

    /**
     * The extended address of the company.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extendedAddress'] = $extendedAddress;

        return $obj;
    }
}
