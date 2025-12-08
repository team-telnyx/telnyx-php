<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\Data;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\Data\LogType;

/**
 * @phpstan-type SimCardListWirelessConnectivityLogsResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class SimCardListWirelessConnectivityLogsResponse implements BaseModel
{
    /** @use SdkModel<SimCardListWirelessConnectivityLogsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

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
     *   id?: int|null,
     *   apn?: string|null,
     *   cell_id?: string|null,
     *   created_at?: string|null,
     *   imei?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   last_seen?: string|null,
     *   log_type?: value-of<LogType>|null,
     *   mobile_country_code?: string|null,
     *   mobile_network_code?: string|null,
     *   radio_access_technology?: string|null,
     *   record_type?: string|null,
     *   sim_card_id?: string|null,
     *   start_time?: string|null,
     *   state?: string|null,
     *   stop_time?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: int|null,
     *   apn?: string|null,
     *   cell_id?: string|null,
     *   created_at?: string|null,
     *   imei?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   last_seen?: string|null,
     *   log_type?: value-of<LogType>|null,
     *   mobile_country_code?: string|null,
     *   mobile_network_code?: string|null,
     *   radio_access_technology?: string|null,
     *   record_type?: string|null,
     *   sim_card_id?: string|null,
     *   start_time?: string|null,
     *   state?: string|null,
     *   stop_time?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
