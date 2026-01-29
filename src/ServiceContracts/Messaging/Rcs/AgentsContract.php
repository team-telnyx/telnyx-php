<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging\Rcs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Messaging\Rcs\Agents\AgentListParams\Page;
use Telnyx\RcsAgents\RcsAgent;
use Telnyx\RcsAgents\RcsAgentResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\Messaging\Rcs\Agents\AgentListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AgentsContract
{
    /**
     * @api
     *
     * @param string $id RCS agent ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RcsAgentResponse;

    /**
     * @api
     *
     * @param string $id RCS agent ID
     * @param string|null $profileID Messaging profile ID associated with the RCS Agent
     * @param string|null $webhookFailoverURL Failover URL to receive RCS events
     * @param string|null $webhookURL URL to receive RCS events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $profileID = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): RcsAgentResponse;

    /**
     * @api
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RcsAgent>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination;
}
