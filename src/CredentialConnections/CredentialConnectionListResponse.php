<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CredentialConnectionListResponseShape = array{
 *   data?: list<CredentialConnection>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class CredentialConnectionListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CredentialConnectionListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CredentialConnection>|null $data */
    #[Api(list: CredentialConnection::class, optional: true)]
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
     * @param list<CredentialConnection> $data
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
     * @param list<CredentialConnection> $data
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
