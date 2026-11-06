<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyResponse;
use Telnyx\AgentGateways\Policies\PolicyListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\PoliciesContract;

/**
 * Named sets of guardrails an instance applies to requests.
 *
 * @phpstan-import-type AgentGatewayPolicyGuardrailsShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails
 * @phpstan-import-type AgentGatewayPolicyPipelineShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PoliciesService implements PoliciesContract
{
    /**
     * @api
     */
    public PoliciesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PoliciesRawService($client);
    }

    /**
     * @api
     *
     * Creates a named set of guardrails. It applies from the next request on, to the requests that name it in `policies` and to those its [attachments](https://developers.telnyx.com/api-reference/agent-gateway-policy-attachments/attach-a-policy) match.
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
    ): AgentGatewayPolicyResponse {
        $params = array_filter(
            [
                'name' => $name,
                'base' => $base,
                'description' => $description,
                'guardrails' => $guardrails ?? Omitted::VALUE,
                'model' => $model,
                'pipeline' => $pipeline,
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
     * Returns one policy, in its current version.
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
    ): AgentGatewayPolicyResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($name, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Changes a policy, which publishes a new version of it. A field left out stays as it is; `guardrails` and `pipeline` are replaced whole, and `model: null` removes the condition.
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
    ): AgentGatewayPolicyResponse {
        $params = array_filter(
            [
                'instanceID' => $instanceID,
                'base' => $base,
                'description' => $description,
                'guardrails' => $guardrails ?? Omitted::VALUE,
                'model' => $model,
                'pipeline' => $pipeline,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($name, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the instance's policies, each in its current version.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): PolicyListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a policy and every version of it, and returns it as it was. A policy that an attachment names, or that another policy builds on, cannot be deleted.
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
    ): AgentGatewayPolicyResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($name, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
