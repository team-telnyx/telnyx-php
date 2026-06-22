<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\AI\Missions\Runs\MissionRunData;
use Telnyx\AI\Missions\Runs\MissionRunResponse;
use Telnyx\AI\Missions\Runs\RunStatus;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\RunsContract;
use Telnyx\Services\AI\Missions\Runs\EventsService;
use Telnyx\Services\AI\Missions\Runs\PlanService;
use Telnyx\Services\AI\Missions\Runs\TelnyxAgentsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RunsService implements RunsContract
{
    /**
     * @api
     */
    public RunsRawService $raw;

    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public PlanService $plan;

    /**
     * @api
     */
    public TelnyxAgentsService $telnyxAgents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RunsRawService($client);
        $this->events = new EventsService($client);
        $this->plan = new PlanService($client);
        $this->telnyxAgents = new TelnyxAgentsService($client);
    }

    /**
     * @api
     *
     * Start a new run for a mission
     *
     * @param string $missionID unique identifier of the mission
     * @param array<string,mixed> $input
     * @param array<string,mixed> $metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $missionID,
        ?array $input = null,
        ?array $metadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): MissionRunResponse {
        $params = Util::removeNulls(['input' => $input, 'metadata' => $metadata]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($missionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get details of a specific run
     *
     * @param string $runID unique identifier of the run
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): MissionRunResponse {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update run status and/or result
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $error Body param
     * @param array<string,mixed> $metadata Body param
     * @param array<string,mixed> $resultPayload Body param
     * @param string $resultSummary Body param
     * @param RunStatus|value-of<RunStatus> $status Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $runID,
        string $missionID,
        ?string $error = null,
        ?array $metadata = null,
        ?array $resultPayload = null,
        ?string $resultSummary = null,
        RunStatus|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): MissionRunResponse {
        $params = Util::removeNulls(
            [
                'missionID' => $missionID,
                'error' => $error,
                'metadata' => $metadata,
                'resultPayload' => $resultPayload,
                'resultSummary' => $resultSummary,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all runs for a specific mission
     *
     * @param string $missionID unique identifier of the mission
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param string $status filter results by status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MissionRunData>
     *
     * @throws APIException
     */
    public function list(
        string $missionID,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($missionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancel a running or paused run
     *
     * @param string $runID unique identifier of the run
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancelRun(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): MissionRunResponse {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancelRun($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List recent runs across all missions
     *
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param string $status filter results by status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MissionRunData>
     *
     * @throws APIException
     */
    public function listRuns(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRuns(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause a running run
     *
     * @param string $runID unique identifier of the run
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pauseRun(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): MissionRunResponse {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pauseRun($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resume a paused run
     *
     * @param string $runID unique identifier of the run
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resumeRun(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): MissionRunResponse {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resumeRun($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
