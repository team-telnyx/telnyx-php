<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LocationShape from \Telnyx\ExternalConnections\CivicAddresses\Location
 *
 * @phpstan-type CivicAddressShape = array{
 *   id?: string|null,
 *   cityOrTown?: string|null,
 *   cityOrTownAlias?: string|null,
 *   companyName?: string|null,
 *   country?: string|null,
 *   countryOrDistrict?: string|null,
 *   defaultLocationID?: string|null,
 *   description?: string|null,
 *   houseNumber?: string|null,
 *   houseNumberSuffix?: string|null,
 *   locations?: list<Location|LocationShape>|null,
 *   postalOrZipCode?: string|null,
 *   recordType?: string|null,
 *   stateOrProvince?: string|null,
 *   streetName?: string|null,
 *   streetSuffix?: string|null,
 * }
 */
final class CivicAddress implements BaseModel
{
    /** @use SdkModel<CivicAddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional]
    public ?string $id;

    #[Optional('city_or_town')]
    public ?string $cityOrTown;

    #[Optional('city_or_town_alias')]
    public ?string $cityOrTownAlias;

    #[Optional('company_name')]
    public ?string $companyName;

    #[Optional]
    public ?string $country;

    #[Optional('country_or_district')]
    public ?string $countryOrDistrict;

    /**
     * Identifies what is the default location in the list of locations.
     */
    #[Optional('default_location_id')]
    public ?string $defaultLocationID;

    #[Optional]
    public ?string $description;

    #[Optional('house_number')]
    public ?string $houseNumber;

    #[Optional('house_number_suffix')]
    public ?string $houseNumberSuffix;

    /** @var list<Location>|null $locations */
    #[Optional(list: Location::class)]
    public ?array $locations;

    #[Optional('postal_or_zip_code')]
    public ?string $postalOrZipCode;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('state_or_province')]
    public ?string $stateOrProvince;

    #[Optional('street_name')]
    public ?string $streetName;

    #[Optional('street_suffix')]
    public ?string $streetSuffix;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Location|LocationShape>|null $locations
     */
    public static function with(
        ?string $id = null,
        ?string $cityOrTown = null,
        ?string $cityOrTownAlias = null,
        ?string $companyName = null,
        ?string $country = null,
        ?string $countryOrDistrict = null,
        ?string $defaultLocationID = null,
        ?string $description = null,
        ?string $houseNumber = null,
        ?string $houseNumberSuffix = null,
        ?array $locations = null,
        ?string $postalOrZipCode = null,
        ?string $recordType = null,
        ?string $stateOrProvince = null,
        ?string $streetName = null,
        ?string $streetSuffix = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cityOrTown && $self['cityOrTown'] = $cityOrTown;
        null !== $cityOrTownAlias && $self['cityOrTownAlias'] = $cityOrTownAlias;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $country && $self['country'] = $country;
        null !== $countryOrDistrict && $self['countryOrDistrict'] = $countryOrDistrict;
        null !== $defaultLocationID && $self['defaultLocationID'] = $defaultLocationID;
        null !== $description && $self['description'] = $description;
        null !== $houseNumber && $self['houseNumber'] = $houseNumber;
        null !== $houseNumberSuffix && $self['houseNumberSuffix'] = $houseNumberSuffix;
        null !== $locations && $self['locations'] = $locations;
        null !== $postalOrZipCode && $self['postalOrZipCode'] = $postalOrZipCode;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $stateOrProvince && $self['stateOrProvince'] = $stateOrProvince;
        null !== $streetName && $self['streetName'] = $streetName;
        null !== $streetSuffix && $self['streetSuffix'] = $streetSuffix;

        return $self;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCityOrTown(string $cityOrTown): self
    {
        $self = clone $this;
        $self['cityOrTown'] = $cityOrTown;

        return $self;
    }

    public function withCityOrTownAlias(string $cityOrTownAlias): self
    {
        $self = clone $this;
        $self['cityOrTownAlias'] = $cityOrTownAlias;

        return $self;
    }

    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withCountryOrDistrict(string $countryOrDistrict): self
    {
        $self = clone $this;
        $self['countryOrDistrict'] = $countryOrDistrict;

        return $self;
    }

    /**
     * Identifies what is the default location in the list of locations.
     */
    public function withDefaultLocationID(string $defaultLocationID): self
    {
        $self = clone $this;
        $self['defaultLocationID'] = $defaultLocationID;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $self = clone $this;
        $self['houseNumber'] = $houseNumber;

        return $self;
    }

    public function withHouseNumberSuffix(string $houseNumberSuffix): self
    {
        $self = clone $this;
        $self['houseNumberSuffix'] = $houseNumberSuffix;

        return $self;
    }

    /**
     * @param list<Location|LocationShape> $locations
     */
    public function withLocations(array $locations): self
    {
        $self = clone $this;
        $self['locations'] = $locations;

        return $self;
    }

    public function withPostalOrZipCode(string $postalOrZipCode): self
    {
        $self = clone $this;
        $self['postalOrZipCode'] = $postalOrZipCode;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withStateOrProvince(string $stateOrProvince): self
    {
        $self = clone $this;
        $self['stateOrProvince'] = $stateOrProvince;

        return $self;
    }

    public function withStreetName(string $streetName): self
    {
        $self = clone $this;
        $self['streetName'] = $streetName;

        return $self;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $self = clone $this;
        $self['streetSuffix'] = $streetSuffix;

        return $self;
    }
}
