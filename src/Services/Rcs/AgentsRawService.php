<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Rcs\Agents\AgentConfiguration;
use Telnyx\Rcs\Agents\AgentCreateParams;
use Telnyx\Rcs\Agents\AgentLaunchParams;
use Telnyx\Rcs\Agents\AgentLaunchParams\Campaign;
use Telnyx\Rcs\Agents\AgentListParams;
use Telnyx\Rcs\Agents\AgentResponse;
use Telnyx\Rcs\Agents\AgentTestingConfiguration;
use Telnyx\Rcs\Agents\AgentUpdateParams;
use Telnyx\Rcs\Agents\AgentUseCase;
use Telnyx\Rcs\Agents\CarrierApprovalResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Rcs\AgentsRawContract;

/**
 * Manage RCS agent registration, testing, verification, and launch.
 *
 * @phpstan-import-type CampaignShape from \Telnyx\Rcs\Agents\AgentLaunchParams\Campaign
 * @phpstan-import-type AgentTestingConfigurationShape from \Telnyx\Rcs\Agents\AgentTestingConfiguration
 * @phpstan-import-type AgentConfigurationShape from \Telnyx\Rcs\Agents\AgentConfiguration
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgentsRawService implements AgentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an editable RCS agent draft under a brand. The `Idempotency-Key` is scoped to the authenticated organization. Reusing the key with the same request returns the original agent, while reusing it with a different request returns a conflict.
     *
     * @param array{
     *   brandID: string,
     *   configuration: AgentConfiguration|AgentConfigurationShape,
     *   displayName: string,
     *   useCase: AgentUseCase|value-of<AgentUseCase>,
     *   idempotencyKey: string,
     *   hostingRegion?: string|null,
     *   profileID?: string|null,
     * }|AgentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AgentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'rcs/agents',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: AgentResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves an RCS agent, section statuses, test devices, carrier approvals, and provider capabilities.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rcs/agents/%1$s', $id],
            options: $requestOptions,
            convert: AgentResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates one or more fields on an agent while its status is `CREATED`. Submitted agents cannot be changed through this endpoint.
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param array{
     *   configuration?: AgentConfiguration|AgentConfigurationShape,
     *   displayName?: string,
     *   hostingRegion?: string,
     *   profileID?: string,
     *   useCase?: AgentUseCase|value-of<AgentUseCase>,
     * }|AgentUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AgentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['rcs/agents/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AgentResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists RCS agents owned by the authenticated organization, optionally filtered by brand.
     *
     * @param array{brandID?: string}|AgentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<AgentResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AgentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'rcs/agents',
            query: Util::array_transform_keys($parsed, ['brandID' => 'brand_id']),
            options: $options,
            convert: new ListOf(AgentResponse::class),
        );
    }

    /**
     * @api
     *
     * Adds the campaign and testing configuration, then starts asynchronous carrier launch. Agent basics must already be submitted. Repeating a launch that is already in progress returns the current agent without creating new work.
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param array{
     *   campaign: Campaign|CampaignShape,
     *   testing: AgentTestingConfiguration|AgentTestingConfigurationShape,
     * }|AgentLaunchParams $params
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
    ): BaseResponse {
        [$parsed, $options] = AgentLaunchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['rcs/agents/%1$s/launch', $id],
            body: (object) $parsed,
            options: $options,
            convert: AgentResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists carrier approval records for an RCS agent. The provider may expose per-carrier, hub-level, or bot-level approval status.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rcs/agents/%1$s/carrier_approvals', $id],
            options: $requestOptions,
            convert: new ListOf(CarrierApprovalResponse::class),
        );
    }

    /**
     * @api
     *
     * Starts asynchronous provider provisioning and submits the agent's basic configuration. The brand must be `VERIFIED`. Repeating this request for an in-progress agent returns its current state without creating new work.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['rcs/agents/%1$s/submit', $id],
            options: $requestOptions,
            convert: AgentResponse::class,
        );
    }
}
