<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\McpServers\McpServer;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPaginationTopLevelArray;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\McpServersContract;

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
     * Creates a new MCP server configuration on your account and returns the created server.
     *
     * @param string $name Body param
     * @param string $type Body param
     * @param string $url Body param
     * @param list<string>|null $allowedTools Body param
     * @param string|null $apiKeyRef Body param
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $type,
        string $url,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): McpServer {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'type' => $type,
                'url' => $url,
                'allowedTools' => $allowedTools,
                'apiKeyRef' => $apiKeyRef,
                'idempotencyKey' => $idempotencyKey,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details for a specific MCP server.
     *
     * @param string $mcpServerID unique identifier of the mcp server
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): McpServer {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($mcpServerID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified MCP server's configuration and returns the updated server.
     *
     * @param string $mcpServerID unique identifier of the mcp server
     * @param list<string>|null $allowedTools
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        ?string $id = null,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $type = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): McpServer {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'allowedTools' => $allowedTools,
                'apiKeyRef' => $apiKeyRef,
                'createdAt' => $createdAt,
                'name' => $name,
                'type' => $type,
                'url' => $url,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($mcpServerID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of the MCP servers configured on your account, with optional filtering by type or URL.
     *
     * @param int $pageNumber page number to retrieve (1-based)
     * @param int $pageSize number of items to return per page
     * @param string $type filter results by type
     * @param string $url filter results by url
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPaginationTopLevelArray<McpServer>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $type = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPaginationTopLevelArray {
        $params = Util::removeNulls(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'type' => $type,
                'url' => $url,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes the specified MCP server configuration from your account.
     *
     * @param string $mcpServerID unique identifier of the mcp server
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($mcpServerID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
