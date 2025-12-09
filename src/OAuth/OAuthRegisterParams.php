<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
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
 *   clientName?: string,
 *   grantTypes?: list<GrantType|value-of<GrantType>>,
 *   logoUri?: string,
 *   policyUri?: string,
 *   redirectUris?: list<string>,
 *   responseTypes?: list<string>,
 *   scope?: string,
 *   tokenEndpointAuthMethod?: TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod>,
 *   tosUri?: string,
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
    #[Optional('client_name')]
    public ?string $clientName;

    /**
     * Array of OAuth 2.0 grant type strings that the client may use.
     *
     * @var list<value-of<GrantType>>|null $grantTypes
     */
    #[Optional('grant_types', list: GrantType::class)]
    public ?array $grantTypes;

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
     * Array of redirection URI strings for use in redirect-based flows.
     *
     * @var list<string>|null $redirectUris
     */
    #[Optional('redirect_uris', list: 'string')]
    public ?array $redirectUris;

    /**
     * Array of the OAuth 2.0 response type strings that the client may use.
     *
     * @var list<string>|null $responseTypes
     */
    #[Optional('response_types', list: 'string')]
    public ?array $responseTypes;

    /**
     * Space-separated string of scope values that the client may use.
     */
    #[Optional]
    public ?string $scope;

    /**
     * Authentication method for the token endpoint.
     *
     * @var value-of<TokenEndpointAuthMethod>|null $tokenEndpointAuthMethod
     */
    #[Optional(
        'token_endpoint_auth_method',
        enum: TokenEndpointAuthMethod::class
    )]
    public ?string $tokenEndpointAuthMethod;

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
     * @param list<GrantType|value-of<GrantType>> $grantTypes
     * @param list<string> $redirectUris
     * @param list<string> $responseTypes
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod
     */
    public static function with(
        ?string $clientName = null,
        ?array $grantTypes = null,
        ?string $logoUri = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?array $responseTypes = null,
        ?string $scope = null,
        TokenEndpointAuthMethod|string|null $tokenEndpointAuthMethod = null,
        ?string $tosUri = null,
    ): self {
        $obj = new self;

        null !== $clientName && $obj['clientName'] = $clientName;
        null !== $grantTypes && $obj['grantTypes'] = $grantTypes;
        null !== $logoUri && $obj['logoUri'] = $logoUri;
        null !== $policyUri && $obj['policyUri'] = $policyUri;
        null !== $redirectUris && $obj['redirectUris'] = $redirectUris;
        null !== $responseTypes && $obj['responseTypes'] = $responseTypes;
        null !== $scope && $obj['scope'] = $scope;
        null !== $tokenEndpointAuthMethod && $obj['tokenEndpointAuthMethod'] = $tokenEndpointAuthMethod;
        null !== $tosUri && $obj['tosUri'] = $tosUri;

        return $obj;
    }

    /**
     * Human-readable string name of the client to be presented to the end-user.
     */
    public function withClientName(string $clientName): self
    {
        $obj = clone $this;
        $obj['clientName'] = $clientName;

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
        $obj['grantTypes'] = $grantTypes;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj['logoUri'] = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $obj = clone $this;
        $obj['policyUri'] = $policyUri;

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
        $obj['redirectUris'] = $redirectUris;

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
        $obj['responseTypes'] = $responseTypes;

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
        $obj['tokenEndpointAuthMethod'] = $tokenEndpointAuthMethod;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(string $tosUri): self
    {
        $obj = clone $this;
        $obj['tosUri'] = $tosUri;

        return $obj;
    }
}
