<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\CountryCode;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress\Status;

/**
 * @phpstan-type DynamicEmergencyAddressNewResponseShape = array{
 *   data?: DynamicEmergencyAddress|null
 * }
 */
final class DynamicEmergencyAddressNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DynamicEmergencyAddressNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     * } $data
     */
    public static function with(
        DynamicEmergencyAddress|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param DynamicEmergencyAddress|array{
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
     * } $data
     */
    public function withData(DynamicEmergencyAddress|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
