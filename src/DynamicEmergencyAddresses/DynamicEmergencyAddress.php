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
 *   administrativeArea: string,
 *   countryCode: value-of<CountryCode>,
 *   houseNumber: string,
 *   locality: string,
 *   postalCode: string,
 *   streetName: string,
 *   id?: string,
 *   createdAt?: string,
 *   extendedAddress?: string,
 *   houseSuffix?: string,
 *   recordType?: string,
 *   sipGeolocationID?: string,
 *   status?: value-of<Status>,
 *   streetPostDirectional?: string,
 *   streetPreDirectional?: string,
 *   streetSuffix?: string,
 *   updatedAt?: string,
 * }
 */
final class DynamicEmergencyAddress implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressShape> */
    use SdkModel;

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

    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    #[Api('house_suffix', optional: true)]
    public ?string $houseSuffix;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Unique location reference string to be used in SIP INVITE from / p-asserted headers.
     */
    #[Api('sip_geolocation_id', optional: true)]
    public ?string $sipGeolocationID;

    /**
     * Status of dynamic emergency address.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api('street_post_directional', optional: true)]
    public ?string $streetPostDirectional;

    #[Api('street_pre_directional', optional: true)]
    public ?string $streetPreDirectional;

    #[Api('street_suffix', optional: true)]
    public ?string $streetSuffix;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * `new DynamicEmergencyAddress()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyAddress::with(
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
     * @param CountryCode|value-of<CountryCode> $countryCode
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $administrativeArea,
        CountryCode|string $countryCode,
        string $houseNumber,
        string $locality,
        string $postalCode,
        string $streetName,
        ?string $id = null,
        ?string $createdAt = null,
        ?string $extendedAddress = null,
        ?string $houseSuffix = null,
        ?string $recordType = null,
        ?string $sipGeolocationID = null,
        Status|string|null $status = null,
        ?string $streetPostDirectional = null,
        ?string $streetPreDirectional = null,
        ?string $streetSuffix = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->administrativeArea = $administrativeArea;
        $obj['countryCode'] = $countryCode;
        $obj->houseNumber = $houseNumber;
        $obj->locality = $locality;
        $obj->postalCode = $postalCode;
        $obj->streetName = $streetName;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $houseSuffix && $obj->houseSuffix = $houseSuffix;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $sipGeolocationID && $obj->sipGeolocationID = $sipGeolocationID;
        null !== $status && $obj['status'] = $status;
        null !== $streetPostDirectional && $obj->streetPostDirectional = $streetPostDirectional;
        null !== $streetPreDirectional && $obj->streetPreDirectional = $streetPreDirectional;
        null !== $streetSuffix && $obj->streetSuffix = $streetSuffix;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj['countryCode'] = $countryCode;

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
        $obj->createdAt = $createdAt;

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

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Unique location reference string to be used in SIP INVITE from / p-asserted headers.
     */
    public function withSipGeolocationID(string $sipGeolocationID): self
    {
        $obj = clone $this;
        $obj->sipGeolocationID = $sipGeolocationID;

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

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
