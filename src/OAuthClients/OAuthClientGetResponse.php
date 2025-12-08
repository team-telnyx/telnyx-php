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
 * @phpstan-type OAuthClientGetResponseShape = array{data?: OAuthClient|null}
 */
final class OAuthClientGetResponse implements BaseModel
{
    /** @use SdkModel<OAuthClientGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OAuthClient $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OAuthClient|array{
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
     * } $data
     */
    public static function with(OAuthClient|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param OAuthClient|array{
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
     * } $data
     */
    public function withData(OAuthClient|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
