<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\McpServers\AgentGatewayMcpServerResponse;
use Telnyx\AgentGateways\McpServers\McpServerCreateParams;
use Telnyx\AgentGateways\McpServers\McpServerCreateParams\Transport;
use Telnyx\AgentGateways\McpServers\McpServerDeleteParams;
use Telnyx\AgentGateways\McpServers\McpServerListResponse;
use Telnyx\AgentGateways\McpServers\McpServerUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\McpServersRawContract;

/**
 * MCP servers on an instance, served to agents at one MCP endpoint.
 *
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerCreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Auth as AuthShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class McpServersRawService implements McpServersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds an MCP server. The instance serves its tools at `{gateway_url}/mcp`, each named with the server's `name` and a hyphen, to the keys granted the server and, with `open_to_every_key`, to every key. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   name: string,
     *   url: string,
     *   auth?: AuthShape,
     *   forwardedHeaders?: list<string>,
     *   openToEveryKey?: bool,
     *   staticHeaders?: array<string,string>,
     *   tools?: list<string>,
     *   transport?: Transport|value-of<Transport>,
     * }|McpServerCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayMcpServerResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|McpServerCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/mcp_servers', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayMcpServerResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes an MCP server's settings. A field left out stays as it is. `auth` is replaced whole, `tools: []` exposes every tool, and `static_headers: {}` clears the headers. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $serverID path param: The MCP server's `id`
     * @param array{
     *   instanceID: string,
     *   auth?: AuthShape1,
     *   forwardedHeaders?: list<string>,
     *   name?: string,
     *   openToEveryKey?: bool,
     *   staticHeaders?: array<string,string>,
     *   tools?: list<string>,
     *   transport?: McpServerUpdateParams\Transport|value-of<McpServerUpdateParams\Transport>,
     *   url?: string,
     * }|McpServerUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayMcpServerResponse>
     *
     * @throws APIException
     */
    public function update(
        string $serverID,
        array|McpServerUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['agent_gateways/%1$s/mcp_servers/%2$s', $instanceID, $serverID],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayMcpServerResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the MCP servers the instance serves at `{gateway_url}/mcp`, without their credentials. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<McpServerListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/mcp_servers', $instanceID],
            options: $requestOptions,
            convert: McpServerListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes an MCP server and returns it as it was. Its `id` stays in the tool permissions that name it until they are next set. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $serverID the MCP server's `id`
     * @param array{instanceID: string}|McpServerDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayMcpServerResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $serverID,
        array|McpServerDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s/mcp_servers/%2$s', $instanceID, $serverID],
            options: $options,
            convert: AgentGatewayMcpServerResponse::class,
        );
    }
}
