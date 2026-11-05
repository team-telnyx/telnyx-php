<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\Teams\AgentGatewayTeamResponse;
use Telnyx\AgentGateways\Teams\TeamCreateParams;
use Telnyx\AgentGateways\Teams\TeamDeleteParams;
use Telnyx\AgentGateways\Teams\TeamListResponse;
use Telnyx\AgentGateways\Teams\TeamUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\TeamsRawContract;

/**
 * Teams on an instance: shared model lists, budgets, and rate limits.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TeamsRawService implements TeamsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a team on the instance. A team is a model list, a budget, and rate limits that its keys share. Names need not be unique; the `id` identifies the team. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   name: string,
     *   budgetResetsEvery?: string|null,
     *   maxBudget?: float|null,
     *   models?: list<string>|null,
     *   requestsPerMinute?: int|null,
     *   tokensPerMinute?: int|null,
     * }|TeamCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayTeamResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|TeamCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TeamCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/teams', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayTeamResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes a team's settings. A field left out stays as it is, and `null` clears it. `models: []` lifts the model restriction. Setting `blocked` to `true` makes the instance refuse every key in the team with `401`. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $teamID path param: The team's `id`
     * @param array{
     *   instanceID: string,
     *   blocked?: bool,
     *   budgetResetsEvery?: string|null,
     *   maxBudget?: float|null,
     *   models?: list<string>,
     *   name?: string,
     *   requestsPerMinute?: int|null,
     *   tokensPerMinute?: int|null,
     * }|TeamUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayTeamResponse>
     *
     * @throws APIException
     */
    public function update(
        string $teamID,
        array|TeamUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TeamUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['agent_gateways/%1$s/teams/%2$s', $instanceID, $teamID],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayTeamResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the instance's teams. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TeamListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/teams', $instanceID],
            options: $requestOptions,
            convert: TeamListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a team that has no keys and returns it. A team that still has keys answers `409`; delete or move its keys first. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $teamID the team's `id`
     * @param array{instanceID: string}|TeamDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayTeamResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $teamID,
        array|TeamDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TeamDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s/teams/%2$s', $instanceID, $teamID],
            options: $options,
            convert: AgentGatewayTeamResponse::class,
        );
    }
}
