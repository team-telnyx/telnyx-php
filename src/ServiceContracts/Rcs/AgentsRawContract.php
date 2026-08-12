<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rcs;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Agents\AgentCreateParams;
use Telnyx\Rcs\Agents\AgentLaunchParams;
use Telnyx\Rcs\Agents\AgentListParams;
use Telnyx\Rcs\Agents\AgentResponse;
use Telnyx\Rcs\Agents\AgentUpdateParams;
use Telnyx\Rcs\Agents\CarrierApprovalResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AgentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AgentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param array<string,mixed>|AgentUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AgentUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AgentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AgentResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AgentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param array<string,mixed>|AgentLaunchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentResponse>
     *
     * @throws APIException
     */
    public function launch(
        string $id,
        array|AgentLaunchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<CarrierApprovalResponse>>
     *
     * @throws APIException
     */
    public function retrieveCarrierApprovals(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentResponse>
     *
     * @throws APIException
     */
    public function submit(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
