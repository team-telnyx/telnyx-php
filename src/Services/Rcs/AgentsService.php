<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Rcs\Agents\AgentConfiguration;
use Telnyx\Rcs\Agents\AgentLaunchParams\Campaign;
use Telnyx\Rcs\Agents\AgentResponse;
use Telnyx\Rcs\Agents\AgentTestingConfiguration;
use Telnyx\Rcs\Agents\AgentUseCase;
use Telnyx\Rcs\Agents\CarrierApprovalResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Rcs\AgentsContract;
use Telnyx\Services\Rcs\Agents\TestDevicesService;

/**
 * Manage RCS agent registration, testing, verification, and launch.
 *
 * @phpstan-import-type CampaignShape from \Telnyx\Rcs\Agents\AgentLaunchParams\Campaign
 * @phpstan-import-type AgentTestingConfigurationShape from \Telnyx\Rcs\Agents\AgentTestingConfiguration
 * @phpstan-import-type AgentConfigurationShape from \Telnyx\Rcs\Agents\AgentConfiguration
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgentsService implements AgentsContract
{
    /**
     * @api
     */
    public AgentsRawService $raw;

    /**
     * @api
     */
    public TestDevicesService $testDevices;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AgentsRawService($client);
        $this->testDevices = new TestDevicesService($client);
    }

    /**
     * @api
     *
     * Creates an editable RCS agent draft under a brand. The `Idempotency-Key` is scoped to the authenticated organization. Reusing the key with the same request returns the original agent, while reusing it with a different request returns a conflict.
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
    ): AgentResponse {
        $params = Util::removeNulls(
            [
                'brandID' => $brandID,
                'configuration' => $configuration,
                'displayName' => $displayName,
                'useCase' => $useCase,
                'idempotencyKey' => $idempotencyKey,
                'hostingRegion' => $hostingRegion,
                'profileID' => $profileID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves an RCS agent, section statuses, test devices, carrier approvals, and provider capabilities.
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AgentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates one or more fields on an agent while its status is `CREATED`. Submitted agents cannot be changed through this endpoint.
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
    ): AgentResponse {
        $params = Util::removeNulls(
            [
                'configuration' => $configuration,
                'displayName' => $displayName,
                'hostingRegion' => $hostingRegion,
                'profileID' => $profileID,
                'useCase' => $useCase,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists RCS agents owned by the authenticated organization, optionally filtered by brand.
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
    ): array {
        $params = Util::removeNulls(['brandID' => $brandID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Adds the campaign and testing configuration, then starts asynchronous carrier launch. Agent basics must already be submitted. Repeating a launch that is already in progress returns the current agent without creating new work.
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
    ): AgentResponse {
        $params = Util::removeNulls(
            ['campaign' => $campaign, 'testing' => $testing]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->launch($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists carrier approval records for an RCS agent. The provider may expose per-carrier, hub-level, or bot-level approval status.
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
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCarrierApprovals($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Starts asynchronous provider provisioning and submits the agent's basic configuration. The brand must be `VERIFIED`. Repeating this request for an in-progress agent returns its current state without creating new work.
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AgentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
