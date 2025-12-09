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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
