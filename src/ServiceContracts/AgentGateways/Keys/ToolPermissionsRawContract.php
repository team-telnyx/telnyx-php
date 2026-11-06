<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways\Keys;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams;
use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionListParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolPermissionsRawContract
{
    /**
     * @api
     *
     * @param string $keyID path param: The key's `id`, a 64-character hash the instance stores in place of the key
     * @param array<string,mixed>|ToolPermissionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayToolPermissionsResponse>
     *
     * @throws APIException
     */
    public function create(
        string $keyID,
        array|ToolPermissionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $keyID the key's `id`, a 64-character hash the instance stores in place of the key
     * @param array<string,mixed>|ToolPermissionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayToolPermissionsResponse>
     *
     * @throws APIException
     */
    public function list(
        string $keyID,
        array|ToolPermissionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
