<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AgentGateways\AgentGateway;
use Telnyx\AgentGateways\AgentGatewayCreateParams;
use Telnyx\AgentGateways\AgentGatewayGetModelsResponse;
use Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse;
use Telnyx\AgentGateways\AgentGatewayListParams;
use Telnyx\AgentGateways\AgentGatewayResponse;
use Telnyx\AgentGateways\AgentGatewayRetrieveSpendLogsParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgentGatewaysRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AgentGatewayCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AgentGatewayCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AgentGatewayListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AgentGateway>>
     *
     * @throws APIException
     */
    public function list(
        array|AgentGatewayListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGetModelsResponse>
     *
     * @throws APIException
     */
    public function retrieveModels(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|AgentGatewayRetrieveSpendLogsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGetSpendLogsResponse>
     *
     * @throws APIException
     */
    public function retrieveSpendLogs(
        string $instanceID,
        array|AgentGatewayRetrieveSpendLogsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
