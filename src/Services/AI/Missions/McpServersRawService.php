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
     * Create a new MCP server for a mission
     *
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
     * Delete an MCP server from a mission
     *
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
     * Get a specific MCP server by ID
     *
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
     * List all MCP servers for a mission
     *
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
     * Update an MCP server definition
     *
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
