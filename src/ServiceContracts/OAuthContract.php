<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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

use const Telnyx\Core\OMIT as omit;

interface OAuthContract
{
    /**
     * @api
     *
     * @return OAuthGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthGetResponse;

    /**
     * @api
     *
     * @return OAuthGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $consentToken,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthGetResponse;

    /**
     * @api
     *
     * @param bool $allowed Whether the grant is allowed
     * @param string $consentToken Consent token
     *
     * @return OAuthGrantsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function grants(
        $allowed,
        $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthGrantsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function grantsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantsResponse;

    /**
     * @api
     *
     * @param string $token The token to introspect
     *
     * @return OAuthIntrospectResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function introspect(
        $token,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthIntrospectResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function introspectRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectResponse;

    /**
     * @api
     *
     * @param string $clientName Human-readable string name of the client to be presented to the end-user
     * @param list<Telnyx\OAuth\OAuthRegisterParams\GrantType|value-of<Telnyx\OAuth\OAuthRegisterParams\GrantType>> $grantTypes Array of OAuth 2.0 grant type strings that the client may use
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris Array of redirection URI strings for use in redirect-based flows
     * @param list<string> $responseTypes Array of the OAuth 2.0 response type strings that the client may use
     * @param string $scope Space-separated string of scope values that the client may use
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod Authentication method for the token endpoint
     * @param string $tosUri URL of the client's terms of service
     *
     * @return OAuthRegisterResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function register(
        $clientName = omit,
        $grantTypes = omit,
        $logoUri = omit,
        $policyUri = omit,
        $redirectUris = omit,
        $responseTypes = omit,
        $scope = omit,
        $tokenEndpointAuthMethod = omit,
        $tosUri = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthRegisterResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthRegisterResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function registerRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function retrieveAuthorize(
        $clientID,
        $redirectUri,
        $responseType,
        $codeChallenge = omit,
        $codeChallengeMethod = omit,
        $scope = omit,
        $state = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveAuthorizeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return OAuthGetJwksResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveJwks(
        ?RequestOptions $requestOptions = null
    ): OAuthGetJwksResponse;

    /**
     * @api
     *
     * @return OAuthGetJwksResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveJwksRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
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
     *
     * @return OAuthTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function token(
        $grantType,
        $clientID = omit,
        $clientSecret = omit,
        $code = omit,
        $codeVerifier = omit,
        $redirectUri = omit,
        $refreshToken = omit,
        $scope = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthTokenResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function tokenRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthTokenResponse;
}
