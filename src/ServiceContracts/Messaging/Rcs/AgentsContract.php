<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging\Rcs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Messaging\Rcs\Agents\AgentListParams;
use Telnyx\Messaging\Rcs\Agents\AgentUpdateParams;
use Telnyx\RcsAgents\RcsAgent;
use Telnyx\RcsAgents\RcsAgentResponse;
use Telnyx\RequestOptions;

interface AgentsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RcsAgentResponse;

    /**
     * @api
     *
     * @param array<mixed>|AgentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AgentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcsAgentResponse;

    /**
     * @api
     *
     * @param array<mixed>|AgentListParams $params
     *
     * @return DefaultPagination<RcsAgent>
     *
     * @throws APIException
     */
    public function list(
        array|AgentListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
