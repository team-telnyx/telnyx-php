<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\Keys\AgentGatewayKeyResponse;
use Telnyx\AgentGateways\Keys\KeyListResponse;
use Telnyx\AgentGateways\Keys\KeyNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KeysContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string|Omitted|null $budgetResetsEvery how often the spend resets: a number and a unit, `s`, `m`, `h`, or `d`
     * @param string|Omitted|null $expiresIn how long until the key stops working: a number and a unit, `s`, `m`, `h`, or `d`
     * @param float|Omitted|null $maxBudget the most the key may spend, in USD
     * @param int|Omitted|null $maxParallelRequests the most requests the key may have in flight at once
     * @param list<string>|Omitted|null $models The models the key may use. Leave it out to allow every model.
     * @param string|Omitted|null $name a label for people, unique on the instance
     * @param int|Omitted|null $requestsPerMinute the most requests the key may make per minute
     * @param string|Omitted|null $teamID A team on the instance. The key shares the team's model list, budget, and rate limits.
     * @param int|Omitted|null $tokensPerMinute the most tokens the key may use per minute
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        string|Omitted|null $expiresIn = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        array|Omitted|null $models = Omitted::VALUE,
        string|Omitted|null $name = Omitted::VALUE,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        string|Omitted|null $teamID = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): KeyNewResponse;

    /**
     * @api
     *
     * @param string $keyID path param: The key's `id`, a 64-character hash the instance stores in place of the key
     * @param string $instanceID path param: The Agent Gateway's `id`
     * @param bool $blocked body param: `true` makes the instance refuse the key; `false` lets it through again
     * @param string|Omitted|null $budgetResetsEvery body param: How often the spend resets
     * @param string|Omitted|null $expiresIn body param: How long from now until the key stops working
     * @param float|Omitted|null $maxBudget body param: The most the key may spend, in USD
     * @param int|Omitted|null $maxParallelRequests body param: The most requests the key may have in flight at once
     * @param list<string> $models Body param: The models the key may use. `[]` allows every model.
     * @param string $name body param: A label for people
     * @param int|Omitted|null $requestsPerMinute body param: The most requests the key may make per minute
     * @param string|Omitted|null $teamID body param: Move the key to this team, or `null` to leave its team
     * @param int|Omitted|null $tokensPerMinute body param: The most tokens the key may use per minute
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $keyID,
        string $instanceID,
        ?bool $blocked = null,
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        string|Omitted|null $expiresIn = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        ?array $models = null,
        ?string $name = null,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        string|Omitted|null $teamID = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayKeyResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string $teamID only the keys of this team
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        ?string $teamID = null,
        RequestOptions|array|null $requestOptions = null,
    ): KeyListResponse;

    /**
     * @api
     *
     * @param string $keyID the key's `id`, a 64-character hash the instance stores in place of the key
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $keyID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayKeyResponse;
}
