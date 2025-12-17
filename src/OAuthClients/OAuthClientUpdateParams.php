<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType;

/**
 * Update an existing OAuth client.
 *
 * @see Telnyx\Services\OAuthClientsService::update()
 *
 * @phpstan-type OAuthClientUpdateParamsShape = array{
 *   allowedGrantTypes?: list<AllowedGrantType|value-of<AllowedGrantType>>|null,
 *   allowedScopes?: list<string>|null,
 *   logoUri?: string|null,
 *   name?: string|null,
 *   policyUri?: string|null,
 *   redirectUris?: list<string>|null,
 *   requirePkce?: bool|null,
 *   tosUri?: string|null,
 * }
 */
final class OAuthClientUpdateParams implements BaseModel
{
    /** @use SdkModel<OAuthClientUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * URL of the client logo.
     */
    #[Optional('logo_uri')]
    public ?string $logoUri;

    /**
     * The name of the OAuth client.
     */
    #[Optional]
    public ?string $name;

    /**
     * URL of the client's privacy policy.
     */
    #[Optional('policy_uri')]
    public ?string $policyUri;

    /**
     * List of redirect URIs.
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AllowedGrantType|value-of<AllowedGrantType>>|null $allowedGrantTypes
     * @param list<string>|null $allowedScopes
     * @param list<string>|null $redirectUris
     */
    public static function with(
        ?array $allowedGrantTypes = null,
        ?array $allowedScopes = null,
        ?string $logoUri = null,
        ?string $name = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?bool $requirePkce = null,
        ?string $tosUri = null,
    ): self {
        $self = new self;

        null !== $allowedGrantTypes && $self['allowedGrantTypes'] = $allowedGrantTypes;
        null !== $allowedScopes && $self['allowedScopes'] = $allowedScopes;
        null !== $logoUri && $self['logoUri'] = $logoUri;
        null !== $name && $self['name'] = $name;
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
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $self = clone $this;
        $self['logoUri'] = $logoUri;

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
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $self = clone $this;
        $self['policyUri'] = $policyUri;

        return $self;
    }

    /**
     * List of redirect URIs.
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
