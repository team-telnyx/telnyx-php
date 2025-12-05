<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCardOrders\SimCardOrder\Cost;
use Telnyx\SimCardOrders\SimCardOrder\OrderAddress;
use Telnyx\SimCardOrders\SimCardOrder\Status;

/**
 * @phpstan-type SimCardOrderListResponseShape = array{
 *   data?: list<SimCardOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class SimCardOrderListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardOrderListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<SimCardOrder>|null $data */
    #[Api(list: SimCardOrder::class, optional: true)]
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
     * @param list<SimCardOrder|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   created_at?: string|null,
     *   order_address?: OrderAddress|null,
     *   quantity?: int|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   tracking_url?: string|null,
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
     * @param list<SimCardOrder|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   created_at?: string|null,
     *   order_address?: OrderAddress|null,
     *   quantity?: int|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   tracking_url?: string|null,
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
