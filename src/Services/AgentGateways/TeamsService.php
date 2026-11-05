<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\Teams\AgentGatewayTeamResponse;
use Telnyx\AgentGateways\Teams\TeamListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\TeamsContract;
use Telnyx\Services\AgentGateways\Teams\ToolPermissionsService;

/**
 * Teams on an instance: shared model lists, budgets, and rate limits.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TeamsService implements TeamsContract
{
    /**
     * @api
     */
    public TeamsRawService $raw;

    /**
     * @api
     */
    public ToolPermissionsService $toolPermissions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TeamsRawService($client);
        $this->toolPermissions = new ToolPermissionsService($client);
    }

    /**
     * @api
     *
     * Creates a team on the instance. A team is a model list, a budget, and rate limits that its keys share. Names need not be unique; the `id` identifies the team. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string $name a label for people
     * @param string|Omitted|null $budgetResetsEvery how often the spend resets: a number and a unit, `s`, `m`, `h`, or `d`
     * @param float|Omitted|null $maxBudget the most the team's keys may spend together, in USD
     * @param list<string>|Omitted|null $models The models the team's keys may use. Leave it out to allow every model.
     * @param int|Omitted|null $requestsPerMinute the most requests the team's keys may make per minute, together
     * @param int|Omitted|null $tokensPerMinute the most tokens the team's keys may use per minute, together
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        string $name,
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        array|Omitted|null $models = Omitted::VALUE,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayTeamResponse {
        $params = array_filter(
            [
                'name' => $name,
                'budgetResetsEvery' => $budgetResetsEvery,
                'maxBudget' => $maxBudget,
                'models' => $models,
                'requestsPerMinute' => $requestsPerMinute,
                'tokensPerMinute' => $tokensPerMinute,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($instanceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Changes a team's settings. A field left out stays as it is, and `null` clears it. `models: []` lifts the model restriction. Setting `blocked` to `true` makes the instance refuse every key in the team with `401`. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $teamID path param: The team's `id`
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param bool $blocked body param: `true` makes the instance refuse every key in the team; `false` lets them through again
     * @param string|Omitted|null $budgetResetsEvery body param: How often the spend resets
     * @param float|Omitted|null $maxBudget body param: The most the team's keys may spend together, in USD
     * @param list<string> $models Body param: The models the team's keys may use. `[]` allows every model.
     * @param string $name body param: A label for people
     * @param int|Omitted|null $requestsPerMinute body param: The most requests the team's keys may make per minute, together
     * @param int|Omitted|null $tokensPerMinute body param: The most tokens the team's keys may use per minute, together
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $teamID,
        string $instanceID,
        ?bool $blocked = null,
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        ?array $models = null,
        ?string $name = null,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayTeamResponse {
        $params = array_filter(
            [
                'instanceID' => $instanceID,
                'blocked' => $blocked ?? Omitted::VALUE,
                'budgetResetsEvery' => $budgetResetsEvery,
                'maxBudget' => $maxBudget,
                'models' => $models ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'requestsPerMinute' => $requestsPerMinute,
                'tokensPerMinute' => $tokensPerMinute,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($teamID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the instance's teams. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): TeamListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a team that has no keys and returns it. A team that still has keys answers `409`; delete or move its keys first. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $teamID the team's `id`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $teamID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayTeamResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($teamID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
