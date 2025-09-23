<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients\OAuthClientListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientListResponse\Data\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientListResponse\Data\ClientType;
use Telnyx\OAuthClients\OAuthClientListResponse\Data\RecordType;

/**
 * @phpstan-type data_alias = array{
 *   clientID: string,
 *   clientType: value-of<ClientType>,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   orgID: string,
 *   recordType: value-of<RecordType>,
 *   requirePkce: bool,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   allowedGrantTypes?: list<value-of<AllowedGrantType>>,
 *   allowedScopes?: list<string>,
 *   clientSecret?: string|null,
 *   logoUri?: string|null,
 *   policyUri?: string|null,
 *   redirectUris?: list<string>,
 *   tosUri?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * OAuth client identifier.
     */
    #[Api('client_id')]
    public string $clientID;

    /**
     * OAuth client type.
     *
     * @var value-of<ClientType> $clientType
     */
    #[Api('client_type', enum: ClientType::class)]
    public string $clientType;

    /**
     * Timestamp when the client was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Human-readable name for the OAuth client.
     */
    #[Api]
    public string $name;

    /**
     * Organization ID that owns this OAuth client.
     */
    #[Api('org_id')]
    public string $orgID;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    #[Api('require_pkce')]
    public bool $requirePkce;

    /**
     * Timestamp when the client was last updated.
     */
    #[Api('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * User ID that created this OAuth client.
     */
    #[Api('user_id')]
    public string $userID;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>>|null $allowedGrantTypes
     */
    #[Api('allowed_grant_types', list: AllowedGrantType::class, optional: true)]
    public ?array $allowedGrantTypes;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string>|null $allowedScopes
     */
    #[Api('allowed_scopes', list: 'string', optional: true)]
    public ?array $allowedScopes;

    /**
     * Client secret (only included when available, for confidential clients).
     */
    #[Api('client_secret', nullable: true, optional: true)]
    public ?string $clientSecret;

    /**
     * URL of the client logo.
     */
    #[Api('logo_uri', nullable: true, optional: true)]
    public ?string $logoUri;

    /**
     * URL of the client's privacy policy.
     */
    #[Api('policy_uri', nullable: true, optional: true)]
    public ?string $policyUri;

    /**
     * List of allowed redirect URIs.
     *
     * @var list<string>|null $redirectUris
     */
    #[Api('redirect_uris', list: 'string', optional: true)]
    public ?array $redirectUris;

    /**
     * URL of the client's terms of service.
     */
    #[Api('tos_uri', nullable: true, optional: true)]
    public ?string $tosUri;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   clientID: ...,
     *   clientType: ...,
     *   createdAt: ...,
     *   name: ...,
     *   orgID: ...,
     *   recordType: ...,
     *   requirePkce: ...,
     *   updatedAt: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
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
     * @param ClientType|value-of<ClientType> $clientType
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes
     * @param list<string> $allowedScopes
     * @param list<string> $redirectUris
     */
    public static function with(
        string $clientID,
        ClientType|string $clientType,
        \DateTimeInterface $createdAt,
        string $name,
        string $orgID,
        RecordType|string $recordType,
        bool $requirePkce,
        \DateTimeInterface $updatedAt,
        string $userID,
        ?array $allowedGrantTypes = null,
        ?array $allowedScopes = null,
        ?string $clientSecret = null,
        ?string $logoUri = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?string $tosUri = null,
    ): self {
        $obj = new self;

        $obj->clientID = $clientID;
        $obj->clientType = $clientType instanceof ClientType ? $clientType->value : $clientType;
        $obj->createdAt = $createdAt;
        $obj->name = $name;
        $obj->orgID = $orgID;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        $obj->requirePkce = $requirePkce;
        $obj->updatedAt = $updatedAt;
        $obj->userID = $userID;

        null !== $allowedGrantTypes && $obj->allowedGrantTypes = array_map(fn ($v) => $v instanceof AllowedGrantType ? $v->value : $v, $allowedGrantTypes);
        null !== $allowedScopes && $obj->allowedScopes = $allowedScopes;
        null !== $clientSecret && $obj->clientSecret = $clientSecret;
        null !== $logoUri && $obj->logoUri = $logoUri;
        null !== $policyUri && $obj->policyUri = $policyUri;
        null !== $redirectUris && $obj->redirectUris = $redirectUris;
        null !== $tosUri && $obj->tosUri = $tosUri;

        return $obj;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

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
        $obj->clientType = $clientType instanceof ClientType ? $clientType->value : $clientType;

        return $obj;
    }

    /**
     * Timestamp when the client was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->orgID = $orgID;

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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    public function withRequirePkce(bool $requirePkce): self
    {
        $obj = clone $this;
        $obj->requirePkce = $requirePkce;

        return $obj;
    }

    /**
     * Timestamp when the client was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * User ID that created this OAuth client.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

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
        $obj->allowedGrantTypes = array_map(fn ($v) => $v instanceof AllowedGrantType ? $v->value : $v, $allowedGrantTypes);

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
        $obj->allowedScopes = $allowedScopes;

        return $obj;
    }

    /**
     * Client secret (only included when available, for confidential clients).
     */
    public function withClientSecret(?string $clientSecret): self
    {
        $obj = clone $this;
        $obj->clientSecret = $clientSecret;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $obj = clone $this;
        $obj->logoUri = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(?string $policyUri): self
    {
        $obj = clone $this;
        $obj->policyUri = $policyUri;

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
        $obj->redirectUris = $redirectUris;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $obj = clone $this;
        $obj->tosUri = $tosUri;

        return $obj;
    }
}
