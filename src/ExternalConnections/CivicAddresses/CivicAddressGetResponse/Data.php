<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressGetResponse\Data\Location;

/**
 * @phpstan-type DataShape = array{
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
    /** @use SdkModel<DataShape> */
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
     * @param list<Location|array{
     *   id?: string|null,
     *   additionalInfo?: string|null,
     *   description?: string|null,
     *   isDefault?: bool|null,
     * }> $locations
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

        null !== $id && $obj['id'] = $id;
        null !== $cityOrTown && $obj['cityOrTown'] = $cityOrTown;
        null !== $cityOrTownAlias && $obj['cityOrTownAlias'] = $cityOrTownAlias;
        null !== $companyName && $obj['companyName'] = $companyName;
        null !== $country && $obj['country'] = $country;
        null !== $countryOrDistrict && $obj['countryOrDistrict'] = $countryOrDistrict;
        null !== $defaultLocationID && $obj['defaultLocationID'] = $defaultLocationID;
        null !== $description && $obj['description'] = $description;
        null !== $houseNumber && $obj['houseNumber'] = $houseNumber;
        null !== $houseNumberSuffix && $obj['houseNumberSuffix'] = $houseNumberSuffix;
        null !== $locations && $obj['locations'] = $locations;
        null !== $postalOrZipCode && $obj['postalOrZipCode'] = $postalOrZipCode;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $stateOrProvince && $obj['stateOrProvince'] = $stateOrProvince;
        null !== $streetName && $obj['streetName'] = $streetName;
        null !== $streetSuffix && $obj['streetSuffix'] = $streetSuffix;

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
        $obj['cityOrTown'] = $cityOrTown;

        return $obj;
    }

    public function withCityOrTownAlias(string $cityOrTownAlias): self
    {
        $obj = clone $this;
        $obj['cityOrTownAlias'] = $cityOrTownAlias;

        return $obj;
    }

    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj['companyName'] = $companyName;

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
        $obj['countryOrDistrict'] = $countryOrDistrict;

        return $obj;
    }

    /**
     * Identifies what is the default location in the list of locations.
     */
    public function withDefaultLocationID(string $defaultLocationID): self
    {
        $obj = clone $this;
        $obj['defaultLocationID'] = $defaultLocationID;

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
        $obj['houseNumber'] = $houseNumber;

        return $obj;
    }

    public function withHouseNumberSuffix(string $houseNumberSuffix): self
    {
        $obj = clone $this;
        $obj['houseNumberSuffix'] = $houseNumberSuffix;

        return $obj;
    }

    /**
     * @param list<Location|array{
     *   id?: string|null,
     *   additionalInfo?: string|null,
     *   description?: string|null,
     *   isDefault?: bool|null,
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
        $obj['postalOrZipCode'] = $postalOrZipCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    public function withStateOrProvince(string $stateOrProvince): self
    {
        $obj = clone $this;
        $obj['stateOrProvince'] = $stateOrProvince;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj['streetName'] = $streetName;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj['streetSuffix'] = $streetSuffix;

        return $obj;
    }
}
