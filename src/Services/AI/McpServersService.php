<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListResponse;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
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
     * Create a new MCP server.
     *
     * @param list<string>|null $allowedTools
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
        RequestOptions|array|null $requestOptions = null,
    ): McpServerNewResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'type' => $type,
                'url' => $url,
                'allowedTools' => $allowedTools,
                'apiKeyRef' => $apiKeyRef,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): McpServerGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($mcpServerID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing MCP server.
     *
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
    ): McpServerUpdateResponse {
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
     * Retrieve a list of MCP servers.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPaginationTopLevelArray<McpServerListResponse>
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
     * Delete a specific MCP server.
     *
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
