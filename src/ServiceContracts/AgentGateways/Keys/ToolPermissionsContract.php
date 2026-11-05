<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways\Keys;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolPermissionsContract
{
    /**
     * @api
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
    ): AgentGatewayToolPermissionsResponse;

    /**
     * @api
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
    ): AgentGatewayToolPermissionsResponse;
}
