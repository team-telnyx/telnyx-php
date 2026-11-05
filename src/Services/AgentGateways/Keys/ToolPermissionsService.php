<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways\Keys;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\Keys\ToolPermissionsContract;

/**
 * The MCP servers and tools a key or team may use.
 *
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ToolPermissionsService implements ToolPermissionsContract
{
    /**
     * @api
     */
    public ToolPermissionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ToolPermissionsRawService($client);
    }

    /**
     * @api
     *
     * Replaces the grant whole and returns it. Every server must be one of the instance's MCP servers or APIs, named once. A key reaches the servers granted to it or to its team, and the servers open to every key; when both grant, only the servers in both. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $keyID path param: The key's `id`, a 64-character hash the instance stores in place of the key
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param list<Server|ServerShape> $servers Body param: The servers granted, each with its tools. `[]` grants none.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $keyID,
        string $instanceID,
        array $servers,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayToolPermissionsResponse {
        $params = ['instanceID' => $instanceID, 'servers' => $servers];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($keyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the MCP servers and APIs the key may use, and the tools within each. `servers: []` means none. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $keyID the key's `id`, a 64-character hash the instance stores in place of the key
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $keyID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayToolPermissionsResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($keyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
