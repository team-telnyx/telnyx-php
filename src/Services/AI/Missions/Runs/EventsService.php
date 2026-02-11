<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Events\EventGetEventDetailsResponse;
use Telnyx\AI\Missions\Runs\Events\EventListResponse;
use Telnyx\AI\Missions\Runs\Events\EventLogParams\Type;
use Telnyx\AI\Missions\Runs\Events\EventLogResponse;
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
     * List events for a run (paginated)
     *
     * @param string $runID Path param
     * @param string $missionID Path param
     * @param string $agentID Query param
     * @param int $pageNumber Query param: Page number (1-based)
     * @param int $pageSize Query param: Number of items per page
     * @param string $stepID Query param
     * @param string $type Query param
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EventListResponse>
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
     * Get details of a specific event
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEventDetails(
        string $eventID,
        string $missionID,
        string $runID,
        RequestOptions|array|null $requestOptions = null,
    ): EventGetEventDetailsResponse {
        $params = Util::removeNulls(['missionID' => $missionID, 'runID' => $runID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEventDetails($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Log an event for a run
     *
     * @param string $runID Path param
     * @param string $missionID Path param
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
    ): EventLogResponse {
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
