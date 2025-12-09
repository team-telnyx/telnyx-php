<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthTokenParams\GrantType;

/**
 * Exchange authorization code, client credentials, or refresh token for access token.
 *
 * @see Telnyx\Services\OAuthService::token()
 *
 * @phpstan-type OAuthTokenParamsShape = array{
 *   grantType: GrantType|value-of<GrantType>,
 *   clientID?: string,
 *   clientSecret?: string,
 *   code?: string,
 *   codeVerifier?: string,
 *   redirectUri?: string,
 *   refreshToken?: string,
 *   scope?: string,
 * }
 */
final class OAuthTokenParams implements BaseModel
{
    /** @use SdkModel<OAuthTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * OAuth 2.0 grant type.
     *
     * @var value-of<GrantType> $grantType
     */
    #[Required('grant_type', enum: GrantType::class)]
    public string $grantType;

    /**
     * OAuth client ID (if not using HTTP Basic auth).
     */
    #[Optional('client_id')]
    public ?string $clientID;

    /**
     * OAuth client secret (if not using HTTP Basic auth).
     */
    #[Optional('client_secret')]
    public ?string $clientSecret;

    /**
     * Authorization code (for authorization_code flow).
     */
    #[Optional]
    public ?string $code;

    /**
     * PKCE code verifier (for authorization_code flow).
     */
    #[Optional('code_verifier')]
    public ?string $codeVerifier;

    /**
     * Redirect URI (for authorization_code flow).
     */
    #[Optional('redirect_uri')]
    public ?string $redirectUri;

    /**
     * Refresh token (for refresh_token flow).
     */
    #[Optional('refresh_token')]
    public ?string $refreshToken;

    /**
     * Space-separated list of requested scopes (for client_credentials).
     */
    #[Optional]
    public ?string $scope;

    /**
     * `new OAuthTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthTokenParams::with(grantType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthTokenParams)->withGrantType(...)
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
     * @param GrantType|value-of<GrantType> $grantType
     */
    public static function with(
        GrantType|string $grantType,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        ?string $redirectUri = null,
        ?string $refreshToken = null,
        ?string $scope = null,
    ): self {
        $self = new self;

        $self['grantType'] = $grantType;

        null !== $clientID && $self['clientID'] = $clientID;
        null !== $clientSecret && $self['clientSecret'] = $clientSecret;
        null !== $code && $self['code'] = $code;
        null !== $codeVerifier && $self['codeVerifier'] = $codeVerifier;
        null !== $redirectUri && $self['redirectUri'] = $redirectUri;
        null !== $refreshToken && $self['refreshToken'] = $refreshToken;
        null !== $scope && $self['scope'] = $scope;

        return $self;
    }

    /**
     * OAuth 2.0 grant type.
     *
     * @param GrantType|value-of<GrantType> $grantType
     */
    public function withGrantType(GrantType|string $grantType): self
    {
        $self = clone $this;
        $self['grantType'] = $grantType;

        return $self;
    }

    /**
     * OAuth client ID (if not using HTTP Basic auth).
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * OAuth client secret (if not using HTTP Basic auth).
     */
    public function withClientSecret(string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

        return $self;
    }

    /**
     * Authorization code (for authorization_code flow).
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * PKCE code verifier (for authorization_code flow).
     */
    public function withCodeVerifier(string $codeVerifier): self
    {
        $self = clone $this;
        $self['codeVerifier'] = $codeVerifier;

        return $self;
    }

    /**
     * Redirect URI (for authorization_code flow).
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $self = clone $this;
        $self['redirectUri'] = $redirectUri;

        return $self;
    }

    /**
     * Refresh token (for refresh_token flow).
     */
    public function withRefreshToken(string $refreshToken): self
    {
        $self = clone $this;
        $self['refreshToken'] = $refreshToken;

        return $self;
    }

    /**
     * Space-separated list of requested scopes (for client_credentials).
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }
}
