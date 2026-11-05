<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyResponse;
use Telnyx\AgentGateways\Policies\PolicyListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type AgentGatewayPolicyGuardrailsShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails
 * @phpstan-import-type AgentGatewayPolicyPipelineShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PoliciesContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string $name A name, unique on the instance. A request names the policy in its `policies` field.
     * @param string|Omitted|null $base A policy this one builds on, by name. The policy starts with the base's guardrails.
     * @param string|Omitted|null $description what the policy is for
     * @param AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape $guardrails the guardrails a policy adds to its base's, and the ones it removes from them, by name
     * @param string|Omitted|null $model A condition on the model, by name or regular expression. The policy's guardrails run only on requests for a matching model. `null` matches every model.
     * @param Omitted|AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null $pipeline ordered steps that run in place of the policy's guardrails running independently
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        string $name,
        string|Omitted|null $base = Omitted::VALUE,
        string|Omitted|null $description = Omitted::VALUE,
        AgentGatewayPolicyGuardrails|array|null $guardrails = null,
        string|Omitted|null $model = Omitted::VALUE,
        Omitted|AgentGatewayPolicyPipeline|array|null $pipeline = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayPolicyResponse;

    /**
     * @api
     *
     * @param string $name the policy's `name`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $name,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayPolicyResponse;

    /**
     * @api
     *
     * @param string $name path param: The policy's `name`
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param string|Omitted|null $base Body param: A policy this one builds on, by name. The policy starts with the base's guardrails.
     * @param string|Omitted|null $description body param: What the policy is for
     * @param AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape $guardrails body param: The guardrails a policy adds to its base's, and the ones it removes from them, by name
     * @param string|Omitted|null $model Body param: A condition on the model, by name or regular expression. The policy's guardrails run only on requests for a matching model. `null` matches every model.
     * @param Omitted|AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null $pipeline body param: Ordered steps that run in place of the policy's guardrails running independently
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $name,
        string $instanceID,
        string|Omitted|null $base = Omitted::VALUE,
        string|Omitted|null $description = Omitted::VALUE,
        AgentGatewayPolicyGuardrails|array|null $guardrails = null,
        string|Omitted|null $model = Omitted::VALUE,
        Omitted|AgentGatewayPolicyPipeline|array|null $pipeline = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayPolicyResponse;

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
    ): PolicyListResponse;

    /**
     * @api
     *
     * @param string $name the policy's `name`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $name,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayPolicyResponse;
}
