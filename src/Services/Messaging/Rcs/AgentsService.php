<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging\Rcs;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\Agents\AgentListParams;
use Telnyx\Messaging\Rcs\Agents\AgentListResponse;
use Telnyx\Messaging\Rcs\Agents\AgentUpdateParams;
use Telnyx\RcsAgents\RcsAgentResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\Rcs\AgentsContract;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RcsAgentResponse {
        /** @var BaseResponse<RcsAgentResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['messaging/rcs/agents/%1$s', $id],
            options: $requestOptions,
            convert: RcsAgentResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Modify an RCS agent
     *
     * @param array{
     *   profileID?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }|AgentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AgentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcsAgentResponse {
        [$parsed, $options] = AgentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RcsAgentResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['messaging/rcs/agents/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: RcsAgentResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all RCS agents
     *
     * @param array{page?: array{number?: int, size?: int}}|AgentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AgentListParams $params,
        ?RequestOptions $requestOptions = null
    ): AgentListResponse {
        [$parsed, $options] = AgentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AgentListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'messaging/rcs/agents',
            query: $parsed,
            options: $options,
            convert: AgentListResponse::class,
        );

        return $response->parse();
    }
}
