<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Networks;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Networks\DefaultGateway\DefaultGatewayCreateParams;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;

interface DefaultGatewayRawContract
{
    /**
     * @api
     *
     * @param string $networkIdentifier identifies the resource
     * @param array<mixed>|DefaultGatewayCreateParams $params
     *
     * @return BaseResponse<DefaultGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $networkIdentifier,
        array|DefaultGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<DefaultGatewayGetResponse>
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
     *
     * @return BaseResponse<DefaultGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
