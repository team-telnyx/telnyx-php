<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
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
 *   grant_type: GrantType|value-of<GrantType>,
 *   client_id?: string,
 *   client_secret?: string,
 *   code?: string,
 *   code_verifier?: string,
 *   redirect_uri?: string,
 *   refresh_token?: string,
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
     * @var value-of<GrantType> $grant_type
     */
    #[Api(enum: GrantType::class)]
    public string $grant_type;

    /**
     * OAuth client ID (if not using HTTP Basic auth).
     */
    #[Api(optional: true)]
    public ?string $client_id;

    /**
     * OAuth client secret (if not using HTTP Basic auth).
     */
    #[Api(optional: true)]
    public ?string $client_secret;

    /**
     * Authorization code (for authorization_code flow).
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * PKCE code verifier (for authorization_code flow).
     */
    #[Api(optional: true)]
    public ?string $code_verifier;

    /**
     * Redirect URI (for authorization_code flow).
     */
    #[Api(optional: true)]
    public ?string $redirect_uri;

    /**
     * Refresh token (for refresh_token flow).
     */
    #[Api(optional: true)]
    public ?string $refresh_token;

    /**
     * Space-separated list of requested scopes (for client_credentials).
     */
    #[Api(optional: true)]
    public ?string $scope;

    /**
     * `new OAuthTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthTokenParams::with(grant_type: ...)
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
     * @param GrantType|value-of<GrantType> $grant_type
     */
    public static function with(
        GrantType|string $grant_type,
        ?string $client_id = null,
        ?string $client_secret = null,
        ?string $code = null,
        ?string $code_verifier = null,
        ?string $redirect_uri = null,
        ?string $refresh_token = null,
        ?string $scope = null,
    ): self {
        $obj = new self;

        $obj['grant_type'] = $grant_type;

        null !== $client_id && $obj['client_id'] = $client_id;
        null !== $client_secret && $obj['client_secret'] = $client_secret;
        null !== $code && $obj['code'] = $code;
        null !== $code_verifier && $obj['code_verifier'] = $code_verifier;
        null !== $redirect_uri && $obj['redirect_uri'] = $redirect_uri;
        null !== $refresh_token && $obj['refresh_token'] = $refresh_token;
        null !== $scope && $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * OAuth 2.0 grant type.
     *
     * @param GrantType|value-of<GrantType> $grantType
     */
    public function withGrantType(GrantType|string $grantType): self
    {
        $obj = clone $this;
        $obj['grant_type'] = $grantType;

        return $obj;
    }

    /**
     * OAuth client ID (if not using HTTP Basic auth).
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['client_id'] = $clientID;

        return $obj;
    }

    /**
     * OAuth client secret (if not using HTTP Basic auth).
     */
    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj['client_secret'] = $clientSecret;

        return $obj;
    }

    /**
     * Authorization code (for authorization_code flow).
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * PKCE code verifier (for authorization_code flow).
     */
    public function withCodeVerifier(string $codeVerifier): self
    {
        $obj = clone $this;
        $obj['code_verifier'] = $codeVerifier;

        return $obj;
    }

    /**
     * Redirect URI (for authorization_code flow).
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj['redirect_uri'] = $redirectUri;

        return $obj;
    }

    /**
     * Refresh token (for refresh_token flow).
     */
    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj['refresh_token'] = $refreshToken;

        return $obj;
    }

    /**
     * Space-separated list of requested scopes (for client_credentials).
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }
}
