<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\Status;

/**
 * @phpstan-type DynamicEmergencyAddressShape = array{
 *   administrativeArea: string,
 *   countryCode: CountryCode|value-of<CountryCode>,
 *   houseNumber: string,
 *   locality: string,
 *   postalCode: string,
 *   streetName: string,
 *   id?: string|null,
 *   createdAt?: string|null,
 *   extendedAddress?: string|null,
 *   houseSuffix?: string|null,
 *   recordType?: string|null,
 *   sipGeolocationID?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   streetPostDirectional?: string|null,
 *   streetPreDirectional?: string|null,
 *   streetSuffix?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class DynamicEmergencyAddress implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressShape> */
    use SdkModel;

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

    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('extended_address')]
    public ?string $extendedAddress;

    #[Optional('house_suffix')]
    public ?string $houseSuffix;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Unique location reference string to be used in SIP INVITE from / p-asserted headers.
     */
    #[Optional('sip_geolocation_id')]
    public ?string $sipGeolocationID;

    /**
     * Status of dynamic emergency address.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('street_post_directional')]
    public ?string $streetPostDirectional;

    #[Optional('street_pre_directional')]
    public ?string $streetPreDirectional;

    #[Optional('street_suffix')]
    public ?string $streetSuffix;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Optional('updated_at')]
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
        $self = new self;

        $self['administrativeArea'] = $administrativeArea;
        $self['countryCode'] = $countryCode;
        $self['houseNumber'] = $houseNumber;
        $self['locality'] = $locality;
        $self['postalCode'] = $postalCode;
        $self['streetName'] = $streetName;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;
        null !== $houseSuffix && $self['houseSuffix'] = $houseSuffix;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sipGeolocationID && $self['sipGeolocationID'] = $sipGeolocationID;
        null !== $status && $self['status'] = $status;
        null !== $streetPostDirectional && $self['streetPostDirectional'] = $streetPostDirectional;
        null !== $streetPreDirectional && $self['streetPreDirectional'] = $streetPreDirectional;
        null !== $streetSuffix && $self['streetSuffix'] = $streetSuffix;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique location reference string to be used in SIP INVITE from / p-asserted headers.
     */
    public function withSipGeolocationID(string $sipGeolocationID): self
    {
        $self = clone $this;
        $self['sipGeolocationID'] = $sipGeolocationID;

        return $self;
    }

    /**
     * Status of dynamic emergency address.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

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

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
