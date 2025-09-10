<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse\Data\Location;

/**
 * @phpstan-type data_alias = array{
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
 *   locations?: list<Location>|null,
 *   postalOrZipCode?: string|null,
 *   recordType?: string|null,
 *   stateOrProvince?: string|null,
 *   streetName?: string|null,
 *   streetSuffix?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('city_or_town', optional: true)]
    public ?string $cityOrTown;

    #[Api('city_or_town_alias', optional: true)]
    public ?string $cityOrTownAlias;

    #[Api('company_name', optional: true)]
    public ?string $companyName;

    #[Api(optional: true)]
    public ?string $country;

    #[Api('country_or_district', optional: true)]
    public ?string $countryOrDistrict;

    /**
     * Identifies what is the default location in the list of locations.
     */
    #[Api('default_location_id', optional: true)]
    public ?string $defaultLocationID;

    #[Api(optional: true)]
    public ?string $description;

    #[Api('house_number', optional: true)]
    public ?string $houseNumber;

    #[Api('house_number_suffix', optional: true)]
    public ?string $houseNumberSuffix;

    /** @var list<Location>|null $locations */
    #[Api(list: Location::class, optional: true)]
    public ?array $locations;

    #[Api('postal_or_zip_code', optional: true)]
    public ?string $postalOrZipCode;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('state_or_province', optional: true)]
    public ?string $stateOrProvince;

    #[Api('street_name', optional: true)]
    public ?string $streetName;

    #[Api('street_suffix', optional: true)]
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
     * @param list<Location> $locations
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $cityOrTown && $obj->cityOrTown = $cityOrTown;
        null !== $cityOrTownAlias && $obj->cityOrTownAlias = $cityOrTownAlias;
        null !== $companyName && $obj->companyName = $companyName;
        null !== $country && $obj->country = $country;
        null !== $countryOrDistrict && $obj->countryOrDistrict = $countryOrDistrict;
        null !== $defaultLocationID && $obj->defaultLocationID = $defaultLocationID;
        null !== $description && $obj->description = $description;
        null !== $houseNumber && $obj->houseNumber = $houseNumber;
        null !== $houseNumberSuffix && $obj->houseNumberSuffix = $houseNumberSuffix;
        null !== $locations && $obj->locations = $locations;
        null !== $postalOrZipCode && $obj->postalOrZipCode = $postalOrZipCode;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $stateOrProvince && $obj->stateOrProvince = $stateOrProvince;
        null !== $streetName && $obj->streetName = $streetName;
        null !== $streetSuffix && $obj->streetSuffix = $streetSuffix;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCityOrTown(string $cityOrTown): self
    {
        $obj = clone $this;
        $obj->cityOrTown = $cityOrTown;

        return $obj;
    }

    public function withCityOrTownAlias(string $cityOrTownAlias): self
    {
        $obj = clone $this;
        $obj->cityOrTownAlias = $cityOrTownAlias;

        return $obj;
    }

    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->companyName = $companyName;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withCountryOrDistrict(string $countryOrDistrict): self
    {
        $obj = clone $this;
        $obj->countryOrDistrict = $countryOrDistrict;

        return $obj;
    }

    /**
     * Identifies what is the default location in the list of locations.
     */
    public function withDefaultLocationID(string $defaultLocationID): self
    {
        $obj = clone $this;
        $obj->defaultLocationID = $defaultLocationID;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $obj = clone $this;
        $obj->houseNumber = $houseNumber;

        return $obj;
    }

    public function withHouseNumberSuffix(string $houseNumberSuffix): self
    {
        $obj = clone $this;
        $obj->houseNumberSuffix = $houseNumberSuffix;

        return $obj;
    }

    /**
     * @param list<Location> $locations
     */
    public function withLocations(array $locations): self
    {
        $obj = clone $this;
        $obj->locations = $locations;

        return $obj;
    }

    public function withPostalOrZipCode(string $postalOrZipCode): self
    {
        $obj = clone $this;
        $obj->postalOrZipCode = $postalOrZipCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withStateOrProvince(string $stateOrProvince): self
    {
        $obj = clone $this;
        $obj->stateOrProvince = $stateOrProvince;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj->streetName = $streetName;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj->streetSuffix = $streetSuffix;

        return $obj;
    }
}
