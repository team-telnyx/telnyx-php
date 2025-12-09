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
use Telnyx\ServiceContracts\Messaging\Rcs\AgentsRawContract;

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
     * Retrieve an RCS agent
     *
     * @param string $id RCS agent ID
     *
     * @return BaseResponse<RcsAgentResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id RCS agent ID
     * @param array{
     *   profileID?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }|AgentUpdateParams $params
     *
     * @return BaseResponse<RcsAgentResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AgentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{page?: array{number?: int, size?: int}}|AgentListParams $params
     *
     * @return BaseResponse<AgentListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AgentListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = AgentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging/rcs/agents',
            query: $parsed,
            options: $options,
            convert: AgentListResponse::class,
        );
    }
}
