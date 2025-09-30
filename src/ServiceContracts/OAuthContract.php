<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OAuth\OAuthAuthorizeParams\CodeChallengeMethod;
use Telnyx\OAuth\OAuthAuthorizeParams\ResponseType;
use Telnyx\OAuth\OAuthExchangeTokenParams\GrantType;
use Telnyx\OAuth\OAuthExchangeTokenResponse;
use Telnyx\OAuth\OAuthGetConsentResponse;
use Telnyx\OAuth\OAuthGetJwksResponse;
use Telnyx\OAuth\OAuthIntrospectTokenResponse;
use Telnyx\OAuth\OAuthNewGrantResponse;
use Telnyx\OAuth\OAuthRegisterClientParams\GrantType as GrantType1;
use Telnyx\OAuth\OAuthRegisterClientParams\TokenEndpointAuthMethod;
use Telnyx\OAuth\OAuthRegisterClientResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface OAuthContract
{
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
    public function authorize(
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
    public function authorizeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $allowed Whether the grant is allowed
     * @param string $consentToken Consent token
     *
     * @return OAuthNewGrantResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createGrant(
        $allowed,
        $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthNewGrantResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthNewGrantResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createGrantRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthNewGrantResponse;

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
     * @return OAuthExchangeTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function exchangeToken(
        $grantType,
        $clientID = omit,
        $clientSecret = omit,
        $code = omit,
        $codeVerifier = omit,
        $redirectUri = omit,
        $refreshToken = omit,
        $scope = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthExchangeTokenResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthExchangeTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function exchangeTokenRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthExchangeTokenResponse;

    /**
     * @api
     *
     * @param string $token The token to introspect
     *
     * @return OAuthIntrospectTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function introspectToken(
        $token,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectTokenResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthIntrospectTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function introspectTokenRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectTokenResponse;

    /**
     * @api
     *
     * @param string $clientName Human-readable string name of the client to be presented to the end-user
     * @param list<GrantType1|value-of<GrantType1>> $grantTypes Array of OAuth 2.0 grant type strings that the client may use
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris Array of redirection URI strings for use in redirect-based flows
     * @param list<string> $responseTypes Array of the OAuth 2.0 response type strings that the client may use
     * @param string $scope Space-separated string of scope values that the client may use
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod Authentication method for the token endpoint
     * @param string $tosUri URL of the client's terms of service
     *
     * @return OAuthRegisterClientResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function registerClient(
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
    ): OAuthRegisterClientResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthRegisterClientResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function registerClientRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthRegisterClientResponse;

    /**
     * @api
     *
     * @return OAuthGetConsentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConsent(
        string $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthGetConsentResponse;

    /**
     * @api
     *
     * @return OAuthGetConsentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConsentRaw(
        string $consentToken,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthGetConsentResponse;

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
}
