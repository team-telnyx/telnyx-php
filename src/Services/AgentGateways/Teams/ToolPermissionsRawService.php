<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways\Teams;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionCreateParams;
use Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionCreateParams\Server;
use Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionListParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\Teams\ToolPermissionsRawContract;

/**
 * The MCP servers and tools a key or team may use.
 *
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Teams\ToolPermissions\ToolPermissionCreateParams\Server
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ToolPermissionsRawService implements ToolPermissionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Replaces the grant whole and returns it. Every server must be one of the instance's MCP servers or APIs, named once. A key reaches the servers granted to it or to its team, and the servers open to every key; when both grant, only the servers in both. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $teamID path param: The team's `id`
     * @param array{
     *   instanceID: string, servers: list<Server|ServerShape>
     * }|ToolPermissionCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ToolPermissionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'agent_gateways/%1$s/teams/%2$s/tool_permissions', $instanceID, $teamID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayToolPermissionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the MCP servers and APIs the team's keys may use, and the tools within each. `servers: []` means none. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $teamID the team's `id`
     * @param array{instanceID: string}|ToolPermissionListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ToolPermissionListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'agent_gateways/%1$s/teams/%2$s/tool_permissions', $instanceID, $teamID,
            ],
            options: $options,
            convert: AgentGatewayToolPermissionsResponse::class,
        );
    }
}
