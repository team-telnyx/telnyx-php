<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Policies\AgentGatewayPolicyResponse;
use Telnyx\AgentGateways\Policies\PolicyCreateParams;
use Telnyx\AgentGateways\Policies\PolicyDeleteParams;
use Telnyx\AgentGateways\Policies\PolicyListResponse;
use Telnyx\AgentGateways\Policies\PolicyRetrieveParams;
use Telnyx\AgentGateways\Policies\PolicyUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PoliciesRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|PolicyCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $name the policy's `name`
     * @param array<string,mixed>|PolicyRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $name path param: The policy's `name`
     * @param array<string,mixed>|PolicyUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $name the policy's `name`
     * @param array<string,mixed>|PolicyDeleteParams $params
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
    ): BaseResponse;
}
