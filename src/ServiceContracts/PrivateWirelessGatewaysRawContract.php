<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGateway;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayCreateParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayDeleteResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayGetResponse;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayListParams;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayNewResponse;
use Telnyx\RequestOptions;

interface PrivateWirelessGatewaysRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PrivateWirelessGatewayCreateParams $params
     *
     * @return BaseResponse<PrivateWirelessGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PrivateWirelessGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the private wireless gateway
     *
     * @return BaseResponse<PrivateWirelessGatewayGetResponse>
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
     * @param array<string,mixed>|PrivateWirelessGatewayListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<PrivateWirelessGateway>>
     *
     * @throws APIException
     */
    public function list(
        array|PrivateWirelessGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the private wireless gateway
     *
     * @return BaseResponse<PrivateWirelessGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
