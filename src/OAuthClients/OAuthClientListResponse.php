<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClient\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClient\ClientType;
use Telnyx\OAuthClients\OAuthClient\RecordType;

/**
 * @phpstan-type OAuthClientListResponseShape = array{
 *   data?: list<OAuthClient>|null, meta?: PaginationMetaOAuth|null
 * }
 */
final class OAuthClientListResponse implements BaseModel
{
    /** @use SdkModel<OAuthClientListResponseShape> */
    use SdkModel;

    /** @var list<OAuthClient>|null $data */
    #[Optional(list: OAuthClient::class)]
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
     * @param list<OAuthClient|array{
     *   clientID: string,
     *   clientType: value-of<ClientType>,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   orgID: string,
     *   recordType: value-of<RecordType>,
     *   requirePkce: bool,
     *   updatedAt: \DateTimeInterface,
     *   userID: string,
     *   allowedGrantTypes?: list<value-of<AllowedGrantType>>|null,
     *   allowedScopes?: list<string>|null,
     *   clientSecret?: string|null,
     *   logoUri?: string|null,
     *   policyUri?: string|null,
     *   redirectUris?: list<string>|null,
     *   tosUri?: string|null,
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
     * @param list<OAuthClient|array{
     *   clientID: string,
     *   clientType: value-of<ClientType>,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   orgID: string,
     *   recordType: value-of<RecordType>,
     *   requirePkce: bool,
     *   updatedAt: \DateTimeInterface,
     *   userID: string,
     *   allowedGrantTypes?: list<value-of<AllowedGrantType>>|null,
     *   allowedScopes?: list<string>|null,
     *   clientSecret?: string|null,
     *   logoUri?: string|null,
     *   policyUri?: string|null,
     *   redirectUris?: list<string>|null,
     *   tosUri?: string|null,
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
