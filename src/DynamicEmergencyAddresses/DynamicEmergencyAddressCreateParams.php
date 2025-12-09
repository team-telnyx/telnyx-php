<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams\CountryCode;

/**
 * Creates a dynamic emergency address.
 *
 * @see Telnyx\Services\DynamicEmergencyAddressesService::create()
 *
 * @phpstan-type DynamicEmergencyAddressCreateParamsShape = array{
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
    /** @use SdkModel<DynamicEmergencyAddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('administrative_area')]
    public string $administrativeArea;

    /** @var value-of<CountryCode> $countryCode */
    #[Required('country_code', enum: CountryCode::class)]
    public string $countryCode;

    #[Required('house_number')]
    public string $houseNumber;

    #[Required]
    public string $locality;

    #[Required('postal_code')]
    public string $postalCode;

    #[Required('street_name')]
    public string $streetName;

    #[Optional('extended_address')]
    public ?string $extendedAddress;

    #[Optional('house_suffix')]
    public ?string $houseSuffix;

    #[Optional('street_post_directional')]
    public ?string $streetPostDirectional;

    #[Optional('street_pre_directional')]
    public ?string $streetPreDirectional;

    #[Optional('street_suffix')]
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

        $obj['administrativeArea'] = $administrativeArea;
        $obj['countryCode'] = $countryCode;
        $obj['houseNumber'] = $houseNumber;
        $obj['locality'] = $locality;
        $obj['postalCode'] = $postalCode;
        $obj['streetName'] = $streetName;

        null !== $extendedAddress && $obj['extendedAddress'] = $extendedAddress;
        null !== $houseSuffix && $obj['houseSuffix'] = $houseSuffix;
        null !== $streetPostDirectional && $obj['streetPostDirectional'] = $streetPostDirectional;
        null !== $streetPreDirectional && $obj['streetPreDirectional'] = $streetPreDirectional;
        null !== $streetSuffix && $obj['streetSuffix'] = $streetSuffix;

        return $obj;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrativeArea'] = $administrativeArea;

        return $obj;
    }

    /**
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public function withCountryCode(CountryCode|string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $obj = clone $this;
        $obj['houseNumber'] = $houseNumber;

        return $obj;
    }

    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postalCode'] = $postalCode;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj['streetName'] = $streetName;

        return $obj;
    }

    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extendedAddress'] = $extendedAddress;

        return $obj;
    }

    public function withHouseSuffix(string $houseSuffix): self
    {
        $obj = clone $this;
        $obj['houseSuffix'] = $houseSuffix;

        return $obj;
    }

    public function withStreetPostDirectional(
        string $streetPostDirectional
    ): self {
        $obj = clone $this;
        $obj['streetPostDirectional'] = $streetPostDirectional;

        return $obj;
    }

    public function withStreetPreDirectional(string $streetPreDirectional): self
    {
        $obj = clone $this;
        $obj['streetPreDirectional'] = $streetPreDirectional;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj['streetSuffix'] = $streetSuffix;

        return $obj;
    }
}
