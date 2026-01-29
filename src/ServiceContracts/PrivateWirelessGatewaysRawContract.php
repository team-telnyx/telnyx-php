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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PrivateWirelessGatewaysRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PrivateWirelessGatewayCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PrivateWirelessGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PrivateWirelessGatewayCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the private wireless gateway
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PrivateWirelessGatewayGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PrivateWirelessGatewayListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PrivateWirelessGateway>>
     *
     * @throws APIException
     */
    public function list(
        array|PrivateWirelessGatewayListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the private wireless gateway
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PrivateWirelessGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
