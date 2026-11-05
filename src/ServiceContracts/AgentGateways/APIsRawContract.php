<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\APIs\AgentGatewayAPIResponse;
use Telnyx\AgentGateways\APIs\APICreateParams;
use Telnyx\AgentGateways\APIs\APIDeleteParams;
use Telnyx\AgentGateways\APIs\APIListResponse;
use Telnyx\AgentGateways\APIs\APIUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface APIsRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|APICreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayAPIResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|APICreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $apiID path param: The API's `id`
     * @param array<string,mixed>|APIUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayAPIResponse>
     *
     * @throws APIException
     */
    public function update(
        string $apiID,
        array|APIUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<APIListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $apiID the API's `id`
     * @param array<string,mixed>|APIDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayAPIResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $apiID,
        array|APIDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
