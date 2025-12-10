<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\Status;
use Telnyx\Metadata;

/**
 * @phpstan-type DynamicEmergencyAddressListResponseShape = array{
 *   data?: list<DynamicEmergencyAddress>|null, meta?: Metadata|null
 * }
 */
final class DynamicEmergencyAddressListResponse implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressListResponseShape> */
    use SdkModel;

    /** @var list<DynamicEmergencyAddress>|null $data */
    #[Optional(list: DynamicEmergencyAddress::class)]
    public ?array $data;

    #[Optional]
    public ?Metadata $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DynamicEmergencyAddress|array{
     *   administrativeArea: string,
     *   countryCode: value-of<CountryCode>,
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
     *   status?: value-of<Status>|null,
     *   streetPostDirectional?: string|null,
     *   streetPreDirectional?: string|null,
     *   streetSuffix?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<DynamicEmergencyAddress|array{
     *   administrativeArea: string,
     *   countryCode: value-of<CountryCode>,
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
     *   status?: value-of<Status>|null,
     *   streetPostDirectional?: string|null,
     *   streetPreDirectional?: string|null,
     *   streetSuffix?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Metadata|array{
     *   pageNumber?: float|null,
     *   pageSize?: float|null,
     *   totalPages?: float|null,
     *   totalResults?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
