<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\PaginationMetaOAuth;
use Telnyx\OAuthGrants\OAuthGrant\RecordType;

/**
 * @phpstan-type OAuthGrantListResponseShape = array{
 *   data?: list<OAuthGrant>|null, meta?: PaginationMetaOAuth|null
 * }
 */
final class OAuthGrantListResponse implements BaseModel
{
    /** @use SdkModel<OAuthGrantListResponseShape> */
    use SdkModel;

    /** @var list<OAuthGrant>|null $data */
    #[Optional(list: OAuthGrant::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMetaOAuth $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OAuthGrant|array{
     *   id: string,
     *   clientID: string,
     *   createdAt: \DateTimeInterface,
     *   recordType: value-of<RecordType>,
     *   scopes: list<string>,
     *   lastUsedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMetaOAuth|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaOAuth|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<OAuthGrant|array{
     *   id: string,
     *   clientID: string,
     *   createdAt: \DateTimeInterface,
     *   recordType: value-of<RecordType>,
     *   scopes: list<string>,
     *   lastUsedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaOAuth|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaOAuth|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
