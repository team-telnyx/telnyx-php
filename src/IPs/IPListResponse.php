<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type IPListResponseShape = array{
 *   data?: list<IP>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class IPListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<IPListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<IP>|null $data */
    #[Api(list: IP::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   connection_id?: string|null,
     *   created_at?: string|null,
     *   ip_address?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     * }> $data
     * @param ConnectionsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   connection_id?: string|null,
     *   created_at?: string|null,
     *   ip_address?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
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
     * @param ConnectionsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(ConnectionsPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
