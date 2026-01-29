<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OAuth\OAuthGetJwksResponse;
use Telnyx\OAuth\OAuthGetResponse;
use Telnyx\OAuth\OAuthGrantsResponse;
use Telnyx\OAuth\OAuthIntrospectResponse;
use Telnyx\OAuth\OAuthRegisterParams\TokenEndpointAuthMethod;
use Telnyx\OAuth\OAuthRegisterResponse;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\CodeChallengeMethod;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\ResponseType;
use Telnyx\OAuth\OAuthTokenParams\GrantType;
use Telnyx\OAuth\OAuthTokenResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OAuthContract
{
    /**
     * @api
     *
     * @param string $consentToken OAuth consent token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $consentToken,
        RequestOptions|array|null $requestOptions = null
    ): OAuthGetResponse;

    /**
     * @api
     *
     * @param bool $allowed Whether the grant is allowed
     * @param string $consentToken Consent token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function grants(
        bool $allowed,
        string $consentToken,
        RequestOptions|array|null $requestOptions = null,
    ): OAuthGrantsResponse;

    /**
     * @api
     *
     * @param string $token The token to introspect
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function introspect(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): OAuthIntrospectResponse;

    /**
     * @api
     *
     * @param string $clientName Human-readable string name of the client to be presented to the end-user
     * @param list<\Telnyx\OAuth\OAuthRegisterParams\GrantType|value-of<\Telnyx\OAuth\OAuthRegisterParams\GrantType>> $grantTypes Array of OAuth 2.0 grant type strings that the client may use
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris Array of redirection URI strings for use in redirect-based flows
     * @param list<string> $responseTypes Array of the OAuth 2.0 response type strings that the client may use
     * @param string $scope Space-separated string of scope values that the client may use
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod Authentication method for the token endpoint
     * @param string $tosUri URL of the client's terms of service
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function register(
        ?string $clientName = null,
        array $grantTypes = ['authorization_code'],
        ?string $logoUri = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        array $responseTypes = ['code'],
        ?string $scope = null,
        TokenEndpointAuthMethod|string $tokenEndpointAuthMethod = 'client_secret_basic',
        ?string $tosUri = null,
        RequestOptions|array|null $requestOptions = null,
    ): OAuthRegisterResponse;

    /**
     * @api
     *
     * @param string $clientID OAuth client identifier
     * @param string $redirectUri Redirect URI
     * @param ResponseType|value-of<ResponseType> $responseType OAuth response type
     * @param string $codeChallenge PKCE code challenge
     * @param CodeChallengeMethod|value-of<CodeChallengeMethod> $codeChallengeMethod PKCE code challenge method
     * @param string $scope Space-separated list of requested scopes
     * @param string $state State parameter for CSRF protection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAuthorize(
        string $clientID,
        string $redirectUri,
        ResponseType|string $responseType,
        ?string $codeChallenge = null,
        CodeChallengeMethod|string|null $codeChallengeMethod = null,
        ?string $scope = null,
        ?string $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveJwks(
        RequestOptions|array|null $requestOptions = null
    ): OAuthGetJwksResponse;

    /**
     * @api
     *
     * @param GrantType|value-of<GrantType> $grantType OAuth 2.0 grant type
     * @param string $clientID OAuth client ID (if not using HTTP Basic auth)
     * @param string $clientSecret OAuth client secret (if not using HTTP Basic auth)
     * @param string $code Authorization code (for authorization_code flow)
     * @param string $codeVerifier PKCE code verifier (for authorization_code flow)
     * @param string $redirectUri Redirect URI (for authorization_code flow)
     * @param string $refreshToken Refresh token (for refresh_token flow)
     * @param string $scope Space-separated list of requested scopes (for client_credentials)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function token(
        GrantType|string $grantType,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        ?string $redirectUri = null,
        ?string $refreshToken = null,
        ?string $scope = null,
        RequestOptions|array|null $requestOptions = null,
    ): OAuthTokenResponse;
}
