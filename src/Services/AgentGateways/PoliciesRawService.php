<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyResponse;
use Telnyx\AgentGateways\Policies\PolicyCreateParams;
use Telnyx\AgentGateways\Policies\PolicyDeleteParams;
use Telnyx\AgentGateways\Policies\PolicyListResponse;
use Telnyx\AgentGateways\Policies\PolicyRetrieveParams;
use Telnyx\AgentGateways\Policies\PolicyUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\PoliciesRawContract;

/**
 * Named sets of guardrails an instance applies to requests.
 *
 * @phpstan-import-type AgentGatewayPolicyGuardrailsShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails
 * @phpstan-import-type AgentGatewayPolicyPipelineShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PoliciesRawService implements PoliciesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a named set of guardrails. It applies from the next request on, to the requests that name it in `policies` and to those its [attachments](https://developers.telnyx.com/api-reference/agent-gateway-policy-attachments/attach-a-policy) match.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   name: string,
     *   base?: string|null,
     *   description?: string|null,
     *   guardrails?: AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape,
     *   model?: string|null,
     *   pipeline?: AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null,
     * }|PolicyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayPolicyResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|PolicyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PolicyCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/policies', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayPolicyResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns one policy, in its current version.
     *
     * @param string $name the policy's `name`
     * @param array{instanceID: string}|PolicyRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayPolicyResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $name,
        array|PolicyRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PolicyRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/policies/%2$s', $instanceID, $name],
            options: $options,
            convert: AgentGatewayPolicyResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes a policy, which publishes a new version of it. A field left out stays as it is; `guardrails` and `pipeline` are replaced whole, and `model: null` removes the condition.
     *
     * @param string $name path param: The policy's `name`
     * @param array{
     *   instanceID: string,
     *   base?: string|null,
     *   description?: string|null,
     *   guardrails?: AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape,
     *   model?: string|null,
     *   pipeline?: AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null,
     * }|PolicyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayPolicyResponse>
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array|PolicyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PolicyUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['agent_gateways/%1$s/policies/%2$s', $instanceID, $name],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayPolicyResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the instance's policies, each in its current version.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PolicyListResponse>
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
            path: ['agent_gateways/%1$s/policies', $instanceID],
            options: $requestOptions,
            convert: PolicyListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a policy and every version of it, and returns it as it was. A policy that an attachment names, or that another policy builds on, cannot be deleted.
     *
     * @param string $name the policy's `name`
     * @param array{instanceID: string}|PolicyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayPolicyResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $name,
        array|PolicyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PolicyDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s/policies/%2$s', $instanceID, $name],
            options: $options,
            convert: AgentGatewayPolicyResponse::class,
        );
    }
}
