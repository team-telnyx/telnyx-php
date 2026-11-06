<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\APIs\AgentGatewayAPIResponse;
use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\AgentGateways\APIs\APIListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\APIsContract;

/**
 * REST APIs on an instance, served to agents as tools.
 *
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APICreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APIUpdateParams\Auth as AuthShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class APIsService implements APIsContract
{
    /**
     * @api
     */
    public APIsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new APIsRawService($client);
    }

    /**
     * @api
     *
     * Adds a REST API by its OpenAPI description. Each operation becomes a tool at `{gateway_url}/mcp`, named with the API's `name`, a hyphen, and the lowercased `operationId`. A description the gateway cannot fetch yields an API with no tools. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string $name A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Up to 100 letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
     * @param string $specURL The URL of the API's OpenAPI description: OpenAPI 3.0, OpenAPI 3.1, or Swagger 2.0.
     * @param AuthShape $auth How the gateway authenticates to the API. AWS Signature Version 4 is for MCP servers only. Replaced whole on an update.
     * @param string|Omitted|null $baseURL Where the gateway sends the API's requests. Without it, the gateway takes the description's first `servers` entry.
     * @param list<string> $forwardedHeaders headers copied from the agent's request, by name
     * @param bool $openToEveryKey `true` lets every key on the instance use the server, granted or not
     * @param array<string,string> $staticHeaders headers sent on every request
     * @param list<string> $tools The operations the API exposes as tools, by tool name. `[]` exposes every operation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        string $name,
        string $specURL,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|null $auth = null,
        string|Omitted|null $baseURL = Omitted::VALUE,
        ?array $forwardedHeaders = null,
        bool $openToEveryKey = false,
        ?array $staticHeaders = null,
        ?array $tools = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayAPIResponse {
        $params = array_filter(
            [
                'name' => $name,
                'specURL' => $specURL,
                'auth' => $auth ?? Omitted::VALUE,
                'baseURL' => $baseURL,
                'forwardedHeaders' => $forwardedHeaders ?? Omitted::VALUE,
                'openToEveryKey' => $openToEveryKey,
                'staticHeaders' => $staticHeaders ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
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
     * Changes an API's settings. A field left out stays as it is, `"base_url": null` clears the base URL, and `auth` is replaced whole. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $apiID path param: The API's `id`
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param AuthShape1 $auth Body param: How the gateway authenticates to the API. AWS Signature Version 4 is for MCP servers only. Replaced whole on an update.
     * @param string|Omitted|null $baseURL Body param: Where the gateway sends the API's requests. Without it, the gateway takes the description's first `servers` entry.
     * @param list<string> $forwardedHeaders body param: Headers copied from the agent's request, by name
     * @param string $name Body param: A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
     * @param bool $openToEveryKey body param: `true` lets every key on the instance use the server, granted or not
     * @param string $specURL Body param: The URL of the API's OpenAPI description: OpenAPI 3.0, OpenAPI 3.1, or Swagger 2.0.
     * @param array<string,string> $staticHeaders body param: Headers sent on every request
     * @param list<string> $tools Body param: The operations the API exposes as tools, by tool name. `[]` exposes every operation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $apiID,
        string $instanceID,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|null $auth = null,
        string|Omitted|null $baseURL = Omitted::VALUE,
        ?array $forwardedHeaders = null,
        ?string $name = null,
        bool $openToEveryKey = false,
        ?string $specURL = null,
        ?array $staticHeaders = null,
        ?array $tools = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayAPIResponse {
        $params = array_filter(
            [
                'instanceID' => $instanceID,
                'auth' => $auth ?? Omitted::VALUE,
                'baseURL' => $baseURL,
                'forwardedHeaders' => $forwardedHeaders ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'openToEveryKey' => $openToEveryKey,
                'specURL' => $specURL ?? Omitted::VALUE,
                'staticHeaders' => $staticHeaders ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($apiID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the REST APIs the instance serves as tools, without their credentials. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): APIListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes an API and returns it as it was. An MCP server's `id` answers `404`. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $apiID the API's `id`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $apiID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayAPIResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($apiID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
