<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\McpServers\McpServerCreateParams;
use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListParams;
use Telnyx\AI\McpServers\McpServerListResponse;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateParams;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPaginationTopLevelArray;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\McpServersRawContract;

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
     * Create a new MCP server.
     *
     * @param array{
     *   name: string,
     *   type: string,
     *   url: string,
     *   allowedTools?: list<string>|null,
     *   apiKeyRef?: string|null,
     * }|McpServerCreateParams $params
     *
     * @return BaseResponse<McpServerNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|McpServerCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = McpServerCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<McpServerGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id?: string,
     *   allowedTools?: list<string>|null,
     *   apiKeyRef?: string|null,
     *   createdAt?: string|\DateTimeInterface,
     *   name?: string,
     *   type?: string,
     *   url?: string,
     * }|McpServerUpdateParams $params
     *
     * @return BaseResponse<McpServerUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        array|McpServerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = McpServerUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   pageNumber?: int, pageSize?: int, type?: string, url?: string
     * }|McpServerListParams $params
     *
     * @return BaseResponse<DefaultFlatPaginationTopLevelArray<McpServerListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|McpServerListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = McpServerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/mcp_servers',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: McpServerListResponse::class,
            page: DefaultFlatPaginationTopLevelArray::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific MCP server.
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/mcp_servers/%1$s', $mcpServerID],
            options: $requestOptions,
            convert: null,
        );
    }
}
