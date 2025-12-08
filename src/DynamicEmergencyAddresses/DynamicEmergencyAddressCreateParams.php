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
 *   administrative_area: string,
 *   country_code: CountryCode|value-of<CountryCode>,
 *   house_number: string,
 *   locality: string,
 *   postal_code: string,
 *   street_name: string,
 *   extended_address?: string,
 *   house_suffix?: string,
 *   street_post_directional?: string,
 *   street_pre_directional?: string,
 *   street_suffix?: string,
 * }
 */
final class DynamicEmergencyAddressCreateParams implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $administrative_area;

    /** @var value-of<CountryCode> $country_code */
    #[Required(enum: CountryCode::class)]
    public string $country_code;

    #[Required]
    public string $house_number;

    #[Required]
    public string $locality;

    #[Required]
    public string $postal_code;

    #[Required]
    public string $street_name;

    #[Optional]
    public ?string $extended_address;

    #[Optional]
    public ?string $house_suffix;

    #[Optional]
    public ?string $street_post_directional;

    #[Optional]
    public ?string $street_pre_directional;

    #[Optional]
    public ?string $street_suffix;

    /**
     * `new DynamicEmergencyAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyAddressCreateParams::with(
     *   administrative_area: ...,
     *   country_code: ...,
     *   house_number: ...,
     *   locality: ...,
     *   postal_code: ...,
     *   street_name: ...,
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
     * @param CountryCode|value-of<CountryCode> $country_code
     */
    public static function with(
        string $administrative_area,
        CountryCode|string $country_code,
        string $house_number,
        string $locality,
        string $postal_code,
        string $street_name,
        ?string $extended_address = null,
        ?string $house_suffix = null,
        ?string $street_post_directional = null,
        ?string $street_pre_directional = null,
        ?string $street_suffix = null,
    ): self {
        $obj = new self;

        $obj['administrative_area'] = $administrative_area;
        $obj['country_code'] = $country_code;
        $obj['house_number'] = $house_number;
        $obj['locality'] = $locality;
        $obj['postal_code'] = $postal_code;
        $obj['street_name'] = $street_name;

        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $house_suffix && $obj['house_suffix'] = $house_suffix;
        null !== $street_post_directional && $obj['street_post_directional'] = $street_post_directional;
        null !== $street_pre_directional && $obj['street_pre_directional'] = $street_pre_directional;
        null !== $street_suffix && $obj['street_suffix'] = $street_suffix;

        return $obj;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public function withCountryCode(CountryCode|string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $obj = clone $this;
        $obj['house_number'] = $houseNumber;

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
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj['street_name'] = $streetName;

        return $obj;
    }

    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

        return $obj;
    }

    public function withHouseSuffix(string $houseSuffix): self
    {
        $obj = clone $this;
        $obj['house_suffix'] = $houseSuffix;

        return $obj;
    }

    public function withStreetPostDirectional(
        string $streetPostDirectional
    ): self {
        $obj = clone $this;
        $obj['street_post_directional'] = $streetPostDirectional;

        return $obj;
    }

    public function withStreetPreDirectional(string $streetPreDirectional): self
    {
        $obj = clone $this;
        $obj['street_pre_directional'] = $streetPreDirectional;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj['street_suffix'] = $streetSuffix;

        return $obj;
    }
}
