<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging\Rcs;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Messaging\Rcs\Agents\AgentListParams\Page;
use Telnyx\Messaging\Rcs\Agents\AgentListResponse;
use Telnyx\RcsAgents\RcsAgentResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AgentsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RcsAgentResponse;

    /**
     * @api
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
    ): RcsAgentResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return AgentListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AgentListResponse;
}
