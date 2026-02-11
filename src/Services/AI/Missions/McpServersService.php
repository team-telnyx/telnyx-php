<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\McpServersContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class McpServersService implements McpServersContract
{
    /**
     * @api
     */
    public McpServersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new McpServersRawService($client);
    }

    /**
     * @api
     *
     * Create a new MCP server for a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMcpServer(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMcpServer($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an MCP server from a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteMcpServer(
        string $mcpServerID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteMcpServer($mcpServerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific MCP server by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMcpServer(
        string $mcpServerID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getMcpServer($mcpServerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all MCP servers for a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listMcpServers(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listMcpServers($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an MCP server definition
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateMcpServer(
        string $mcpServerID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateMcpServer($mcpServerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
