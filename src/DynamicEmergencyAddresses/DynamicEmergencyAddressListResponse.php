<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
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
    #[Api(list: DynamicEmergencyAddress::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * }> $data
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<DynamicEmergencyAddress|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
