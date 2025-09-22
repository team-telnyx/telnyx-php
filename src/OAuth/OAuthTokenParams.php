<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthTokenParams\GrantType;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthTokenParams); // set properties as needed
 * $client->STAINLESS_FIXME_oauth->token(...$params->toArray());
 * ```
 * Exchange authorization code, client credentials, or refresh token for access token.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->STAINLESS_FIXME_oauth->token(...$params->toArray());`
 *
 * @see Telnyx\OAuth->token
 *
 * @phpstan-type oauth_token_params = array{
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
    /** @use SdkModel<oauth_token_params> */
    use SdkModel;
    use SdkParams;

    /**
     * OAuth 2.0 grant type.
     *
     * @var value-of<GrantType> $grantType
     */
    #[Api('grant_type', enum: GrantType::class)]
    public string $grantType;

    /**
     * OAuth client ID (if not using HTTP Basic auth).
     */
    #[Api('client_id', optional: true)]
    public ?string $clientID;

    /**
     * OAuth client secret (if not using HTTP Basic auth).
     */
    #[Api('client_secret', optional: true)]
    public ?string $clientSecret;

    /**
     * Authorization code (for authorization_code flow).
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * PKCE code verifier (for authorization_code flow).
     */
    #[Api('code_verifier', optional: true)]
    public ?string $codeVerifier;

    /**
     * Redirect URI (for authorization_code flow).
     */
    #[Api('redirect_uri', optional: true)]
    public ?string $redirectUri;

    /**
     * Refresh token (for refresh_token flow).
     */
    #[Api('refresh_token', optional: true)]
    public ?string $refreshToken;

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
        $obj = new self;

        $obj->grantType = $grantType instanceof GrantType ? $grantType->value : $grantType;

        null !== $clientID && $obj->clientID = $clientID;
        null !== $clientSecret && $obj->clientSecret = $clientSecret;
        null !== $code && $obj->code = $code;
        null !== $codeVerifier && $obj->codeVerifier = $codeVerifier;
        null !== $redirectUri && $obj->redirectUri = $redirectUri;
        null !== $refreshToken && $obj->refreshToken = $refreshToken;
        null !== $scope && $obj->scope = $scope;

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
        $obj->grantType = $grantType instanceof GrantType ? $grantType->value : $grantType;

        return $obj;
    }

    /**
     * OAuth client ID (if not using HTTP Basic auth).
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    /**
     * OAuth client secret (if not using HTTP Basic auth).
     */
    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj->clientSecret = $clientSecret;

        return $obj;
    }

    /**
     * Authorization code (for authorization_code flow).
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * PKCE code verifier (for authorization_code flow).
     */
    public function withCodeVerifier(string $codeVerifier): self
    {
        $obj = clone $this;
        $obj->codeVerifier = $codeVerifier;

        return $obj;
    }

    /**
     * Redirect URI (for authorization_code flow).
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj->redirectUri = $redirectUri;

        return $obj;
    }

    /**
     * Refresh token (for refresh_token flow).
     */
    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refreshToken = $refreshToken;

        return $obj;
    }

    /**
     * Space-separated list of requested scopes (for client_credentials).
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj->scope = $scope;

        return $obj;
    }
}
