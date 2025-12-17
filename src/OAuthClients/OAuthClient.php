<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClient\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClient\ClientType;
use Telnyx\OAuthClients\OAuthClient\RecordType;

/**
 * @phpstan-type OAuthClientShape = array{
 *   clientID: string,
 *   clientType: ClientType|value-of<ClientType>,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   orgID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   requirePkce: bool,
 *   updatedAt: \DateTimeInterface,
 *   userID: string,
 *   allowedGrantTypes?: list<AllowedGrantType|value-of<AllowedGrantType>>|null,
 *   allowedScopes?: list<string>|null,
 *   clientSecret?: string|null,
 *   logoUri?: string|null,
 *   policyUri?: string|null,
 *   redirectUris?: list<string>|null,
 *   tosUri?: string|null,
 * }
 */
final class OAuthClient implements BaseModel
{
    /** @use SdkModel<OAuthClientShape> */
    use SdkModel;

    /**
     * OAuth client identifier.
     */
    #[Required('client_id')]
    public string $clientID;

    /**
     * OAuth client type.
     *
     * @var value-of<ClientType> $clientType
     */
    #[Required('client_type', enum: ClientType::class)]
    public string $clientType;

    /**
     * Timestamp when the client was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Human-readable name for the OAuth client.
     */
    #[Required]
    public string $name;

    /**
     * Organization ID that owns this OAuth client.
     */
    #[Required('org_id')]
    public string $orgID;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    #[Required('require_pkce')]
    public bool $requirePkce;

    /**
     * Timestamp when the client was last updated.
     */
    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * User ID that created this OAuth client.
     */
    #[Required('user_id')]
    public string $userID;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>>|null $allowedGrantTypes
     */
    #[Optional('allowed_grant_types', list: AllowedGrantType::class)]
    public ?array $allowedGrantTypes;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string>|null $allowedScopes
     */
    #[Optional('allowed_scopes', list: 'string')]
    public ?array $allowedScopes;

    /**
     * Client secret (only included when available, for confidential clients).
     */
    #[Optional('client_secret', nullable: true)]
    public ?string $clientSecret;

    /**
     * URL of the client logo.
     */
    #[Optional('logo_uri', nullable: true)]
    public ?string $logoUri;

    /**
     * URL of the client's privacy policy.
     */
    #[Optional('policy_uri', nullable: true)]
    public ?string $policyUri;

    /**
     * List of allowed redirect URIs.
     *
     * @var list<string>|null $redirectUris
     */
    #[Optional('redirect_uris', list: 'string')]
    public ?array $redirectUris;

    /**
     * URL of the client's terms of service.
     */
    #[Optional('tos_uri', nullable: true)]
    public ?string $tosUri;

    /**
     * `new OAuthClient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthClient::with(
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
     * @param ClientType|value-of<ClientType> $clientType
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<AllowedGrantType|value-of<AllowedGrantType>>|null $allowedGrantTypes
     * @param list<string>|null $allowedScopes
     * @param list<string>|null $redirectUris
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
        $self = new self;

        $self['clientID'] = $clientID;
        $self['clientType'] = $clientType;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['orgID'] = $orgID;
        $self['recordType'] = $recordType;
        $self['requirePkce'] = $requirePkce;
        $self['updatedAt'] = $updatedAt;
        $self['userID'] = $userID;

        null !== $allowedGrantTypes && $self['allowedGrantTypes'] = $allowedGrantTypes;
        null !== $allowedScopes && $self['allowedScopes'] = $allowedScopes;
        null !== $clientSecret && $self['clientSecret'] = $clientSecret;
        null !== $logoUri && $self['logoUri'] = $logoUri;
        null !== $policyUri && $self['policyUri'] = $policyUri;
        null !== $redirectUris && $self['redirectUris'] = $redirectUris;
        null !== $tosUri && $self['tosUri'] = $tosUri;

        return $self;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * OAuth client type.
     *
     * @param ClientType|value-of<ClientType> $clientType
     */
    public function withClientType(ClientType|string $clientType): self
    {
        $self = clone $this;
        $self['clientType'] = $clientType;

        return $self;
    }

    /**
     * Timestamp when the client was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Human-readable name for the OAuth client.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Organization ID that owns this OAuth client.
     */
    public function withOrgID(string $orgID): self
    {
        $self = clone $this;
        $self['orgID'] = $orgID;

        return $self;
    }

    /**
     * Record type identifier.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    public function withRequirePkce(bool $requirePkce): self
    {
        $self = clone $this;
        $self['requirePkce'] = $requirePkce;

        return $self;
    }

    /**
     * Timestamp when the client was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * User ID that created this OAuth client.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * List of allowed OAuth grant types.
     *
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes
     */
    public function withAllowedGrantTypes(array $allowedGrantTypes): self
    {
        $self = clone $this;
        $self['allowedGrantTypes'] = $allowedGrantTypes;

        return $self;
    }

    /**
     * List of allowed OAuth scopes.
     *
     * @param list<string> $allowedScopes
     */
    public function withAllowedScopes(array $allowedScopes): self
    {
        $self = clone $this;
        $self['allowedScopes'] = $allowedScopes;

        return $self;
    }

    /**
     * Client secret (only included when available, for confidential clients).
     */
    public function withClientSecret(?string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

        return $self;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $self = clone $this;
        $self['logoUri'] = $logoUri;

        return $self;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(?string $policyUri): self
    {
        $self = clone $this;
        $self['policyUri'] = $policyUri;

        return $self;
    }

    /**
     * List of allowed redirect URIs.
     *
     * @param list<string> $redirectUris
     */
    public function withRedirectUris(array $redirectUris): self
    {
        $self = clone $this;
        $self['redirectUris'] = $redirectUris;

        return $self;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $self = clone $this;
        $self['tosUri'] = $tosUri;

        return $self;
    }
}
