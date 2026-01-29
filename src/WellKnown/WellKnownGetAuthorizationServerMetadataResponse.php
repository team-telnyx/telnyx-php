<?php

declare(strict_types=1);

namespace Telnyx\WellKnown;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WellKnownGetAuthorizationServerMetadataResponseShape = array{
 *   authorizationEndpoint?: string|null,
 *   codeChallengeMethodsSupported?: list<string>|null,
 *   grantTypesSupported?: list<string>|null,
 *   introspectionEndpoint?: string|null,
 *   issuer?: string|null,
 *   jwksUri?: string|null,
 *   registrationEndpoint?: string|null,
 *   responseTypesSupported?: list<string>|null,
 *   scopesSupported?: list<string>|null,
 *   tokenEndpoint?: string|null,
 *   tokenEndpointAuthMethodsSupported?: list<string>|null,
 * }
 */
final class WellKnownGetAuthorizationServerMetadataResponse implements BaseModel
{
    /** @use SdkModel<WellKnownGetAuthorizationServerMetadataResponseShape> */
    use SdkModel;

    /**
     * Authorization endpoint URL.
     */
    #[Optional('authorization_endpoint')]
    public ?string $authorizationEndpoint;

    /**
     * Supported PKCE code challenge methods.
     *
     * @var list<string>|null $codeChallengeMethodsSupported
     */
    #[Optional('code_challenge_methods_supported', list: 'string')]
    public ?array $codeChallengeMethodsSupported;

    /**
     * Supported grant types.
     *
     * @var list<string>|null $grantTypesSupported
     */
    #[Optional('grant_types_supported', list: 'string')]
    public ?array $grantTypesSupported;

    /**
     * Token introspection endpoint URL.
     */
    #[Optional('introspection_endpoint')]
    public ?string $introspectionEndpoint;

    /**
     * Authorization server issuer URL.
     */
    #[Optional]
    public ?string $issuer;

    /**
     * JWK Set endpoint URL.
     */
    #[Optional('jwks_uri')]
    public ?string $jwksUri;

    /**
     * Dynamic client registration endpoint URL.
     */
    #[Optional('registration_endpoint')]
    public ?string $registrationEndpoint;

    /**
     * Supported response types.
     *
     * @var list<string>|null $responseTypesSupported
     */
    #[Optional('response_types_supported', list: 'string')]
    public ?array $responseTypesSupported;

    /**
     * Supported OAuth scopes.
     *
     * @var list<string>|null $scopesSupported
     */
    #[Optional('scopes_supported', list: 'string')]
    public ?array $scopesSupported;

    /**
     * Token endpoint URL.
     */
    #[Optional('token_endpoint')]
    public ?string $tokenEndpoint;

    /**
     * Supported token endpoint authentication methods.
     *
     * @var list<string>|null $tokenEndpointAuthMethodsSupported
     */
    #[Optional('token_endpoint_auth_methods_supported', list: 'string')]
    public ?array $tokenEndpointAuthMethodsSupported;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $codeChallengeMethodsSupported
     * @param list<string>|null $grantTypesSupported
     * @param list<string>|null $responseTypesSupported
     * @param list<string>|null $scopesSupported
     * @param list<string>|null $tokenEndpointAuthMethodsSupported
     */
    public static function with(
        ?string $authorizationEndpoint = null,
        ?array $codeChallengeMethodsSupported = null,
        ?array $grantTypesSupported = null,
        ?string $introspectionEndpoint = null,
        ?string $issuer = null,
        ?string $jwksUri = null,
        ?string $registrationEndpoint = null,
        ?array $responseTypesSupported = null,
        ?array $scopesSupported = null,
        ?string $tokenEndpoint = null,
        ?array $tokenEndpointAuthMethodsSupported = null,
    ): self {
        $self = new self;

        null !== $authorizationEndpoint && $self['authorizationEndpoint'] = $authorizationEndpoint;
        null !== $codeChallengeMethodsSupported && $self['codeChallengeMethodsSupported'] = $codeChallengeMethodsSupported;
        null !== $grantTypesSupported && $self['grantTypesSupported'] = $grantTypesSupported;
        null !== $introspectionEndpoint && $self['introspectionEndpoint'] = $introspectionEndpoint;
        null !== $issuer && $self['issuer'] = $issuer;
        null !== $jwksUri && $self['jwksUri'] = $jwksUri;
        null !== $registrationEndpoint && $self['registrationEndpoint'] = $registrationEndpoint;
        null !== $responseTypesSupported && $self['responseTypesSupported'] = $responseTypesSupported;
        null !== $scopesSupported && $self['scopesSupported'] = $scopesSupported;
        null !== $tokenEndpoint && $self['tokenEndpoint'] = $tokenEndpoint;
        null !== $tokenEndpointAuthMethodsSupported && $self['tokenEndpointAuthMethodsSupported'] = $tokenEndpointAuthMethodsSupported;

        return $self;
    }

    /**
     * Authorization endpoint URL.
     */
    public function withAuthorizationEndpoint(
        string $authorizationEndpoint
    ): self {
        $self = clone $this;
        $self['authorizationEndpoint'] = $authorizationEndpoint;

        return $self;
    }

    /**
     * Supported PKCE code challenge methods.
     *
     * @param list<string> $codeChallengeMethodsSupported
     */
    public function withCodeChallengeMethodsSupported(
        array $codeChallengeMethodsSupported
    ): self {
        $self = clone $this;
        $self['codeChallengeMethodsSupported'] = $codeChallengeMethodsSupported;

        return $self;
    }

    /**
     * Supported grant types.
     *
     * @param list<string> $grantTypesSupported
     */
    public function withGrantTypesSupported(array $grantTypesSupported): self
    {
        $self = clone $this;
        $self['grantTypesSupported'] = $grantTypesSupported;

        return $self;
    }

    /**
     * Token introspection endpoint URL.
     */
    public function withIntrospectionEndpoint(
        string $introspectionEndpoint
    ): self {
        $self = clone $this;
        $self['introspectionEndpoint'] = $introspectionEndpoint;

        return $self;
    }

    /**
     * Authorization server issuer URL.
     */
    public function withIssuer(string $issuer): self
    {
        $self = clone $this;
        $self['issuer'] = $issuer;

        return $self;
    }

    /**
     * JWK Set endpoint URL.
     */
    public function withJwksUri(string $jwksUri): self
    {
        $self = clone $this;
        $self['jwksUri'] = $jwksUri;

        return $self;
    }

    /**
     * Dynamic client registration endpoint URL.
     */
    public function withRegistrationEndpoint(string $registrationEndpoint): self
    {
        $self = clone $this;
        $self['registrationEndpoint'] = $registrationEndpoint;

        return $self;
    }

    /**
     * Supported response types.
     *
     * @param list<string> $responseTypesSupported
     */
    public function withResponseTypesSupported(
        array $responseTypesSupported
    ): self {
        $self = clone $this;
        $self['responseTypesSupported'] = $responseTypesSupported;

        return $self;
    }

    /**
     * Supported OAuth scopes.
     *
     * @param list<string> $scopesSupported
     */
    public function withScopesSupported(array $scopesSupported): self
    {
        $self = clone $this;
        $self['scopesSupported'] = $scopesSupported;

        return $self;
    }

    /**
     * Token endpoint URL.
     */
    public function withTokenEndpoint(string $tokenEndpoint): self
    {
        $self = clone $this;
        $self['tokenEndpoint'] = $tokenEndpoint;

        return $self;
    }

    /**
     * Supported token endpoint authentication methods.
     *
     * @param list<string> $tokenEndpointAuthMethodsSupported
     */
    public function withTokenEndpointAuthMethodsSupported(
        array $tokenEndpointAuthMethodsSupported
    ): self {
        $self = clone $this;
        $self['tokenEndpointAuthMethodsSupported'] = $tokenEndpointAuthMethodsSupported;

        return $self;
    }
}
