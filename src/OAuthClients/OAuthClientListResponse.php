<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\OAuthClients\OAuthClient\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClient\ClientType;
use Telnyx\OAuthClients\OAuthClient\RecordType;

/**
 * @phpstan-type OAuthClientListResponseShape = array{
 *   data?: list<OAuthClient>|null, meta?: PaginationMetaOAuth|null
 * }
 */
final class OAuthClientListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<OAuthClientListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<OAuthClient>|null $data */
    #[Api(list: OAuthClient::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   client_id: string,
     *   client_type: value-of<ClientType>,
     *   created_at: \DateTimeInterface,
     *   name: string,
     *   org_id: string,
     *   record_type: value-of<RecordType>,
     *   require_pkce: bool,
     *   updated_at: \DateTimeInterface,
     *   user_id: string,
     *   allowed_grant_types?: list<value-of<AllowedGrantType>>|null,
     *   allowed_scopes?: list<string>|null,
     *   client_secret?: string|null,
     *   logo_uri?: string|null,
     *   policy_uri?: string|null,
     *   redirect_uris?: list<string>|null,
     *   tos_uri?: string|null,
     * }> $data
     * @param PaginationMetaOAuth|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   client_id: string,
     *   client_type: value-of<ClientType>,
     *   created_at: \DateTimeInterface,
     *   name: string,
     *   org_id: string,
     *   record_type: value-of<RecordType>,
     *   require_pkce: bool,
     *   updated_at: \DateTimeInterface,
     *   user_id: string,
     *   allowed_grant_types?: list<value-of<AllowedGrantType>>|null,
     *   allowed_scopes?: list<string>|null,
     *   client_secret?: string|null,
     *   logo_uri?: string|null,
     *   policy_uri?: string|null,
     *   redirect_uris?: list<string>|null,
     *   tos_uri?: string|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaOAuth|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
