<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Teams\AgentGatewayTeamResponse;
use Telnyx\AgentGateways\Teams\TeamListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TeamsContract
{
    /**
     * @api
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
    ): AgentGatewayTeamResponse;

    /**
     * @api
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
    ): AgentGatewayTeamResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): TeamListResponse;

    /**
     * @api
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
    ): AgentGatewayTeamResponse;
}
