<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\RequestOptions;

interface PublicInternetGatewaysRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PublicInternetGatewayCreateParams $params
     *
     * @return BaseResponse<PublicInternetGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PublicInternetGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<PublicInternetGatewayGetResponse>
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
     * @param array<mixed>|PublicInternetGatewayListParams $params
     *
     * @return BaseResponse<DefaultPagination<PublicInternetGatewayListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PublicInternetGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<PublicInternetGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
