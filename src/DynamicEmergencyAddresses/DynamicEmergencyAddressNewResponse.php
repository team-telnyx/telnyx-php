<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\Status;

/**
 * @phpstan-type DynamicEmergencyAddressNewResponseShape = array{
 *   data?: DynamicEmergencyAddress|null
 * }
 */
final class DynamicEmergencyAddressNewResponse implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?DynamicEmergencyAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DynamicEmergencyAddress|array{
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
     * } $data
     */
    public static function with(
        DynamicEmergencyAddress|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DynamicEmergencyAddress|array{
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
     * } $data
     */
    public function withData(DynamicEmergencyAddress|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
