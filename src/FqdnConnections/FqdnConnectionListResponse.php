<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type fqdn_connection_list_response = array{
 *   data?: list<FqdnConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class FqdnConnectionListResponse implements BaseModel
{
    /** @use SdkModel<fqdn_connection_list_response> */
    use SdkModel;

    /** @var list<FqdnConnection>|null $data */
    #[Api(list: FqdnConnection::class, optional: true)]
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
     * @param list<FqdnConnection> $data
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
     * @param list<FqdnConnection> $data
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
