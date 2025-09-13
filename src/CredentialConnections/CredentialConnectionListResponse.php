<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type credential_connection_list_response = array{
 *   data?: list<CredentialConnection>, meta?: ConnectionsPaginationMeta
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CredentialConnectionListResponse implements BaseModel
{
    /** @use SdkModel<credential_connection_list_response> */
    use SdkModel;

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
