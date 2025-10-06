<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OAuth\OAuthGetJwksResponse;
use Telnyx\OAuth\OAuthGetResponse;
use Telnyx\OAuth\OAuthGrantsParams;
use Telnyx\OAuth\OAuthGrantsResponse;
use Telnyx\OAuth\OAuthIntrospectParams;
use Telnyx\OAuth\OAuthIntrospectResponse;
use Telnyx\OAuth\OAuthRegisterParams;
use Telnyx\OAuth\OAuthRegisterParams\TokenEndpointAuthMethod;
use Telnyx\OAuth\OAuthRegisterResponse;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\CodeChallengeMethod;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\ResponseType;
use Telnyx\OAuth\OAuthTokenParams;
use Telnyx\OAuth\OAuthTokenParams\GrantType;
use Telnyx\OAuth\OAuthTokenResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthContract;

use const Telnyx\Core\OMIT as omit;

final class OAuthService implements OAuthContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve details about an OAuth consent token
     *
     * @throws APIException
     */
    public function retrieve(
        string $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['oauth/consent/%1$s', $consentToken],
            options: $requestOptions,
            convert: OAuthGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Create an OAuth authorization grant
     *
     * @param bool $allowed Whether the grant is allowed
     * @param string $consentToken Consent token
     *
     * @throws APIException
     */
    public function grants(
        $allowed,
        $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantsResponse {
        $params = ['allowed' => $allowed, 'consentToken' => $consentToken];

        return $this->grantsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function grantsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantsResponse {
        [$parsed, $options] = OAuthGrantsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/grants',
            body: (object) $parsed,
            options: $options,
            convert: OAuthGrantsResponse::class,
        );
    }

    /**
     * @api
     *
     * Introspect an OAuth access token to check its validity and metadata
     *
     * @param string $token The token to introspect
     *
     * @throws APIException
     */
    public function introspect(
        $token,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectResponse {
        $params = ['token' => $token];

        return $this->introspectRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function introspectRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectResponse {
        [$parsed, $options] = OAuthIntrospectParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/introspect',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: OAuthIntrospectResponse::class,
        );
    }

    /**
     * @api
     *
     * Register a new OAuth client dynamically (RFC 7591)
     *
     * @param string $clientName Human-readable string name of the client to be presented to the end-user
     * @param list<OAuthRegisterParams\GrantType|value-of<OAuthRegisterParams\GrantType>> $grantTypes Array of OAuth 2.0 grant type strings that the client may use
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris Array of redirection URI strings for use in redirect-based flows
     * @param list<string> $responseTypes Array of the OAuth 2.0 response type strings that the client may use
     * @param string $scope Space-separated string of scope values that the client may use
     * @param TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod> $tokenEndpointAuthMethod Authentication method for the token endpoint
     * @param string $tosUri URL of the client's terms of service
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
    ): OAuthRegisterResponse {
        $params = [
            'clientName' => $clientName,
            'grantTypes' => $grantTypes,
            'logoUri' => $logoUri,
            'policyUri' => $policyUri,
            'redirectUris' => $redirectUris,
            'responseTypes' => $responseTypes,
            'scope' => $scope,
            'tokenEndpointAuthMethod' => $tokenEndpointAuthMethod,
            'tosUri' => $tosUri,
        ];

        return $this->registerRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function registerRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthRegisterResponse {
        [$parsed, $options] = OAuthRegisterParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/register',
            body: (object) $parsed,
            options: $options,
            convert: OAuthRegisterResponse::class,
        );
    }

    /**
     * @api
     *
     * OAuth 2.0 authorization endpoint for the authorization code flow
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
    ): mixed {
        $params = [
            'clientID' => $clientID,
            'redirectUri' => $redirectUri,
            'responseType' => $responseType,
            'codeChallenge' => $codeChallenge,
            'codeChallengeMethod' => $codeChallengeMethod,
            'scope' => $scope,
            'state' => $state,
        ];

        return $this->retrieveAuthorizeRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = OAuthRetrieveAuthorizeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'oauth/authorize',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the JSON Web Key Set for token verification
     *
     * @throws APIException
     */
    public function retrieveJwks(
        ?RequestOptions $requestOptions = null
    ): OAuthGetJwksResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'oauth/jwks',
            options: $requestOptions,
            convert: OAuthGetJwksResponse::class,
        );
    }

    /**
     * @api
     *
     * Exchange authorization code, client credentials, or refresh token for access token
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
    ): OAuthTokenResponse {
        $params = [
            'grantType' => $grantType,
            'clientID' => $clientID,
            'clientSecret' => $clientSecret,
            'code' => $code,
            'codeVerifier' => $codeVerifier,
            'redirectUri' => $redirectUri,
            'refreshToken' => $refreshToken,
            'scope' => $scope,
        ];

        return $this->tokenRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function tokenRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthTokenResponse {
        [$parsed, $options] = OAuthTokenParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/token',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: OAuthTokenResponse::class,
        );
    }
}
