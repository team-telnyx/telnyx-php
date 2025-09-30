<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OAuth\OAuthAuthorizeParams;
use Telnyx\OAuth\OAuthAuthorizeParams\CodeChallengeMethod;
use Telnyx\OAuth\OAuthAuthorizeParams\ResponseType;
use Telnyx\OAuth\OAuthCreateGrantParams;
use Telnyx\OAuth\OAuthExchangeTokenParams;
use Telnyx\OAuth\OAuthExchangeTokenParams\GrantType;
use Telnyx\OAuth\OAuthExchangeTokenResponse;
use Telnyx\OAuth\OAuthGetConsentResponse;
use Telnyx\OAuth\OAuthGetJwksResponse;
use Telnyx\OAuth\OAuthIntrospectTokenParams;
use Telnyx\OAuth\OAuthIntrospectTokenResponse;
use Telnyx\OAuth\OAuthNewGrantResponse;
use Telnyx\OAuth\OAuthRegisterClientParams;
use Telnyx\OAuth\OAuthRegisterClientParams\GrantType as GrantType1;
use Telnyx\OAuth\OAuthRegisterClientParams\TokenEndpointAuthMethod;
use Telnyx\OAuth\OAuthRegisterClientResponse;
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
    public function authorize(
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

        return $this->authorizeRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = OAuthAuthorizeParams::parseRequest(
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
     * Create an OAuth authorization grant
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
    ): OAuthNewGrantResponse {
        $params = ['allowed' => $allowed, 'consentToken' => $consentToken];

        return $this->createGrantRaw($params, $requestOptions);
    }

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
    ): OAuthNewGrantResponse {
        [$parsed, $options] = OAuthCreateGrantParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/grants',
            body: (object) $parsed,
            options: $options,
            convert: OAuthNewGrantResponse::class,
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
    ): OAuthExchangeTokenResponse {
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

        return $this->exchangeTokenRaw($params, $requestOptions);
    }

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
    ): OAuthExchangeTokenResponse {
        [$parsed, $options] = OAuthExchangeTokenParams::parseRequest(
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
            convert: OAuthExchangeTokenResponse::class,
        );
    }

    /**
     * @api
     *
     * Introspect an OAuth access token to check its validity and metadata
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
    ): OAuthIntrospectTokenResponse {
        $params = ['token' => $token];

        return $this->introspectTokenRaw($params, $requestOptions);
    }

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
    ): OAuthIntrospectTokenResponse {
        [$parsed, $options] = OAuthIntrospectTokenParams::parseRequest(
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
            convert: OAuthIntrospectTokenResponse::class,
        );
    }

    /**
     * @api
     *
     * Register a new OAuth client dynamically (RFC 7591)
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
    ): OAuthRegisterClientResponse {
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

        return $this->registerClientRaw($params, $requestOptions);
    }

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
    ): OAuthRegisterClientResponse {
        [$parsed, $options] = OAuthRegisterClientParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/register',
            body: (object) $parsed,
            options: $options,
            convert: OAuthRegisterClientResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details about an OAuth consent token
     *
     * @return OAuthGetConsentResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConsent(
        string $consentToken,
        ?RequestOptions $requestOptions = null
    ): OAuthGetConsentResponse {
        $params = [];

        return $this->retrieveConsentRaw($consentToken, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): OAuthGetConsentResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['oauth/consent/%1$s', $consentToken],
            options: $requestOptions,
            convert: OAuthGetConsentResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the JSON Web Key Set for token verification
     *
     * @return OAuthGetJwksResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveJwks(
        ?RequestOptions $requestOptions = null
    ): OAuthGetJwksResponse {
        $params = [];

        return $this->retrieveJwksRaw($params, $requestOptions);
    }

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
    ): OAuthGetJwksResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'oauth/jwks',
            options: $requestOptions,
            convert: OAuthGetJwksResponse::class,
        );
    }
}
