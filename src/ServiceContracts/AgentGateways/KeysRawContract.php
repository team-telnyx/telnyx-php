<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Keys\AgentGatewayKeyResponse;
use Telnyx\AgentGateways\Keys\KeyCreateParams;
use Telnyx\AgentGateways\Keys\KeyDeleteParams;
use Telnyx\AgentGateways\Keys\KeyListParams;
use Telnyx\AgentGateways\Keys\KeyListResponse;
use Telnyx\AgentGateways\Keys\KeyNewResponse;
use Telnyx\AgentGateways\Keys\KeyUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KeysRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|KeyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KeyNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|KeyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $keyID path param: The key's `id`, a 64-character hash the instance stores in place of the key
     * @param array<string,mixed>|KeyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayKeyResponse>
     *
     * @throws APIException
     */
    public function update(
        string $keyID,
        array|KeyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|KeyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KeyListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        array|KeyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $keyID the key's `id`, a 64-character hash the instance stores in place of the key
     * @param array<string,mixed>|KeyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayKeyResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $keyID,
        array|KeyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
