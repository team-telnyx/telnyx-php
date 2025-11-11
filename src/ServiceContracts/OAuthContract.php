<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OAuth\OAuthGetJwksResponse;
use Telnyx\OAuth\OAuthGetResponse;
use Telnyx\OAuth\OAuthGrantsParams;
use Telnyx\OAuth\OAuthGrantsResponse;
use Telnyx\OAuth\OAuthIntrospectParams;
use Telnyx\OAuth\OAuthIntrospectResponse;
use Telnyx\OAuth\OAuthRegisterParams;
use Telnyx\OAuth\OAuthRegisterResponse;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams;
use Telnyx\OAuth\OAuthTokenParams;
use Telnyx\OAuth\OAuthTokenResponse;
use Telnyx\RequestOptions;

interface OAuthContract
{
    /**
     * @api
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
     * @param array<mixed>|OAuthGrantsParams $params
     *
     * @throws APIException
     */
    public function grants(
        array|OAuthGrantsParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthGrantsResponse;

    /**
     * @api
     *
     * @param array<mixed>|OAuthIntrospectParams $params
     *
     * @throws APIException
     */
    public function introspect(
        array|OAuthIntrospectParams $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthIntrospectResponse;

    /**
     * @api
     *
     * @param array<mixed>|OAuthRegisterParams $params
     *
     * @throws APIException
     */
    public function register(
        array|OAuthRegisterParams $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthRegisterResponse;

    /**
     * @api
     *
     * @param array<mixed>|OAuthRetrieveAuthorizeParams $params
     *
     * @throws APIException
     */
    public function retrieveAuthorize(
        array|OAuthRetrieveAuthorizeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveJwks(
        ?RequestOptions $requestOptions = null
    ): OAuthGetJwksResponse;

    /**
     * @api
     *
     * @param array<mixed>|OAuthTokenParams $params
     *
     * @throws APIException
     */
    public function token(
        array|OAuthTokenParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthTokenResponse;
}
