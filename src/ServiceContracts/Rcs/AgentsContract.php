<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rcs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Agents\AgentConfiguration;
use Telnyx\Rcs\Agents\AgentLaunchParams\Campaign;
use Telnyx\Rcs\Agents\AgentResponse;
use Telnyx\Rcs\Agents\AgentTestingConfiguration;
use Telnyx\Rcs\Agents\AgentUseCase;
use Telnyx\Rcs\Agents\CarrierApprovalResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CampaignShape from \Telnyx\Rcs\Agents\AgentLaunchParams\Campaign
 * @phpstan-import-type AgentTestingConfigurationShape from \Telnyx\Rcs\Agents\AgentTestingConfiguration
 * @phpstan-import-type AgentConfigurationShape from \Telnyx\Rcs\Agents\AgentConfiguration
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgentsContract
{
    /**
     * @api
     *
     * @param string $brandID Body param
     * @param AgentConfiguration|AgentConfigurationShape $configuration Body param
     * @param string $displayName Body param
     * @param AgentUseCase|value-of<AgentUseCase> $useCase Body param
     * @param string $idempotencyKey Header param: A caller-generated key containing letters, numbers, underscores, or hyphens. Reuse the same key and request body when retrying the same logical agent creation.
     * @param string|null $hostingRegion Body param
     * @param string|null $profileID Body param: A Messaging Profile owned by the authenticated organization. When omitted, the agent inherits the brand profile.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $brandID,
        AgentConfiguration|array $configuration,
        string $displayName,
        AgentUseCase|string $useCase,
        string $idempotencyKey,
        ?string $hostingRegion = null,
        ?string $profileID = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AgentResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param AgentConfiguration|AgentConfigurationShape $configuration
     * @param AgentUseCase|value-of<AgentUseCase> $useCase
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        AgentConfiguration|array|null $configuration = null,
        ?string $displayName = null,
        ?string $hostingRegion = null,
        ?string $profileID = null,
        AgentUseCase|string|null $useCase = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentResponse;

    /**
     * @api
     *
     * @param string $brandID only return agents belonging to this brand
     * @param RequestOpts|null $requestOptions
     *
     * @return list<AgentResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $brandID = null,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param Campaign|CampaignShape $campaign
     * @param AgentTestingConfiguration|AgentTestingConfigurationShape $testing
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function launch(
        string $id,
        Campaign|array $campaign,
        AgentTestingConfiguration|array $testing,
        RequestOptions|array|null $requestOptions = null,
    ): AgentResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return list<CarrierApprovalResponse>
     *
     * @throws APIException
     */
    public function retrieveCarrierApprovals(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AgentResponse;
}
