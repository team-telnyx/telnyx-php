<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\Status;

/**
 * @phpstan-type DynamicEmergencyAddressShape = array{
 *   administrative_area: string,
 *   country_code: value-of<CountryCode>,
 *   house_number: string,
 *   locality: string,
 *   postal_code: string,
 *   street_name: string,
 *   id?: string|null,
 *   created_at?: string|null,
 *   extended_address?: string|null,
 *   house_suffix?: string|null,
 *   record_type?: string|null,
 *   sip_geolocation_id?: string|null,
 *   status?: value-of<Status>|null,
 *   street_post_directional?: string|null,
 *   street_pre_directional?: string|null,
 *   street_suffix?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class DynamicEmergencyAddress implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressShape> */
    use SdkModel;

    #[Api]
    public string $administrative_area;

    /** @var value-of<CountryCode> $country_code */
    #[Api(enum: CountryCode::class)]
    public string $country_code;

    #[Api]
    public string $house_number;

    #[Api]
    public string $locality;

    #[Api]
    public string $postal_code;

    #[Api]
    public string $street_name;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    #[Api(optional: true)]
    public ?string $extended_address;

    #[Api(optional: true)]
    public ?string $house_suffix;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Unique location reference string to be used in SIP INVITE from / p-asserted headers.
     */
    #[Api(optional: true)]
    public ?string $sip_geolocation_id;

    /**
     * Status of dynamic emergency address.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?string $street_post_directional;

    #[Api(optional: true)]
    public ?string $street_pre_directional;

    #[Api(optional: true)]
    public ?string $street_suffix;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * `new DynamicEmergencyAddress()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyAddress::with(
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
     * (new DynamicEmergencyAddress)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $administrative_area,
        CountryCode|string $country_code,
        string $house_number,
        string $locality,
        string $postal_code,
        string $street_name,
        ?string $id = null,
        ?string $created_at = null,
        ?string $extended_address = null,
        ?string $house_suffix = null,
        ?string $record_type = null,
        ?string $sip_geolocation_id = null,
        Status|string|null $status = null,
        ?string $street_post_directional = null,
        ?string $street_pre_directional = null,
        ?string $street_suffix = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        $obj->administrative_area = $administrative_area;
        $obj['country_code'] = $country_code;
        $obj->house_number = $house_number;
        $obj->locality = $locality;
        $obj->postal_code = $postal_code;
        $obj->street_name = $street_name;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $extended_address && $obj->extended_address = $extended_address;
        null !== $house_suffix && $obj->house_suffix = $house_suffix;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $sip_geolocation_id && $obj->sip_geolocation_id = $sip_geolocation_id;
        null !== $status && $obj['status'] = $status;
        null !== $street_post_directional && $obj->street_post_directional = $street_post_directional;
        null !== $street_pre_directional && $obj->street_pre_directional = $street_pre_directional;
        null !== $street_suffix && $obj->street_suffix = $street_suffix;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrative_area = $administrativeArea;

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
        $obj->house_number = $houseNumber;

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
        $obj->postal_code = $postalCode;

        return $obj;
    }

    public function withStreetName(string $streetName): self
    {
        $obj = clone $this;
        $obj->street_name = $streetName;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extended_address = $extendedAddress;

        return $obj;
    }

    public function withHouseSuffix(string $houseSuffix): self
    {
        $obj = clone $this;
        $obj->house_suffix = $houseSuffix;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * Unique location reference string to be used in SIP INVITE from / p-asserted headers.
     */
    public function withSipGeolocationID(string $sipGeolocationID): self
    {
        $obj = clone $this;
        $obj->sip_geolocation_id = $sipGeolocationID;

        return $obj;
    }

    /**
     * Status of dynamic emergency address.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withStreetPostDirectional(
        string $streetPostDirectional
    ): self {
        $obj = clone $this;
        $obj->street_post_directional = $streetPostDirectional;

        return $obj;
    }

    public function withStreetPreDirectional(string $streetPreDirectional): self
    {
        $obj = clone $this;
        $obj->street_pre_directional = $streetPreDirectional;

        return $obj;
    }

    public function withStreetSuffix(string $streetSuffix): self
    {
        $obj = clone $this;
        $obj->street_suffix = $streetSuffix;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
