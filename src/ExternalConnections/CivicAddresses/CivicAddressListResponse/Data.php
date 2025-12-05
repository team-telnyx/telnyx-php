<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse\Data\Location;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   city_or_town?: string|null,
 *   city_or_town_alias?: string|null,
 *   company_name?: string|null,
 *   country?: string|null,
 *   country_or_district?: string|null,
 *   default_location_id?: string|null,
 *   description?: string|null,
 *   house_number?: string|null,
 *   house_number_suffix?: string|null,
 *   locations?: list<Location>|null,
 *   postal_or_zip_code?: string|null,
 *   record_type?: string|null,
 *   state_or_province?: string|null,
 *   street_name?: string|null,
 *   street_suffix?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $city_or_town;

    #[Api(optional: true)]
    public ?string $city_or_town_alias;

    #[Api(optional: true)]
    public ?string $company_name;

    #[Api(optional: true)]
    public ?string $country;

    #[Api(optional: true)]
    public ?string $country_or_district;

    /**
     * Identifies what is the default location in the list of locations.
     */
    #[Api(optional: true)]
    public ?string $default_location_id;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $house_number;

    #[Api(optional: true)]
    public ?string $house_number_suffix;

    /** @var list<Location>|null $locations */
    #[Api(list: Location::class, optional: true)]
    public ?array $locations;

    #[Api(optional: true)]
    public ?string $postal_or_zip_code;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $state_or_province;

    #[Api(optional: true)]
    public ?string $street_name;

    #[Api(optional: true)]
    public ?string $street_suffix;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Location|array{
     *   id?: string|null,
     *   additional_info?: string|null,
     *   description?: string|null,
     *   is_default?: bool|null,
     * }> $locations
     */
    public static function with(
        ?string $id = null,
        ?string $city_or_town = null,
        ?string $city_or_town_alias = null,
        ?string $company_name = null,
        ?string $country = null,
        ?string $country_or_district = null,
        ?string $default_location_id = null,
        ?string $description = null,
        ?string $house_number = null,
        ?string $house_number_suffix = null,
        ?array $locations = null,
        ?string $postal_or_zip_code = null,
        ?string $record_type = null,
        ?string $state_or_province = null,
        ?string $street_name = null,
        ?string $street_suffix = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $city_or_town && $obj['city_or_town'] = $city_or_town;
        null !== $city_or_town_alias && $obj['city_or_town_alias'] = $city_or_town_alias;
        null !== $company_name && $obj['company_name'] = $company_name;
        null !== $country && $obj['country'] = $country;
        null !== $country_or_district && $obj['country_or_district'] = $country_or_district;
        null !== $default_location_id && $obj['default_location_id'] = $default_location_id;
        null !== $description && $obj['description'] = $description;
        null !== $house_number && $obj['house_number'] = $house_number;
        null !== $house_number_suffix && $obj['house_number_suffix'] = $house_number_suffix;
        null !== $locations && $obj['locations'] = $locations;
        null !== $postal_or_zip_code && $obj['postal_or_zip_code'] = $postal_or_zip_code;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $state_or_province && $obj['state_or_province'] = $state_or_province;
        null !== $street_name && $obj['street_name'] = $street_name;
        null !== $street_suffix && $obj['street_suffix'] = $street_suffix;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCityOrTown(string $cityOrTown): self
    {
        $obj = clone $this;
        $obj['city_or_town'] = $cityOrTown;

        return $obj;
    }

    public function withCityOrTownAlias(string $cityOrTownAlias): self
    {
        $obj = clone $this;
        $obj['city_or_town_alias'] = $cityOrTownAlias;

        return $obj;
    }

    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj['company_name'] = $companyName;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    public function withCountryOrDistrict(string $countryOrDistrict): self
    {
        $obj = clone $this;
        $obj['country_or_district'] = $countryOrDistrict;

        return $obj;
    }

    /**
     * Identifies what is the default location in the list of locations.
     */
    public function withDefaultLocationID(string $defaultLocationID): self
    {
        $obj = clone $this;
        $obj['default_location_id'] = $defaultLocationID;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withHouseNumber(string $houseNumber): self
    {
        $obj = clone $this;
        $obj['house_number'] = $houseNumber;

        return $obj;
    }

    public function withHouseNumberSuffix(string $houseNumberSuffix): self
    {
        $obj = clone $this;
        $obj['house_number_suffix'] = $houseNumberSuffix;

        return $obj;
    }

    /**
     * @param list<Location|array{
     *   id?: string|null,
     *   additional_info?: string|null,
     *   description?: string|null,
     *   is_default?: bool|null,
     * }> $locations
     */
    public function withLocations(array $locations): self
    {
        $obj = clone $this;
        $obj['locations'] = $locations;

        return $obj;
    }

    public function withPostalOrZipCode(string $postalOrZipCode): self
    {
        $obj = clone $this;
        $obj['postal_or_zip_code'] = $postalOrZipCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withStateOrProvince(string $stateOrProvince): self
    {
        $obj = clone $this;
        $obj['state_or_province'] = $stateOrProvince;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj['street_name'] = $streetName;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj['street_suffix'] = $streetSuffix;

        return $obj;
    }
}
