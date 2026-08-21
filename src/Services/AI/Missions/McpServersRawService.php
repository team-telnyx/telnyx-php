<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\AI\Missions\McpServers\McpServerDeleteMcpServerParams;
use Telnyx\AI\Missions\McpServers\McpServerGetMcpServerParams;
use Telnyx\AI\Missions\McpServers\McpServerUpdateMcpServerParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\McpServersRawContract;

/**
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
     * Adds an MCP server to the specified mission, making the server's tools available to agents during runs of this mission.
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createMcpServer(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/mcp-servers', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Removes the specified MCP server from the mission, revoking agent access to its tools in subsequent runs.
     *
     * @param string $mcpServerID unique identifier of the mcp server
     * @param array{missionID: string}|McpServerDeleteMcpServerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteMcpServer(
        string $mcpServerID,
        array|McpServerDeleteMcpServerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerDeleteMcpServerParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/missions/%1$s/mcp-servers/%2$s', $missionID, $mcpServerID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the configuration of a single MCP server attached to the specified mission.
     *
     * @param string $mcpServerID unique identifier of the mcp server
     * @param array{missionID: string}|McpServerGetMcpServerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getMcpServer(
        string $mcpServerID,
        array|McpServerGetMcpServerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerGetMcpServerParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/mcp-servers/%2$s', $missionID, $mcpServerID],
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Returns the MCP servers configured on the specified mission. MCP servers expose external tools and data sources agents can use during runs.
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listMcpServers(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/mcp-servers', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Replaces the configuration of the specified MCP server on this mission.
     *
     * @param string $mcpServerID unique identifier of the mcp server
     * @param array{missionID: string}|McpServerUpdateMcpServerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateMcpServer(
        string $mcpServerID,
        array|McpServerUpdateMcpServerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerUpdateMcpServerParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/missions/%1$s/mcp-servers/%2$s', $missionID, $mcpServerID],
            options: $options,
            convert: 'mixed',
        );
    }
}
