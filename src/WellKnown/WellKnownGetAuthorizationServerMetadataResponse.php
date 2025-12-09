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
     * @param list<string> $codeChallengeMethodsSupported
     * @param list<string> $grantTypesSupported
     * @param list<string> $responseTypesSupported
     * @param list<string> $scopesSupported
     * @param list<string> $tokenEndpointAuthMethodsSupported
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
        $obj = new self;

        null !== $authorizationEndpoint && $obj['authorizationEndpoint'] = $authorizationEndpoint;
        null !== $codeChallengeMethodsSupported && $obj['codeChallengeMethodsSupported'] = $codeChallengeMethodsSupported;
        null !== $grantTypesSupported && $obj['grantTypesSupported'] = $grantTypesSupported;
        null !== $introspectionEndpoint && $obj['introspectionEndpoint'] = $introspectionEndpoint;
        null !== $issuer && $obj['issuer'] = $issuer;
        null !== $jwksUri && $obj['jwksUri'] = $jwksUri;
        null !== $registrationEndpoint && $obj['registrationEndpoint'] = $registrationEndpoint;
        null !== $responseTypesSupported && $obj['responseTypesSupported'] = $responseTypesSupported;
        null !== $scopesSupported && $obj['scopesSupported'] = $scopesSupported;
        null !== $tokenEndpoint && $obj['tokenEndpoint'] = $tokenEndpoint;
        null !== $tokenEndpointAuthMethodsSupported && $obj['tokenEndpointAuthMethodsSupported'] = $tokenEndpointAuthMethodsSupported;

        return $obj;
    }

    /**
     * Authorization endpoint URL.
     */
    public function withAuthorizationEndpoint(
        string $authorizationEndpoint
    ): self {
        $obj = clone $this;
        $obj['authorizationEndpoint'] = $authorizationEndpoint;

        return $obj;
    }

    /**
     * Supported PKCE code challenge methods.
     *
     * @param list<string> $codeChallengeMethodsSupported
     */
    public function withCodeChallengeMethodsSupported(
        array $codeChallengeMethodsSupported
    ): self {
        $obj = clone $this;
        $obj['codeChallengeMethodsSupported'] = $codeChallengeMethodsSupported;

        return $obj;
    }

    /**
     * Supported grant types.
     *
     * @param list<string> $grantTypesSupported
     */
    public function withGrantTypesSupported(array $grantTypesSupported): self
    {
        $obj = clone $this;
        $obj['grantTypesSupported'] = $grantTypesSupported;

        return $obj;
    }

    /**
     * Token introspection endpoint URL.
     */
    public function withIntrospectionEndpoint(
        string $introspectionEndpoint
    ): self {
        $obj = clone $this;
        $obj['introspectionEndpoint'] = $introspectionEndpoint;

        return $obj;
    }

    /**
     * Authorization server issuer URL.
     */
    public function withIssuer(string $issuer): self
    {
        $obj = clone $this;
        $obj['issuer'] = $issuer;

        return $obj;
    }

    /**
     * JWK Set endpoint URL.
     */
    public function withJwksUri(string $jwksUri): self
    {
        $obj = clone $this;
        $obj['jwksUri'] = $jwksUri;

        return $obj;
    }

    /**
     * Dynamic client registration endpoint URL.
     */
    public function withRegistrationEndpoint(string $registrationEndpoint): self
    {
        $obj = clone $this;
        $obj['registrationEndpoint'] = $registrationEndpoint;

        return $obj;
    }

    /**
     * Supported response types.
     *
     * @param list<string> $responseTypesSupported
     */
    public function withResponseTypesSupported(
        array $responseTypesSupported
    ): self {
        $obj = clone $this;
        $obj['responseTypesSupported'] = $responseTypesSupported;

        return $obj;
    }

    /**
     * Supported OAuth scopes.
     *
     * @param list<string> $scopesSupported
     */
    public function withScopesSupported(array $scopesSupported): self
    {
        $obj = clone $this;
        $obj['scopesSupported'] = $scopesSupported;

        return $obj;
    }

    /**
     * Token endpoint URL.
     */
    public function withTokenEndpoint(string $tokenEndpoint): self
    {
        $obj = clone $this;
        $obj['tokenEndpoint'] = $tokenEndpoint;

        return $obj;
    }

    /**
     * Supported token endpoint authentication methods.
     *
     * @param list<string> $tokenEndpointAuthMethodsSupported
     */
    public function withTokenEndpointAuthMethodsSupported(
        array $tokenEndpointAuthMethodsSupported
    ): self {
        $obj = clone $this;
        $obj['tokenEndpointAuthMethodsSupported'] = $tokenEndpointAuthMethodsSupported;

        return $obj;
    }
}
