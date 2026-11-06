<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways\Teams;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionCreateParams;
use Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionListParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolPermissionsRawContract
{
    /**
     * @api
     *
     * @param string $teamID path param: The team's `id`
     * @param array<string,mixed>|ToolPermissionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayToolPermissionsResponse>
     *
     * @throws APIException
     */
    public function create(
        string $teamID,
        array|ToolPermissionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $teamID the team's `id`
     * @param array<string,mixed>|ToolPermissionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayToolPermissionsResponse>
     *
     * @throws APIException
     */
    public function list(
        string $teamID,
        array|ToolPermissionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
