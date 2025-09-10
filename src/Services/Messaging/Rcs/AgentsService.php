<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging\Rcs;

use Telnyx\Client;
use Telnyx\Messaging\Rcs\Agents\AgentListParams;
use Telnyx\Messaging\Rcs\Agents\AgentListParams\Page;
use Telnyx\Messaging\Rcs\Agents\AgentListResponse;
use Telnyx\Messaging\Rcs\Agents\AgentUpdateParams;
use Telnyx\RcsAgents\RcsAgentResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\Rcs\AgentsContract;

use const Telnyx\Core\OMIT as omit;

final class AgentsService implements AgentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve an RCS agent
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RcsAgentResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging/rcs/agents/%1$s', $id],
            options: $requestOptions,
            convert: RcsAgentResponse::class,
        );
    }

    /**
     * @api
     *
     * Modify an RCS agent
     *
     * @param string|null $profileID Messaging profile ID associated with the RCS Agent
     * @param string|null $webhookFailoverURL Failover URL to receive RCS events
     * @param string|null $webhookURL URL to receive RCS events
     */
    public function update(
        string $id,
        $profileID = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): RcsAgentResponse {
        [$parsed, $options] = AgentUpdateParams::parseRequest(
            [
                'profileID' => $profileID,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['messaging/rcs/agents/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: RcsAgentResponse::class,
        );
    }

    /**
     * @api
     *
     * List all RCS agents
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AgentListResponse {
        [$parsed, $options] = AgentListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'messaging/rcs/agents',
            query: $parsed,
            options: $options,
            convert: AgentListResponse::class,
        );
    }
}
