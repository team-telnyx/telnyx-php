<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
        /** @var BaseResponse<OAuthGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['oauth/consent/%1$s', $consentToken],
            options: $requestOptions,
            convert: OAuthGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an OAuth authorization grant
     *
     * @param array{allowed: bool, consentToken: string}|OAuthGrantsParams $params
     *
     * @throws APIException
     */
    public function grants(
        array|OAuthGrantsParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantsResponse {
        [$parsed, $options] = OAuthGrantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthGrantsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'oauth/grants',
            body: (object) $parsed,
            options: $options,
            convert: OAuthGrantsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Introspect an OAuth access token to check its validity and metadata
     *
     * @param array{token: string}|OAuthIntrospectParams $params
     *
     * @throws APIException
     */
    public function introspect(
        array|OAuthIntrospectParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthIntrospectResponse {
        [$parsed, $options] = OAuthIntrospectParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthIntrospectResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'oauth/introspect',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: OAuthIntrospectResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Register a new OAuth client dynamically (RFC 7591)
     *
     * @param array{
     *   clientName?: string,
     *   grantTypes?: list<'authorization_code'|'client_credentials'|'refresh_token'|OAuthRegisterParams\GrantType>,
     *   logoUri?: string,
     *   policyUri?: string,
     *   redirectUris?: list<string>,
     *   responseTypes?: list<string>,
     *   scope?: string,
     *   tokenEndpointAuthMethod?: 'none'|'client_secret_basic'|'client_secret_post'|TokenEndpointAuthMethod,
     *   tosUri?: string,
     * }|OAuthRegisterParams $params
     *
     * @throws APIException
     */
    public function register(
        array|OAuthRegisterParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthRegisterResponse {
        [$parsed, $options] = OAuthRegisterParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthRegisterResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'oauth/register',
            body: (object) $parsed,
            options: $options,
            convert: OAuthRegisterResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * OAuth 2.0 authorization endpoint for the authorization code flow
     *
     * @param array{
     *   clientID: string,
     *   redirectUri: string,
     *   responseType: 'code'|ResponseType,
     *   codeChallenge?: string,
     *   codeChallengeMethod?: 'plain'|'S256'|CodeChallengeMethod,
     *   scope?: string,
     *   state?: string,
     * }|OAuthRetrieveAuthorizeParams $params
     *
     * @throws APIException
     */
    public function retrieveAuthorize(
        array|OAuthRetrieveAuthorizeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = OAuthRetrieveAuthorizeParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'get',
            path: 'oauth/authorize',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'clientID' => 'client_id',
                    'redirectUri' => 'redirect_uri',
                    'responseType' => 'response_type',
                    'codeChallenge' => 'code_challenge',
                    'codeChallengeMethod' => 'code_challenge_method',
                ],
            ),
            options: $options,
            convert: null,
        );

        return $response->parse();
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
        /** @var BaseResponse<OAuthGetJwksResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'oauth/jwks',
            options: $requestOptions,
            convert: OAuthGetJwksResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Exchange authorization code, client credentials, or refresh token for access token
     *
     * @param array{
     *   grantType: 'client_credentials'|'authorization_code'|'refresh_token'|GrantType,
     *   clientID?: string,
     *   clientSecret?: string,
     *   code?: string,
     *   codeVerifier?: string,
     *   redirectUri?: string,
     *   refreshToken?: string,
     *   scope?: string,
     * }|OAuthTokenParams $params
     *
     * @throws APIException
     */
    public function token(
        array|OAuthTokenParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthTokenResponse {
        [$parsed, $options] = OAuthTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthTokenResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'oauth/token',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: OAuthTokenResponse::class,
        );

        return $response->parse();
    }
}
