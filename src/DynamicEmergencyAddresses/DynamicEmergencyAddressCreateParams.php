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
 *   extendedAddress?: string|null,
 *   houseSuffix?: string|null,
 *   streetPostDirectional?: string|null,
 *   streetPreDirectional?: string|null,
 *   streetSuffix?: string|null,
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
        $self = new self;

        $self['administrativeArea'] = $administrativeArea;
        $self['countryCode'] = $countryCode;
        $self['houseNumber'] = $houseNumber;
        $self['locality'] = $locality;
        $self['postalCode'] = $postalCode;
        $self['streetName'] = $streetName;

        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $houseSuffix && $self['houseSuffix'] = $houseSuffix;
        null !== $streetPostDirectional && $self['streetPostDirectional'] = $streetPostDirectional;
        null !== $streetPreDirectional && $self['streetPreDirectional'] = $streetPreDirectional;
        null !== $streetSuffix && $self['streetSuffix'] = $streetSuffix;

        return $self;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public function withCountryCode(CountryCode|string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $self = clone $this;
        $self['houseNumber'] = $houseNumber;

        return $self;
    }

    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    public function withStreetName(string $streetName): self
    {
        $self = clone $this;
        $self['streetName'] = $streetName;

        return $self;
    }

    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    public function withHouseSuffix(string $houseSuffix): self
    {
        $self = clone $this;
        $self['houseSuffix'] = $houseSuffix;

        return $self;
    }

    public function withStreetPostDirectional(
        string $streetPostDirectional
    ): self {
        $self = clone $this;
        $self['streetPostDirectional'] = $streetPostDirectional;

        return $self;
    }

    public function withStreetPreDirectional(string $streetPreDirectional): self
    {
        $self = clone $this;
        $self['streetPreDirectional'] = $streetPreDirectional;

        return $self;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $self = clone $this;
        $self['streetSuffix'] = $streetSuffix;

        return $self;
    }
}
