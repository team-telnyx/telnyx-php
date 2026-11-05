<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\Keys\AgentGatewayKeyResponse;
use Telnyx\AgentGateways\Keys\KeyCreateParams;
use Telnyx\AgentGateways\Keys\KeyDeleteParams;
use Telnyx\AgentGateways\Keys\KeyListParams;
use Telnyx\AgentGateways\Keys\KeyListResponse;
use Telnyx\AgentGateways\Keys\KeyNewResponse;
use Telnyx\AgentGateways\Keys\KeyUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\KeysRawContract;

/**
 * Keys on an instance.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KeysRawService implements KeysRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Issues a key on the instance. The key's value is in this response only. Every field is optional; a key without `models` may use every model the instance serves. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   budgetResetsEvery?: string|null,
     *   expiresIn?: string|null,
     *   maxBudget?: float|null,
     *   maxParallelRequests?: int|null,
     *   models?: list<string>|null,
     *   name?: string|null,
     *   requestsPerMinute?: int|null,
     *   teamID?: string|null,
     *   tokensPerMinute?: int|null,
     * }|KeyCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KeyCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/keys', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: KeyNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes a key's settings without reissuing it. A field left out stays as it is, and `null` clears it. `models: []` lifts the model restriction. `expires_in` counts from now. Setting `blocked` to `true` makes the instance refuse the key with `401` while keeping its settings and spend; `false` lets it through again. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $keyID path param: The key's `id`, a 64-character hash the instance stores in place of the key
     * @param array{
     *   instanceID: string,
     *   blocked?: bool,
     *   budgetResetsEvery?: string|null,
     *   expiresIn?: string|null,
     *   maxBudget?: float|null,
     *   maxParallelRequests?: int|null,
     *   models?: list<string>,
     *   name?: string,
     *   requestsPerMinute?: int|null,
     *   teamID?: string|null,
     *   tokensPerMinute?: int|null,
     * }|KeyUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KeyUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['agent_gateways/%1$s/keys/%2$s', $instanceID, $keyID],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayKeyResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the instance's keys, without their values. Returns the first 100. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{teamID?: string}|KeyListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KeyListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/keys', $instanceID],
            query: Util::array_transform_keys($parsed, ['teamID' => 'team_id']),
            options: $options,
            convert: KeyListResponse::class,
        );
    }

    /**
     * @api
     *
     * Revokes a key and returns it as it was, without its value. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $keyID the key's `id`, a 64-character hash the instance stores in place of the key
     * @param array{instanceID: string}|KeyDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KeyDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s/keys/%2$s', $instanceID, $keyID],
            options: $options,
            convert: AgentGatewayKeyResponse::class,
        );
    }
}
