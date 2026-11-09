<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrailResponse;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams\Mode;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams\Type;
use Telnyx\AgentGateways\Guardrails\GuardrailDeleteParams;
use Telnyx\AgentGateways\Guardrails\GuardrailListResponse;
use Telnyx\AgentGateways\Guardrails\GuardrailUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\GuardrailsRawContract;

/**
 * Checks an instance runs on model and tool requests.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GuardrailsRawService implements GuardrailsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds a check the instance runs on model and tool requests. It runs on every request when `always_on`, and otherwise on the requests that name it in `guardrails`. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   modes: list<Mode|value-of<Mode>>,
     *   name: string,
     *   type: value-of<Type>,
     *   alwaysOn?: bool,
     *   settings?: array<string,mixed>,
     * }|GuardrailCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGuardrailResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|GuardrailCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GuardrailCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/guardrails', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayGuardrailResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes a guardrail's `name`, `modes`, `always_on`, or `settings`. `settings` is replaced whole, secrets included. The `type` cannot change. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $guardrailID path param: The guardrail's `id`
     * @param array{
     *   instanceID: string,
     *   alwaysOn?: bool,
     *   modes?: list<GuardrailUpdateParams\Mode|value-of<GuardrailUpdateParams\Mode>>,
     *   name?: string,
     *   settings?: array<string,mixed>,
     * }|GuardrailUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGuardrailResponse>
     *
     * @throws APIException
     */
    public function update(
        string $guardrailID,
        array|GuardrailUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GuardrailUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['agent_gateways/%1$s/guardrails/%2$s', $instanceID, $guardrailID],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayGuardrailResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the instance's guardrails, without their secrets. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GuardrailListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/guardrails', $instanceID],
            options: $requestOptions,
            convert: GuardrailListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes a guardrail and returns it as it was. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $guardrailID the guardrail's `id`
     * @param array{instanceID: string}|GuardrailDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGuardrailResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $guardrailID,
        array|GuardrailDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GuardrailDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s/guardrails/%2$s', $instanceID, $guardrailID],
            options: $options,
            convert: AgentGatewayGuardrailResponse::class,
        );
    }
}
