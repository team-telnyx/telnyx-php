<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuthenticationProviders\AuthenticationProviderCreateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderListResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AuthenticationProvidersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuthenticationProviderCreateParams $params
     *
     * @return BaseResponse<AuthenticationProviderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AuthenticationProviderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id authentication provider ID
     *
     * @return BaseResponse<AuthenticationProviderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|AuthenticationProviderUpdateParams $params
     *
     * @return BaseResponse<AuthenticationProviderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthenticationProviderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AuthenticationProviderListParams $params
     *
     * @return BaseResponse<AuthenticationProviderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AuthenticationProviderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id authentication provider ID
     *
     * @return BaseResponse<AuthenticationProviderDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
