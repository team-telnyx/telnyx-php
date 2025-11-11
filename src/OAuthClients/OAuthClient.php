<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClient\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClient\ClientType;
use Telnyx\OAuthClients\OAuthClient\RecordType;

/**
 * @phpstan-type OAuthClientShape = array{
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
 * }
 */
final class OAuthClient implements BaseModel
{
    /** @use SdkModel<OAuthClientShape> */
    use SdkModel;

    /**
     * OAuth client identifier.
     */
    #[Api]
    public string $client_id;

    /**
     * OAuth client type.
     *
     * @var value-of<ClientType> $client_type
     */
    #[Api(enum: ClientType::class)]
    public string $client_type;

    /**
     * Timestamp when the client was created.
     */
    #[Api]
    public \DateTimeInterface $created_at;

    /**
     * Human-readable name for the OAuth client.
     */
    #[Api]
    public string $name;

    /**
     * Organization ID that owns this OAuth client.
     */
    #[Api]
    public string $org_id;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $record_type
     */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    #[Api]
    public bool $require_pkce;

    /**
     * Timestamp when the client was last updated.
     */
    #[Api]
    public \DateTimeInterface $updated_at;

    /**
     * User ID that created this OAuth client.
     */
    #[Api]
    public string $user_id;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>>|null $allowed_grant_types
     */
    #[Api(list: AllowedGrantType::class, optional: true)]
    public ?array $allowed_grant_types;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string>|null $allowed_scopes
     */
    #[Api(list: 'string', optional: true)]
    public ?array $allowed_scopes;

    /**
     * Client secret (only included when available, for confidential clients).
     */
    #[Api(nullable: true, optional: true)]
    public ?string $client_secret;

    /**
     * URL of the client logo.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $logo_uri;

    /**
     * URL of the client's privacy policy.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $policy_uri;

    /**
     * List of allowed redirect URIs.
     *
     * @var list<string>|null $redirect_uris
     */
    #[Api(list: 'string', optional: true)]
    public ?array $redirect_uris;

    /**
     * URL of the client's terms of service.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $tos_uri;

    /**
     * `new OAuthClient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthClient::with(
     *   client_id: ...,
     *   client_type: ...,
     *   created_at: ...,
     *   name: ...,
     *   org_id: ...,
     *   record_type: ...,
     *   require_pkce: ...,
     *   updated_at: ...,
     *   user_id: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthClient)
     *   ->withClientID(...)
     *   ->withClientType(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withOrgID(...)
     *   ->withRecordType(...)
     *   ->withRequirePkce(...)
     *   ->withUpdatedAt(...)
     *   ->withUserID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ClientType|value-of<ClientType> $client_type
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowed_grant_types
     * @param list<string> $allowed_scopes
     * @param list<string> $redirect_uris
     */
    public static function with(
        string $client_id,
        ClientType|string $client_type,
        \DateTimeInterface $created_at,
        string $name,
        string $org_id,
        RecordType|string $record_type,
        bool $require_pkce,
        \DateTimeInterface $updated_at,
        string $user_id,
        ?array $allowed_grant_types = null,
        ?array $allowed_scopes = null,
        ?string $client_secret = null,
        ?string $logo_uri = null,
        ?string $policy_uri = null,
        ?array $redirect_uris = null,
        ?string $tos_uri = null,
    ): self {
        $obj = new self;

        $obj->client_id = $client_id;
        $obj['client_type'] = $client_type;
        $obj->created_at = $created_at;
        $obj->name = $name;
        $obj->org_id = $org_id;
        $obj['record_type'] = $record_type;
        $obj->require_pkce = $require_pkce;
        $obj->updated_at = $updated_at;
        $obj->user_id = $user_id;

        null !== $allowed_grant_types && $obj['allowed_grant_types'] = $allowed_grant_types;
        null !== $allowed_scopes && $obj->allowed_scopes = $allowed_scopes;
        null !== $client_secret && $obj->client_secret = $client_secret;
        null !== $logo_uri && $obj->logo_uri = $logo_uri;
        null !== $policy_uri && $obj->policy_uri = $policy_uri;
        null !== $redirect_uris && $obj->redirect_uris = $redirect_uris;
        null !== $tos_uri && $obj->tos_uri = $tos_uri;

        return $obj;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->client_id = $clientID;

        return $obj;
    }

    /**
     * OAuth client type.
     *
     * @param ClientType|value-of<ClientType> $clientType
     */
    public function withClientType(ClientType|string $clientType): self
    {
        $obj = clone $this;
        $obj['client_type'] = $clientType;

        return $obj;
    }

    /**
     * Timestamp when the client was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Human-readable name for the OAuth client.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Organization ID that owns this OAuth client.
     */
    public function withOrgID(string $orgID): self
    {
        $obj = clone $this;
        $obj->org_id = $orgID;

        return $obj;
    }

    /**
     * Record type identifier.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    public function withRequirePkce(bool $requirePkce): self
    {
        $obj = clone $this;
        $obj->require_pkce = $requirePkce;

        return $obj;
    }

    /**
     * Timestamp when the client was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * User ID that created this OAuth client.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }

    /**
     * List of allowed OAuth grant types.
     *
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes
     */
    public function withAllowedGrantTypes(array $allowedGrantTypes): self
    {
        $obj = clone $this;
        $obj['allowed_grant_types'] = $allowedGrantTypes;

        return $obj;
    }

    /**
     * List of allowed OAuth scopes.
     *
     * @param list<string> $allowedScopes
     */
    public function withAllowedScopes(array $allowedScopes): self
    {
        $obj = clone $this;
        $obj->allowed_scopes = $allowedScopes;

        return $obj;
    }

    /**
     * Client secret (only included when available, for confidential clients).
     */
    public function withClientSecret(?string $clientSecret): self
    {
        $obj = clone $this;
        $obj->client_secret = $clientSecret;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $obj = clone $this;
        $obj->logo_uri = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(?string $policyUri): self
    {
        $obj = clone $this;
        $obj->policy_uri = $policyUri;

        return $obj;
    }

    /**
     * List of allowed redirect URIs.
     *
     * @param list<string> $redirectUris
     */
    public function withRedirectUris(array $redirectUris): self
    {
        $obj = clone $this;
        $obj->redirect_uris = $redirectUris;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $obj = clone $this;
        $obj->tos_uri = $tosUri;

        return $obj;
    }
}
