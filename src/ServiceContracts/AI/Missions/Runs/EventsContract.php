<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Events\EventData;
use Telnyx\AI\Missions\Runs\Events\EventGetEventDetailsResponse;
use Telnyx\AI\Missions\Runs\Events\EventLogParams\Type;
use Telnyx\AI\Missions\Runs\Events\EventLogResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $agentID query param: Filter results by agent id
     * @param int $pageNumber Query param: Page number (1-based)
     * @param int $pageSize Query param: Number of items per page
     * @param string $stepID query param: Filter results by step id
     * @param string $type query param: Filter results by type
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EventData>
     *
     * @throws APIException
     */
    public function list(
        string $runID,
        string $missionID,
        ?string $agentID = null,
        int $pageNumber = 1,
        int $pageSize = 50,
        ?string $stepID = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $eventID unique identifier of the event
     * @param string $missionID unique identifier of the mission
     * @param string $runID unique identifier of the run
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEventDetails(
        string $eventID,
        string $missionID,
        string $runID,
        RequestOptions|array|null $requestOptions = null,
    ): EventGetEventDetailsResponse;

    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $summary Body param
     * @param Type|value-of<Type> $type Body param
     * @param string $agentID Body param
     * @param string $idempotencyKey Body param: Prevents duplicate events on retry
     * @param array<string,mixed> $payload Body param
     * @param string $stepID Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function log(
        string $runID,
        string $missionID,
        string $summary,
        Type|string $type,
        ?string $agentID = null,
        ?string $idempotencyKey = null,
        ?array $payload = null,
        ?string $stepID = null,
        RequestOptions|array|null $requestOptions = null,
    ): EventLogResponse;
}
