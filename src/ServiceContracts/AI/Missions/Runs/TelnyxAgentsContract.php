<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentLinkResponse;
use Telnyx\AI\Missions\Runs\TelnyxAgents\TelnyxAgentListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TelnyxAgentsContract
{
    /**
     * @api
     *
     * @param string $runID unique identifier of the run
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxAgentListResponse;

    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $telnyxAgentID Body param: The Telnyx AI agent ID to link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function link(
        string $runID,
        string $missionID,
        string $telnyxAgentID,
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxAgentLinkResponse;

    /**
     * @api
     *
     * @param string $telnyxAgentID unique identifier of the telnyx agent
     * @param string $missionID unique identifier of the mission
     * @param string $runID unique identifier of the run
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unlink(
        string $telnyxAgentID,
        string $missionID,
        string $runID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
