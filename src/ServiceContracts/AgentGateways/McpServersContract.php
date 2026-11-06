<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\AgentGateways\McpServers\AgentGatewayAwsSigV4Auth;
use Telnyx\AgentGateways\McpServers\AgentGatewayMcpServerResponse;
use Telnyx\AgentGateways\McpServers\McpServerCreateParams\Transport;
use Telnyx\AgentGateways\McpServers\McpServerListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerCreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Auth as AuthShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface McpServersContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string $name A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Up to 100 letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     * @param string $url the server's MCP endpoint, `http` or `https`
     * @param AuthShape $auth How the gateway authenticates to the server. Replaced whole on an update; `{"type": "none"}` removes the credential.
     * @param list<string> $forwardedHeaders headers copied from the agent's request, by name
     * @param bool $openToEveryKey `true` lets every key on the instance use the server, granted or not
     * @param array<string,string> $staticHeaders headers sent on every request
     * @param list<string> $tools The tools the server exposes to every key, by name. `[]` exposes every tool.
     * @param Transport|value-of<Transport> $transport `http` for Streamable HTTP, or `sse` for Server-Sent Events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        string $name,
        string $url,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|AgentGatewayAwsSigV4Auth|null $auth = null,
        ?array $forwardedHeaders = null,
        bool $openToEveryKey = false,
        ?array $staticHeaders = null,
        ?array $tools = null,
        Transport|string $transport = 'http',
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayMcpServerResponse;

    /**
     * @api
     *
     * @param string $serverID path param: The MCP server's `id`
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param AuthShape1 $auth Body param: How the gateway authenticates to the server. Replaced whole on an update; `{"type": "none"}` removes the credential.
     * @param list<string> $forwardedHeaders body param: Headers copied from the agent's request, by name
     * @param string $name Body param: A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     * @param bool $openToEveryKey body param: `true` lets every key on the instance use the server, granted or not
     * @param array<string,string> $staticHeaders body param: Headers sent on every request
     * @param list<string> $tools Body param: The tools the server exposes to every key, by name. `[]` exposes every tool.
     * @param \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Transport|value-of<\Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Transport> $transport body param: `http` for Streamable HTTP, or `sse` for Server-Sent Events
     * @param string $url body param: The server's MCP endpoint, `http` or `https`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $serverID,
        string $instanceID,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|AgentGatewayAwsSigV4Auth|null $auth = null,
        ?array $forwardedHeaders = null,
        ?string $name = null,
        bool $openToEveryKey = false,
        ?array $staticHeaders = null,
        ?array $tools = null,
        \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Transport|string $transport = 'http',
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayMcpServerResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): McpServerListResponse;

    /**
     * @api
     *
     * @param string $serverID the MCP server's `id`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $serverID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayMcpServerResponse;
}
