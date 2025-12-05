<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthRegisterParams\GrantType;
use Telnyx\OAuth\OAuthRegisterParams\TokenEndpointAuthMethod;

/**
 * Register a new OAuth client dynamically (RFC 7591).
 *
 * @see Telnyx\Services\OAuthService::register()
 *
 * @phpstan-type OAuthRegisterParamsShape = array{
 *   client_name?: string,
 *   grant_types?: list<GrantType|value-of<GrantType>>,
 *   logo_uri?: string,
 *   policy_uri?: string,
 *   redirect_uris?: list<string>,
 *   response_types?: list<string>,
 *   scope?: string,
 *   token_endpoint_auth_method?: TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod>,
 *   tos_uri?: string,
 * }
 */
final class OAuthRegisterParams implements BaseModel
{
    /** @use SdkModel<OAuthRegisterParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Human-readable string name of the client to be presented to the end-user.
     */
    #[Api(optional: true)]
    public ?string $client_name;

    /**
     * Array of OAuth 2.0 grant type strings that the client may use.
     *
     * @var list<value-of<GrantType>>|null $grant_types
     */
    #[Api(list: GrantType::class, optional: true)]
    public ?array $grant_types;

    /**
     * URL of the client logo.
     */
    #[Api(optional: true)]
    public ?string $logo_uri;

    /**
     * URL of the client's privacy policy.
     */
    #[Api(optional: true)]
    public ?string $policy_uri;

    /**
     * Array of redirection URI strings for use in redirect-based flows.
     *
     * @var list<string>|null $redirect_uris
     */
    #[Api(list: 'string', optional: true)]
    public ?array $redirect_uris;

    /**
     * Array of the OAuth 2.0 response type strings that the client may use.
     *
     * @var list<string>|null $response_types
     */
    #[Api(list: 'string', optional: true)]
    public ?array $response_types;

    /**
     * Space-separated string of scope values that the client may use.
     */
    #[Api(optional: true)]
    public ?string $scope;

    /**
     * Authentication method for the token endpoint.
     *
     * @var value-of<TokenEndpointAuthMethod>|null $token_endpoint_auth_method
     */
    #[Api(enum: TokenEndpointAuthMethod::class, optional: true)]
    public ?string $token_endpoint_auth_method;

    /**
     * URL of the client's terms of service.
     */
    #[Api(optional: true)]
    public ?string $tos_uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<GrantType|value-of<GrantType>> $grant_types
     * @param list<string> $redirect_uris
     * @param list<string> $response_types
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $token_endpoint_auth_method
     */
    public static function with(
        ?string $client_name = null,
        ?array $grant_types = null,
        ?string $logo_uri = null,
        ?string $policy_uri = null,
        ?array $redirect_uris = null,
        ?array $response_types = null,
        ?string $scope = null,
        TokenEndpointAuthMethod|string|null $token_endpoint_auth_method = null,
        ?string $tos_uri = null,
    ): self {
        $obj = new self;

        null !== $client_name && $obj['client_name'] = $client_name;
        null !== $grant_types && $obj['grant_types'] = $grant_types;
        null !== $logo_uri && $obj['logo_uri'] = $logo_uri;
        null !== $policy_uri && $obj['policy_uri'] = $policy_uri;
        null !== $redirect_uris && $obj['redirect_uris'] = $redirect_uris;
        null !== $response_types && $obj['response_types'] = $response_types;
        null !== $scope && $obj['scope'] = $scope;
        null !== $token_endpoint_auth_method && $obj['token_endpoint_auth_method'] = $token_endpoint_auth_method;
        null !== $tos_uri && $obj['tos_uri'] = $tos_uri;

        return $obj;
    }

    /**
     * Human-readable string name of the client to be presented to the end-user.
     */
    public function withClientName(string $clientName): self
    {
        $obj = clone $this;
        $obj['client_name'] = $clientName;

        return $obj;
    }

    /**
     * Array of OAuth 2.0 grant type strings that the client may use.
     *
     * @param list<GrantType|value-of<GrantType>> $grantTypes
     */
    public function withGrantTypes(array $grantTypes): self
    {
        $obj = clone $this;
        $obj['grant_types'] = $grantTypes;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj['logo_uri'] = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $obj = clone $this;
        $obj['policy_uri'] = $policyUri;

        return $obj;
    }

    /**
     * Array of redirection URI strings for use in redirect-based flows.
     *
     * @param list<string> $redirectUris
     */
    public function withRedirectUris(array $redirectUris): self
    {
        $obj = clone $this;
        $obj['redirect_uris'] = $redirectUris;

        return $obj;
    }

    /**
     * Array of the OAuth 2.0 response type strings that the client may use.
     *
     * @param list<string> $responseTypes
     */
    public function withResponseTypes(array $responseTypes): self
    {
        $obj = clone $this;
        $obj['response_types'] = $responseTypes;

        return $obj;
    }

    /**
     * Space-separated string of scope values that the client may use.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * Authentication method for the token endpoint.
     *
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod
     */
    public function withTokenEndpointAuthMethod(
        TokenEndpointAuthMethod|string $tokenEndpointAuthMethod
    ): self {
        $obj = clone $this;
        $obj['token_endpoint_auth_method'] = $tokenEndpointAuthMethod;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(string $tosUri): self
    {
        $obj = clone $this;
        $obj['tos_uri'] = $tosUri;

        return $obj;
    }
}
