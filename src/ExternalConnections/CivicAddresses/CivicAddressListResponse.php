<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse\Data;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListResponse\Data\Location;

/**
 * @phpstan-type CivicAddressListResponseShape = array{data?: list<Data>|null}
 */
final class CivicAddressListResponse implements BaseModel
{
    /** @use SdkModel<CivicAddressListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
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
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
