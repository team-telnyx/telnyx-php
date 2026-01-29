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
use Telnyx\ServiceContracts\OAuthRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OAuthRawService implements OAuthRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve details about an OAuth consent token
     *
     * @param string $consentToken OAuth consent token
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $consentToken,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{allowed: bool, consentToken: string}|OAuthGrantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthGrantsResponse>
     *
     * @throws APIException
     */
    public function grants(
        array|OAuthGrantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthGrantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{token: string}|OAuthIntrospectParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthIntrospectResponse>
     *
     * @throws APIException
     */
    public function introspect(
        array|OAuthIntrospectParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthIntrospectParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   clientName?: string,
     *   grantTypes?: list<OAuthRegisterParams\GrantType|value-of<OAuthRegisterParams\GrantType>>,
     *   logoUri?: string,
     *   policyUri?: string,
     *   redirectUris?: list<string>,
     *   responseTypes?: list<string>,
     *   scope?: string,
     *   tokenEndpointAuthMethod?: TokenEndpointAuthMethod|value-of<TokenEndpointAuthMethod>,
     *   tosUri?: string,
     * }|OAuthRegisterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthRegisterResponse>
     *
     * @throws APIException
     */
    public function register(
        array|OAuthRegisterParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthRegisterParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   clientID: string,
     *   redirectUri: string,
     *   responseType: ResponseType|value-of<ResponseType>,
     *   codeChallenge?: string,
     *   codeChallengeMethod?: CodeChallengeMethod|value-of<CodeChallengeMethod>,
     *   scope?: string,
     *   state?: string,
     * }|OAuthRetrieveAuthorizeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveAuthorize(
        array|OAuthRetrieveAuthorizeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthRetrieveAuthorizeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Retrieve the JSON Web Key Set for token verification
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthGetJwksResponse>
     *
     * @throws APIException
     */
    public function retrieveJwks(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   grantType: GrantType|value-of<GrantType>,
     *   clientID?: string,
     *   clientSecret?: string,
     *   code?: string,
     *   codeVerifier?: string,
     *   redirectUri?: string,
     *   refreshToken?: string,
     *   scope?: string,
     * }|OAuthTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthTokenResponse>
     *
     * @throws APIException
     */
    public function token(
        array|OAuthTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
