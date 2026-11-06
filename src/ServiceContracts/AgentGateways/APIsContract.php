<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\APIs\AgentGatewayAPIResponse;
use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\AgentGateways\APIs\APIListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APICreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APIUpdateParams\Auth as AuthShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface APIsContract
{
    /**
     * @api
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
    ): AgentGatewayAPIResponse;

    /**
     * @api
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
    ): AgentGatewayAPIResponse;

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
    ): APIListResponse;

    /**
     * @api
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
    ): AgentGatewayAPIResponse;
}
