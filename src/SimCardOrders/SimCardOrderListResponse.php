<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrders\SimCardOrder\Cost;
use Telnyx\SimCardOrders\SimCardOrder\OrderAddress;
use Telnyx\SimCardOrders\SimCardOrder\Status;

/**
 * @phpstan-type SimCardOrderListResponseShape = array{
 *   data?: list<SimCardOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class SimCardOrderListResponse implements BaseModel
{
    /** @use SdkModel<SimCardOrderListResponseShape> */
    use SdkModel;

    /** @var list<SimCardOrder>|null $data */
    #[Optional(list: SimCardOrder::class)]
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
     * @param list<SimCardOrder|array{
     *   id?: string|null,
     *   cost?: Cost|null,
     *   createdAt?: string|null,
     *   orderAddress?: OrderAddress|null,
     *   quantity?: int|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   trackingURL?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   createdAt?: string|null,
     *   orderAddress?: OrderAddress|null,
     *   quantity?: int|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   trackingURL?: string|null,
     *   updatedAt?: string|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
