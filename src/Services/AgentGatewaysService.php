<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AgentGateways\AgentGateway;
use Telnyx\AgentGateways\AgentGatewayGetModelsResponse;
use Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse;
use Telnyx\AgentGateways\AgentGatewayResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGatewaysContract;
use Telnyx\Services\AgentGateways\APIsService;
use Telnyx\Services\AgentGateways\GuardrailsService;
use Telnyx\Services\AgentGateways\KeysService;
use Telnyx\Services\AgentGateways\McpServersService;
use Telnyx\Services\AgentGateways\PoliciesService;
use Telnyx\Services\AgentGateways\PolicyAttachmentsService;
use Telnyx\Services\AgentGateways\TeamsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgentGatewaysService implements AgentGatewaysContract
{
    /**
     * @api
     */
    public AgentGatewaysRawService $raw;

    /**
     * @api
     */
    public APIsService $apis;

    /**
     * @api
     */
    public GuardrailsService $guardrails;

    /**
     * @api
     */
    public KeysService $keys;

    /**
     * @api
     */
    public McpServersService $mcpServers;

    /**
     * @api
     */
    public PoliciesService $policies;

    /**
     * @api
     */
    public PolicyAttachmentsService $policyAttachments;

    /**
     * @api
     */
    public TeamsService $teams;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AgentGatewaysRawService($client);
        $this->apis = new APIsService($client);
        $this->guardrails = new GuardrailsService($client);
        $this->keys = new KeysService($client);
        $this->mcpServers = new McpServersService($client);
        $this->policies = new PoliciesService($client);
        $this->policyAttachments = new PolicyAttachmentsService($client);
        $this->teams = new TeamsService($client);
    }

    /**
     * @api
     *
     * Creates an Agent Gateway instance on one of the account's WireGuard Interfaces. The instance starts `pending`, moves to `provisioning`, and then to `ready` or `failed`. It joins the WireGuard Interface as a peer named `agw-<instance id>`, and its `gateway_url` is set when it is `ready`.
     *
     * @param string $wireguardInterfaceID One of the account's WireGuard Interfaces. The instance joins it as a peer, and the interface's other peers reach the instance.
     * @param string|Omitted|null $name a label for people
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $wireguardInterfaceID,
        string|Omitted|null $name = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayResponse {
        $params = array_filter(
            ['wireguardInterfaceID' => $wireguardInterfaceID, 'name' => $name],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns one of the account's Agent Gateway instances.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): AgentGatewayResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the account's Agent Gateway instances, newest first, one page at a time.
     *
     * @param int $pageNumber the page to return, counting from 1
     * @param int $pageSize results per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AgentGateway>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 50,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an Agent Gateway instance in any status. The response shows it `deleting`; repeating the request answers the same until the instance is gone, and then `404`. The instance's engine and everything stored on it are removed.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): AgentGatewayResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the models the instance serves. Each has the name a request uses, the Telnyx Inference model behind it, and its price per million tokens.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveModels(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): AgentGatewayGetModelsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveModels($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the requests the instance served with its keys, newest first, one page at a time. The window defaults to the last 24 hours and spans at most 31 days. A row appears a few seconds after its request. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param \DateTimeInterface $end The window's end, an RFC 3339 timestamp with an offset. Defaults to now.
     * @param string $keyID only the requests made with this key
     * @param int $pageNumber the page to return, counting from 1
     * @param int $pageSize results per page
     * @param \DateTimeInterface $start The window's start, an RFC 3339 timestamp with an offset. Defaults to 24 hours before `end`.
     * @param string $teamID only the requests made with this team's keys
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSpendLogs(
        string $instanceID,
        ?\DateTimeInterface $end = null,
        ?string $keyID = null,
        int $pageNumber = 1,
        int $pageSize = 50,
        ?\DateTimeInterface $start = null,
        ?string $teamID = null,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayGetSpendLogsResponse {
        $params = array_filter(
            [
                'end' => $end ?? Omitted::VALUE,
                'keyID' => $keyID ?? Omitted::VALUE,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'start' => $start ?? Omitted::VALUE,
                'teamID' => $teamID ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSpendLogs($instanceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
