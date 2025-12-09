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
        $self = new self;

        null !== $clientName && $self['clientName'] = $clientName;
        null !== $grantTypes && $self['grantTypes'] = $grantTypes;
        null !== $logoUri && $self['logoUri'] = $logoUri;
        null !== $policyUri && $self['policyUri'] = $policyUri;
        null !== $redirectUris && $self['redirectUris'] = $redirectUris;
        null !== $responseTypes && $self['responseTypes'] = $responseTypes;
        null !== $scope && $self['scope'] = $scope;
        null !== $tokenEndpointAuthMethod && $self['tokenEndpointAuthMethod'] = $tokenEndpointAuthMethod;
        null !== $tosUri && $self['tosUri'] = $tosUri;

        return $self;
    }

    /**
     * Human-readable string name of the client to be presented to the end-user.
     */
    public function withClientName(string $clientName): self
    {
        $self = clone $this;
        $self['clientName'] = $clientName;

        return $self;
    }

    /**
     * Array of OAuth 2.0 grant type strings that the client may use.
     *
     * @param list<GrantType|value-of<GrantType>> $grantTypes
     */
    public function withGrantTypes(array $grantTypes): self
    {
        $self = clone $this;
        $self['grantTypes'] = $grantTypes;

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
     * Array of redirection URI strings for use in redirect-based flows.
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
     * Array of the OAuth 2.0 response type strings that the client may use.
     *
     * @param list<string> $responseTypes
     */
    public function withResponseTypes(array $responseTypes): self
    {
        $self = clone $this;
        $self['responseTypes'] = $responseTypes;

        return $self;
    }

    /**
     * Space-separated string of scope values that the client may use.
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }

    /**
     * Authentication method for the token endpoint.
     *
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod
     */
    public function withTokenEndpointAuthMethod(
        TokenEndpointAuthMethod|string $tokenEndpointAuthMethod
    ): self {
        $self = clone $this;
        $self['tokenEndpointAuthMethod'] = $tokenEndpointAuthMethod;

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
