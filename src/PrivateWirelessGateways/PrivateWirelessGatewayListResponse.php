<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PrivateWirelessGatewayListResponseShape = array{
 *   data?: list<PrivateWirelessGateway>|null, meta?: PaginationMeta|null
 * }
 */
final class PrivateWirelessGatewayListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PrivateWirelessGatewayListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PrivateWirelessGateway>|null $data */
    #[Api(list: PrivateWirelessGateway::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<PrivateWirelessGateway|array{
     *   id?: string|null,
     *   assigned_resources?: list<PwgAssignedResourcesSummary>|null,
     *   created_at?: string|null,
     *   ip_range?: string|null,
     *   name?: string|null,
     *   network_id?: string|null,
     *   record_type?: string|null,
     *   region_code?: string|null,
     *   status?: PrivateWirelessGatewayStatus|null,
     *   updated_at?: string|null,
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
     * @param list<PrivateWirelessGateway|array{
     *   id?: string|null,
     *   assigned_resources?: list<PwgAssignedResourcesSummary>|null,
     *   created_at?: string|null,
     *   ip_range?: string|null,
     *   name?: string|null,
     *   network_id?: string|null,
     *   record_type?: string|null,
     *   region_code?: string|null,
     *   status?: PrivateWirelessGatewayStatus|null,
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
