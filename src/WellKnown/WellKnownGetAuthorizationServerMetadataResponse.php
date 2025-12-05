<?php

declare(strict_types=1);

namespace Telnyx\WellKnown;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type WellKnownGetAuthorizationServerMetadataResponseShape = array{
 *   authorization_endpoint?: string|null,
 *   code_challenge_methods_supported?: list<string>|null,
 *   grant_types_supported?: list<string>|null,
 *   introspection_endpoint?: string|null,
 *   issuer?: string|null,
 *   jwks_uri?: string|null,
 *   registration_endpoint?: string|null,
 *   response_types_supported?: list<string>|null,
 *   scopes_supported?: list<string>|null,
 *   token_endpoint?: string|null,
 *   token_endpoint_auth_methods_supported?: list<string>|null,
 * }
 */
final class WellKnownGetAuthorizationServerMetadataResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WellKnownGetAuthorizationServerMetadataResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Authorization endpoint URL.
     */
    #[Api(optional: true)]
    public ?string $authorization_endpoint;

    /**
     * Supported PKCE code challenge methods.
     *
     * @var list<string>|null $code_challenge_methods_supported
     */
    #[Api(list: 'string', optional: true)]
    public ?array $code_challenge_methods_supported;

    /**
     * Supported grant types.
     *
     * @var list<string>|null $grant_types_supported
     */
    #[Api(list: 'string', optional: true)]
    public ?array $grant_types_supported;

    /**
     * Token introspection endpoint URL.
     */
    #[Api(optional: true)]
    public ?string $introspection_endpoint;

    /**
     * Authorization server issuer URL.
     */
    #[Api(optional: true)]
    public ?string $issuer;

    /**
     * JWK Set endpoint URL.
     */
    #[Api(optional: true)]
    public ?string $jwks_uri;

    /**
     * Dynamic client registration endpoint URL.
     */
    #[Api(optional: true)]
    public ?string $registration_endpoint;

    /**
     * Supported response types.
     *
     * @var list<string>|null $response_types_supported
     */
    #[Api(list: 'string', optional: true)]
    public ?array $response_types_supported;

    /**
     * Supported OAuth scopes.
     *
     * @var list<string>|null $scopes_supported
     */
    #[Api(list: 'string', optional: true)]
    public ?array $scopes_supported;

    /**
     * Token endpoint URL.
     */
    #[Api(optional: true)]
    public ?string $token_endpoint;

    /**
     * Supported token endpoint authentication methods.
     *
     * @var list<string>|null $token_endpoint_auth_methods_supported
     */
    #[Api(list: 'string', optional: true)]
    public ?array $token_endpoint_auth_methods_supported;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $code_challenge_methods_supported
     * @param list<string> $grant_types_supported
     * @param list<string> $response_types_supported
     * @param list<string> $scopes_supported
     * @param list<string> $token_endpoint_auth_methods_supported
     */
    public static function with(
        ?string $authorization_endpoint = null,
        ?array $code_challenge_methods_supported = null,
        ?array $grant_types_supported = null,
        ?string $introspection_endpoint = null,
        ?string $issuer = null,
        ?string $jwks_uri = null,
        ?string $registration_endpoint = null,
        ?array $response_types_supported = null,
        ?array $scopes_supported = null,
        ?string $token_endpoint = null,
        ?array $token_endpoint_auth_methods_supported = null,
    ): self {
        $obj = new self;

        null !== $authorization_endpoint && $obj['authorization_endpoint'] = $authorization_endpoint;
        null !== $code_challenge_methods_supported && $obj['code_challenge_methods_supported'] = $code_challenge_methods_supported;
        null !== $grant_types_supported && $obj['grant_types_supported'] = $grant_types_supported;
        null !== $introspection_endpoint && $obj['introspection_endpoint'] = $introspection_endpoint;
        null !== $issuer && $obj['issuer'] = $issuer;
        null !== $jwks_uri && $obj['jwks_uri'] = $jwks_uri;
        null !== $registration_endpoint && $obj['registration_endpoint'] = $registration_endpoint;
        null !== $response_types_supported && $obj['response_types_supported'] = $response_types_supported;
        null !== $scopes_supported && $obj['scopes_supported'] = $scopes_supported;
        null !== $token_endpoint && $obj['token_endpoint'] = $token_endpoint;
        null !== $token_endpoint_auth_methods_supported && $obj['token_endpoint_auth_methods_supported'] = $token_endpoint_auth_methods_supported;

        return $obj;
    }

    /**
     * Authorization endpoint URL.
     */
    public function withAuthorizationEndpoint(
        string $authorizationEndpoint
    ): self {
        $obj = clone $this;
        $obj['authorization_endpoint'] = $authorizationEndpoint;

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
        $obj['code_challenge_methods_supported'] = $codeChallengeMethodsSupported;

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
        $obj['grant_types_supported'] = $grantTypesSupported;

        return $obj;
    }

    /**
     * Token introspection endpoint URL.
     */
    public function withIntrospectionEndpoint(
        string $introspectionEndpoint
    ): self {
        $obj = clone $this;
        $obj['introspection_endpoint'] = $introspectionEndpoint;

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
        $obj['jwks_uri'] = $jwksUri;

        return $obj;
    }

    /**
     * Dynamic client registration endpoint URL.
     */
    public function withRegistrationEndpoint(string $registrationEndpoint): self
    {
        $obj = clone $this;
        $obj['registration_endpoint'] = $registrationEndpoint;

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
        $obj['response_types_supported'] = $responseTypesSupported;

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
        $obj['scopes_supported'] = $scopesSupported;

        return $obj;
    }

    /**
     * Token endpoint URL.
     */
    public function withTokenEndpoint(string $tokenEndpoint): self
    {
        $obj = clone $this;
        $obj['token_endpoint'] = $tokenEndpoint;

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
        $obj['token_endpoint_auth_methods_supported'] = $tokenEndpointAuthMethodsSupported;

        return $obj;
    }
}
