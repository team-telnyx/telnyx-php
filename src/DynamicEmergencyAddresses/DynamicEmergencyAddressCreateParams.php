<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DynamicEmergencyAddressCreateParams); // set properties as needed
 * $client->dynamicEmergencyAddresses->create(...$params->toArray());
 * ```
 * Creates a dynamic emergency address.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->dynamicEmergencyAddresses->create(...$params->toArray());`
 *
 * @see Telnyx\DynamicEmergencyAddresses->create
 *
 * @phpstan-type dynamic_emergency_address_create_params = array{
 *   administrativeArea: string,
 *   countryCode: CountryCode|value-of<CountryCode>,
 *   houseNumber: string,
 *   locality: string,
 *   postalCode: string,
 *   streetName: string,
 *   extendedAddress?: string,
 *   houseSuffix?: string,
 *   streetPostDirectional?: string,
 *   streetPreDirectional?: string,
 *   streetSuffix?: string,
 * }
 */
final class DynamicEmergencyAddressCreateParams implements BaseModel
{
    /** @use SdkModel<dynamic_emergency_address_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('administrative_area')]
    public string $administrativeArea;

    /** @var value-of<CountryCode> $countryCode */
    #[Api('country_code', enum: CountryCode::class)]
    public string $countryCode;

    #[Api('house_number')]
    public string $houseNumber;

    #[Api]
    public string $locality;

    #[Api('postal_code')]
    public string $postalCode;

    #[Api('street_name')]
    public string $streetName;

    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    #[Api('house_suffix', optional: true)]
    public ?string $houseSuffix;

    #[Api('street_post_directional', optional: true)]
    public ?string $streetPostDirectional;

    #[Api('street_pre_directional', optional: true)]
    public ?string $streetPreDirectional;

    #[Api('street_suffix', optional: true)]
    public ?string $streetSuffix;

    /**
     * `new DynamicEmergencyAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyAddressCreateParams::with(
     *   administrativeArea: ...,
     *   countryCode: ...,
     *   houseNumber: ...,
     *   locality: ...,
     *   postalCode: ...,
     *   streetName: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DynamicEmergencyAddressCreateParams)
     *   ->withAdministrativeArea(...)
     *   ->withCountryCode(...)
     *   ->withHouseNumber(...)
     *   ->withLocality(...)
     *   ->withPostalCode(...)
     *   ->withStreetName(...)
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
     *
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public static function with(
        string $administrativeArea,
        CountryCode|string $countryCode,
        string $houseNumber,
        string $locality,
        string $postalCode,
        string $streetName,
        ?string $extendedAddress = null,
        ?string $houseSuffix = null,
        ?string $streetPostDirectional = null,
        ?string $streetPreDirectional = null,
        ?string $streetSuffix = null,
    ): self {
        $obj = new self;

        $obj->administrativeArea = $administrativeArea;
        $obj->countryCode = $countryCode instanceof CountryCode ? $countryCode->value : $countryCode;
        $obj->houseNumber = $houseNumber;
        $obj->locality = $locality;
        $obj->postalCode = $postalCode;
        $obj->streetName = $streetName;

        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $houseSuffix && $obj->houseSuffix = $houseSuffix;
        null !== $streetPostDirectional && $obj->streetPostDirectional = $streetPostDirectional;
        null !== $streetPreDirectional && $obj->streetPreDirectional = $streetPreDirectional;
        null !== $streetSuffix && $obj->streetSuffix = $streetSuffix;

        return $obj;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public function withCountryCode(CountryCode|string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode instanceof CountryCode ? $countryCode->value : $countryCode;

        return $obj;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $obj = clone $this;
        $obj->houseNumber = $houseNumber;

        return $obj;
    }

    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj->streetName = $streetName;

        return $obj;
    }

    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

        return $obj;
    }

    public function withHouseSuffix(string $houseSuffix): self
    {
        $obj = clone $this;
        $obj->houseSuffix = $houseSuffix;

        return $obj;
    }

    public function withStreetPostDirectional(
        string $streetPostDirectional
    ): self {
        $obj = clone $this;
        $obj->streetPostDirectional = $streetPostDirectional;

        return $obj;
    }

    public function withStreetPreDirectional(string $streetPreDirectional): self
    {
        $obj = clone $this;
        $obj->streetPreDirectional = $streetPreDirectional;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj->streetSuffix = $streetSuffix;

        return $obj;
    }
}
