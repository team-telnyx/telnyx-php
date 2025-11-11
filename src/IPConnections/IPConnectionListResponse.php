<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type IPConnectionListResponseShape = array{
 *   data?: list<IPConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class IPConnectionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<IPConnectionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<IPConnection>|null $data */
    #[Api(list: IPConnection::class, optional: true)]
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
     * @param list<IPConnection> $data
     */
    public static function with(
        ?array $data = null,
        ?ConnectionsPaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<IPConnection> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(ConnectionsPaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
