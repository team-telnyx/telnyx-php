<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging\Rcs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging\Rcs\Agents\AgentListResponse;
use Telnyx\RcsAgents\RcsAgentResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\Rcs\AgentsContract;

final class AgentsService implements AgentsContract
{
    /**
     * @api
     */
    public AgentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AgentsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve an RCS agent
     *
     * @param string $id RCS agent ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RcsAgentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Modify an RCS agent
     *
     * @param string $id RCS agent ID
     * @param string|null $profileID Messaging profile ID associated with the RCS Agent
     * @param string|null $webhookFailoverURL Failover URL to receive RCS events
     * @param string|null $webhookURL URL to receive RCS events
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $profileID = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): RcsAgentResponse {
        $params = Util::removeNulls(
            [
                'profileID' => $profileID,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all RCS agents
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): AgentListResponse {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
