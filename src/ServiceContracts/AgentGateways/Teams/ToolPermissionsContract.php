<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways\Teams;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionCreateParams\Server;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionCreateParams\Server
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolPermissionsContract
{
    /**
     * @api
     *
     * @param string $teamID path param: The team's `id`
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param list<Server|ServerShape> $servers Body param: The servers granted, each with its tools. `[]` grants none.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $teamID,
        string $instanceID,
        array $servers,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayToolPermissionsResponse;

    /**
     * @api
     *
     * @param string $teamID the team's `id`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $teamID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayToolPermissionsResponse;
}
