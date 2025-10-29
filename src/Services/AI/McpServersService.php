<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\McpServers\McpServerCreateParams;
use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListParams;
use Telnyx\AI\McpServers\McpServerListResponseItem;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateParams;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\McpServersContract;

use const Telnyx\Core\OMIT as omit;

final class McpServersService implements McpServersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new MCP server.
     *
     * @param string $name
     * @param string $type
     * @param string $url
     * @param list<string>|null $allowedTools
     * @param string|null $apiKeyRef
     *
     * @throws APIException
     */
    public function create(
        $name,
        $type,
        $url,
        $allowedTools = omit,
        $apiKeyRef = omit,
        ?RequestOptions $requestOptions = null,
    ): McpServerNewResponse {
        $params = [
            'name' => $name,
            'type' => $type,
            'url' => $url,
            'allowedTools' => $allowedTools,
            'apiKeyRef' => $apiKeyRef,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): McpServerNewResponse {
        [$parsed, $options] = McpServerCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/mcp_servers',
            body: (object) $parsed,
            options: $options,
            convert: McpServerNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details for a specific MCP server.
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): McpServerGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/mcp_servers/%1$s', $mcpServerID],
            options: $requestOptions,
            convert: McpServerGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an existing MCP server.
     *
     * @param string $id
     * @param list<string>|null $allowedTools
     * @param string|null $apiKeyRef
     * @param \DateTimeInterface $createdAt
     * @param string $name
     * @param string $type
     * @param string $url
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        $id = omit,
        $allowedTools = omit,
        $apiKeyRef = omit,
        $createdAt = omit,
        $name = omit,
        $type = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): McpServerUpdateResponse {
        $params = [
            'id' => $id,
            'allowedTools' => $allowedTools,
            'apiKeyRef' => $apiKeyRef,
            'createdAt' => $createdAt,
            'name' => $name,
            'type' => $type,
            'url' => $url,
        ];

        return $this->updateRaw($mcpServerID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $mcpServerID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): McpServerUpdateResponse {
        [$parsed, $options] = McpServerUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['ai/mcp_servers/%1$s', $mcpServerID],
            body: (object) $parsed,
            options: $options,
            convert: McpServerUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of MCP servers.
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param string $type
     * @param string $url
     *
     * @return list<McpServerListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        $pageNumber = omit,
        $pageSize = omit,
        $type = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = [
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize,
            'type' => $type,
            'url' => $url,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return list<McpServerListResponseItem>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = McpServerListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/mcp_servers',
            query: $parsed,
            options: $options,
            convert: new ListOf(McpServerListResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Delete a specific MCP server.
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/mcp_servers/%1$s', $mcpServerID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
