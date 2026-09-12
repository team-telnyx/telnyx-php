<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging\Rcs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\Rcs\Agents\RcsAgent;
use Telnyx\Rcs\Agents\RcsAgentResponse;
use Telnyx\RequestOptions;

/**
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
     * @param string|Omitted|null $profileID Messaging profile ID associated with the RCS Agent
     * @param string|Omitted|null $webhookFailoverURL Failover URL to receive RCS events
     * @param string|Omitted|null $webhookURL URL to receive RCS events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string|Omitted|null $profileID = Omitted::VALUE,
        string|Omitted|null $webhookFailoverURL = Omitted::VALUE,
        string|Omitted|null $webhookURL = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): RcsAgentResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RcsAgent>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
