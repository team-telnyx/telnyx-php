<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Data;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Data\Region;

/**
 * @phpstan-type VirtualCrossConnectListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class VirtualCrossConnectListResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectListResponseShape> */
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
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   name?: string|null,
     *   network_id?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   region_code?: string|null,
     *   bgp_asn: float,
     *   cloud_provider: value-of<CloudProvider>,
     *   cloud_provider_region: string,
     *   primary_cloud_account_id: string,
     *   bandwidth_mbps?: float|null,
     *   primary_bgp_key?: string|null,
     *   primary_cloud_ip?: string|null,
     *   primary_enabled?: bool|null,
     *   primary_routing_announcement?: bool|null,
     *   primary_telnyx_ip?: string|null,
     *   region?: Region|null,
     *   secondary_bgp_key?: string|null,
     *   secondary_cloud_account_id?: string|null,
     *   secondary_cloud_ip?: string|null,
     *   secondary_enabled?: bool|null,
     *   secondary_routing_announcement?: bool|null,
     *   secondary_telnyx_ip?: string|null,
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
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   name?: string|null,
     *   network_id?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   region_code?: string|null,
     *   bgp_asn: float,
     *   cloud_provider: value-of<CloudProvider>,
     *   cloud_provider_region: string,
     *   primary_cloud_account_id: string,
     *   bandwidth_mbps?: float|null,
     *   primary_bgp_key?: string|null,
     *   primary_cloud_ip?: string|null,
     *   primary_enabled?: bool|null,
     *   primary_routing_announcement?: bool|null,
     *   primary_telnyx_ip?: string|null,
     *   region?: Region|null,
     *   secondary_bgp_key?: string|null,
     *   secondary_cloud_account_id?: string|null,
     *   secondary_cloud_ip?: string|null,
     *   secondary_enabled?: bool|null,
     *   secondary_routing_announcement?: bool|null,
     *   secondary_telnyx_ip?: string|null,
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
