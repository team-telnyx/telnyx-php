<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\AgentGateways\McpServers\AgentGatewayAwsSigV4Auth;
use Telnyx\AgentGateways\McpServers\AgentGatewayMcpServerResponse;
use Telnyx\AgentGateways\McpServers\McpServerCreateParams\Transport;
use Telnyx\AgentGateways\McpServers\McpServerListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\McpServersContract;

/**
 * MCP servers on an instance, served to agents at one MCP endpoint.
 *
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerCreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Auth as AuthShape1
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
     * Adds an MCP server. The instance serves its tools at `{gateway_url}/mcp`, each named with the server's `name` and a hyphen, to the keys granted the server and, with `open_to_every_key`, to every key. The instance must be `ready`; otherwise the request answers `409`.
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
    ): AgentGatewayMcpServerResponse {
        $params = array_filter(
            [
                'name' => $name,
                'url' => $url,
                'auth' => $auth ?? Omitted::VALUE,
                'forwardedHeaders' => $forwardedHeaders ?? Omitted::VALUE,
                'openToEveryKey' => $openToEveryKey,
                'staticHeaders' => $staticHeaders ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
                'transport' => $transport,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($instanceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Changes an MCP server's settings. A field left out stays as it is. `auth` is replaced whole, `tools: []` exposes every tool, and `static_headers: {}` clears the headers. The instance must be `ready`; otherwise the request answers `409`.
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
    ): AgentGatewayMcpServerResponse {
        $params = array_filter(
            [
                'instanceID' => $instanceID,
                'auth' => $auth ?? Omitted::VALUE,
                'forwardedHeaders' => $forwardedHeaders ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'openToEveryKey' => $openToEveryKey,
                'staticHeaders' => $staticHeaders ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
                'transport' => $transport,
                'url' => $url ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($serverID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the MCP servers the instance serves at `{gateway_url}/mcp`, without their credentials. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): McpServerListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes an MCP server and returns it as it was. Its `id` stays in the tool permissions that name it until they are next set. The instance must be `ready`; otherwise the request answers `409`.
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
    ): AgentGatewayMcpServerResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($serverID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
