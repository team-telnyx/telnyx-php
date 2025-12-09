<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IPListResponseShape = array{
 *   data?: list<IP>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class IPListResponse implements BaseModel
{
    /** @use SdkModel<IPListResponseShape> */
    use SdkModel;

    /** @var list<IP>|null $data */
    #[Optional(list: IP::class)]
    public ?array $data;

    #[Optional]
    public ?ConnectionsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<IP|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: string|null,
     *   ipAddress?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param ConnectionsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ConnectionsPaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<IP|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: string|null,
     *   ipAddress?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
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
     * @param ConnectionsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(ConnectionsPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
