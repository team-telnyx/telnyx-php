<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
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

interface OAuthRawContract
{
    /**
     * @api
     *
     * @param string $consentToken OAuth consent token
     *
     * @return BaseResponse<OAuthGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $consentToken,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthGrantsParams $params
     *
     * @return BaseResponse<OAuthGrantsResponse>
     *
     * @throws APIException
     */
    public function grants(
        array|OAuthGrantsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthIntrospectParams $params
     *
     * @return BaseResponse<OAuthIntrospectResponse>
     *
     * @throws APIException
     */
    public function introspect(
        array|OAuthIntrospectParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthRegisterParams $params
     *
     * @return BaseResponse<OAuthRegisterResponse>
     *
     * @throws APIException
     */
    public function register(
        array|OAuthRegisterParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthRetrieveAuthorizeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveAuthorize(
        array|OAuthRetrieveAuthorizeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<OAuthGetJwksResponse>
     *
     * @throws APIException
     */
    public function retrieveJwks(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthTokenParams $params
     *
     * @return BaseResponse<OAuthTokenResponse>
     *
     * @throws APIException
     */
    public function token(
        array|OAuthTokenParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
