<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientCreateParams\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientCreateParams\ClientType;

/**
 * Create a new OAuth client.
 *
 * @see Telnyx\Services\OAuthClientsService::create()
 *
 * @phpstan-type OAuthClientCreateParamsShape = array{
 *   allowedGrantTypes: list<AllowedGrantType|value-of<AllowedGrantType>>,
 *   allowedScopes: list<string>,
 *   clientType: ClientType|value-of<ClientType>,
 *   name: string,
 *   logoUri?: string,
 *   policyUri?: string,
 *   redirectUris?: list<string>,
 *   requirePkce?: bool,
 *   tosUri?: string,
 * }
 */
final class OAuthClientCreateParams implements BaseModel
{
    /** @use SdkModel<OAuthClientCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>> $allowedGrantTypes
     */
    #[Required('allowed_grant_types', list: AllowedGrantType::class)]
    public array $allowedGrantTypes;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string> $allowedScopes
     */
    #[Required('allowed_scopes', list: 'string')]
    public array $allowedScopes;

    /**
     * OAuth client type.
     *
     * @var value-of<ClientType> $clientType
     */
    #[Required('client_type', enum: ClientType::class)]
    public string $clientType;

    /**
     * The name of the OAuth client.
     */
    #[Required]
    public string $name;

    /**
     * URL of the client logo.
     */
    #[Optional('logo_uri')]
    public ?string $logoUri;

    /**
     * URL of the client's privacy policy.
     */
    #[Optional('policy_uri')]
    public ?string $policyUri;

    /**
     * List of redirect URIs (required for authorization_code flow).
     *
     * @var list<string>|null $redirectUris
     */
    #[Optional('redirect_uris', list: 'string')]
    public ?array $redirectUris;

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    #[Optional('require_pkce')]
    public ?bool $requirePkce;

    /**
     * URL of the client's terms of service.
     */
    #[Optional('tos_uri')]
    public ?string $tosUri;

    /**
     * `new OAuthClientCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthClientCreateParams::with(
     *   allowedGrantTypes: ..., allowedScopes: ..., clientType: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthClientCreateParams)
     *   ->withAllowedGrantTypes(...)
     *   ->withAllowedScopes(...)
     *   ->withClientType(...)
     *   ->withName(...)
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
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes
     * @param list<string> $allowedScopes
     * @param ClientType|value-of<ClientType> $clientType
     * @param list<string> $redirectUris
     */
    public static function with(
        array $allowedGrantTypes,
        array $allowedScopes,
        ClientType|string $clientType,
        string $name,
        ?string $logoUri = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?bool $requirePkce = null,
        ?string $tosUri = null,
    ): self {
        $self = new self;

        $self['allowedGrantTypes'] = $allowedGrantTypes;
        $self['allowedScopes'] = $allowedScopes;
        $self['clientType'] = $clientType;
        $self['name'] = $name;

        null !== $logoUri && $self['logoUri'] = $logoUri;
        null !== $policyUri && $self['policyUri'] = $policyUri;
        null !== $redirectUris && $self['redirectUris'] = $redirectUris;
        null !== $requirePkce && $self['requirePkce'] = $requirePkce;
        null !== $tosUri && $self['tosUri'] = $tosUri;

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
     * The name of the OAuth client.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $self = clone $this;
        $self['logoUri'] = $logoUri;

        return $self;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $self = clone $this;
        $self['policyUri'] = $policyUri;

        return $self;
    }

    /**
     * List of redirect URIs (required for authorization_code flow).
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
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    public function withRequirePkce(bool $requirePkce): self
    {
        $self = clone $this;
        $self['requirePkce'] = $requirePkce;

        return $self;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(string $tosUri): self
    {
        $self = clone $this;
        $self['tosUri'] = $tosUri;

        return $self;
    }
}
