<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
use Telnyx\ServiceContracts\OAuthContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OAuthService implements OAuthContract
{
    /**
     * @api
     */
    public OAuthRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OAuthRawService($client);
    }

    /**
     * @api
     *
     * Retrieve details about an OAuth consent token
     *
     * @param string $consentToken OAuth consent token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $consentToken,
        RequestOptions|array|null $requestOptions = null
    ): OAuthGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($consentToken, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an OAuth authorization grant
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
    ): OAuthGrantsResponse {
        $params = Util::removeNulls(
            ['allowed' => $allowed, 'consentToken' => $consentToken]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->grants(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Introspect an OAuth access token to check its validity and metadata
     *
     * @param string $token The token to introspect
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function introspect(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): OAuthIntrospectResponse {
        $params = Util::removeNulls(['token' => $token]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->introspect(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Register a new OAuth client dynamically (RFC 7591)
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
    ): OAuthRegisterResponse {
        $params = Util::removeNulls(
            [
                'clientName' => $clientName,
                'grantTypes' => $grantTypes,
                'logoUri' => $logoUri,
                'policyUri' => $policyUri,
                'redirectUris' => $redirectUris,
                'responseTypes' => $responseTypes,
                'scope' => $scope,
                'tokenEndpointAuthMethod' => $tokenEndpointAuthMethod,
                'tosUri' => $tosUri,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->register(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'clientID' => $clientID,
                'redirectUri' => $redirectUri,
                'responseType' => $responseType,
                'codeChallenge' => $codeChallenge,
                'codeChallengeMethod' => $codeChallengeMethod,
                'scope' => $scope,
                'state' => $state,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveAuthorize(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the JSON Web Key Set for token verification
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveJwks(
        RequestOptions|array|null $requestOptions = null
    ): OAuthGetJwksResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveJwks(requestOptions: $requestOptions);

        return $response->parse();
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
    ): OAuthTokenResponse {
        $params = Util::removeNulls(
            [
                'grantType' => $grantType,
                'clientID' => $clientID,
                'clientSecret' => $clientSecret,
                'code' => $code,
                'codeVerifier' => $codeVerifier,
                'redirectUri' => $redirectUri,
                'refreshToken' => $refreshToken,
                'scope' => $scope,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->token(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
