<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Teams\AgentGatewayTeamResponse;
use Telnyx\AgentGateways\Teams\TeamCreateParams;
use Telnyx\AgentGateways\Teams\TeamDeleteParams;
use Telnyx\AgentGateways\Teams\TeamListResponse;
use Telnyx\AgentGateways\Teams\TeamUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TeamsRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|TeamCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayTeamResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|TeamCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $teamID path param: The team's `id`
     * @param array<string,mixed>|TeamUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayTeamResponse>
     *
     * @throws APIException
     */
    public function update(
        string $teamID,
        array|TeamUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TeamListResponse>
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
     * @param string $teamID the team's `id`
     * @param array<string,mixed>|TeamDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayTeamResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $teamID,
        array|TeamDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
