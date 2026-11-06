<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\McpServers\AgentGatewayMcpServerResponse;
use Telnyx\AgentGateways\McpServers\McpServerCreateParams;
use Telnyx\AgentGateways\McpServers\McpServerDeleteParams;
use Telnyx\AgentGateways\McpServers\McpServerListResponse;
use Telnyx\AgentGateways\McpServers\McpServerUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface McpServersRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|McpServerCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $serverID path param: The MCP server's `id`
     * @param array<string,mixed>|McpServerUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $serverID the MCP server's `id`
     * @param array<string,mixed>|McpServerDeleteParams $params
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
    ): BaseResponse;
}
