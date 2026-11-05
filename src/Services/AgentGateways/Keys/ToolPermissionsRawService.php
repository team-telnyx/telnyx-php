<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways\Keys;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionListParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\Keys\ToolPermissionsRawContract;

/**
 * The MCP servers and tools a key or team may use.
 *
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server
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
     * @param string $keyID path param: The key's `id`, a 64-character hash the instance stores in place of the key
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
        string $keyID,
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
                'agent_gateways/%1$s/keys/%2$s/tool_permissions', $instanceID, $keyID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayToolPermissionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the MCP servers and APIs the key may use, and the tools within each. `servers: []` means none. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $keyID the key's `id`, a 64-character hash the instance stores in place of the key
     * @param array{instanceID: string}|ToolPermissionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayToolPermissionsResponse>
     *
     * @throws APIException
     */
    public function list(
        string $keyID,
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
                'agent_gateways/%1$s/keys/%2$s/tool_permissions', $instanceID, $keyID,
            ],
            options: $options,
            convert: AgentGatewayToolPermissionsResponse::class,
        );
    }
}
