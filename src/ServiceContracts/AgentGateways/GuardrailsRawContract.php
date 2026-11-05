<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrailResponse;
use Telnyx\AgentGateways\Guardrails\GuardrailCreateParams;
use Telnyx\AgentGateways\Guardrails\GuardrailDeleteParams;
use Telnyx\AgentGateways\Guardrails\GuardrailListResponse;
use Telnyx\AgentGateways\Guardrails\GuardrailUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface GuardrailsRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|GuardrailCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $guardrailID path param: The guardrail's `id`
     * @param array<string,mixed>|GuardrailUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $guardrailID the guardrail's `id`
     * @param array<string,mixed>|GuardrailDeleteParams $params
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
    ): BaseResponse;
}
