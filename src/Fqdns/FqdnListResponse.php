<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\ConnectionsPaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FqdnListResponseShape = array{
 *   data?: list<Fqdn>|null, meta?: ConnectionsPaginationMeta|null
 * }
 */
final class FqdnListResponse implements BaseModel
{
    /** @use SdkModel<FqdnListResponseShape> */
    use SdkModel;

    /** @var list<Fqdn>|null $data */
    #[Optional(list: Fqdn::class)]
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
     * @param list<Fqdn|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: string|null,
     *   dnsRecordType?: string|null,
     *   fqdn?: string|null,
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
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Fqdn|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: string|null,
     *   dnsRecordType?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
