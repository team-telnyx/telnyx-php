<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Events\EventData;
use Telnyx\AI\Missions\Runs\Events\EventResponse;
use Telnyx\AI\Missions\Runs\Events\EventType;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\Runs\EventsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
    }

    /**
     * @api
     *
     * Returns a paginated list of events logged for the specified run, filterable by event type, plan step, and agent, so you can reconstruct exactly what happened during execution.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'missionID' => $missionID,
                'agentID' => $agentID,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'stepID' => $stepID,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a single event logged for the specified run, including its type and payload.
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
    ): EventResponse {
        $params = Util::removeNulls(['missionID' => $missionID, 'runID' => $runID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEventDetails($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Logs a new event against the specified run and returns the created event. Events form the run's audit trail and can reference a plan step or agent.
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $summary Body param
     * @param EventType|value-of<EventType> $type Body param
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
        EventType|string $type,
        ?string $agentID = null,
        ?string $idempotencyKey = null,
        ?array $payload = null,
        ?string $stepID = null,
        RequestOptions|array|null $requestOptions = null,
    ): EventResponse {
        $params = Util::removeNulls(
            [
                'missionID' => $missionID,
                'summary' => $summary,
                'type' => $type,
                'agentID' => $agentID,
                'idempotencyKey' => $idempotencyKey,
                'payload' => $payload,
                'stepID' => $stepID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->log($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
