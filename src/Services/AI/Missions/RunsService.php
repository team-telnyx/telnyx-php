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
     * Starts a new run of the specified mission and returns the created run object. Track its progress through the run detail, plan, and events endpoints.
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
     * Returns the full details of a single run, including its current status. Use this to poll an in-flight run or inspect the outcome of a completed one.
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
     * Updates a run's status and/or result and returns the updated run object. Typically used by executing agents to report progress or record the final outcome.
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
     * Returns a paginated list of runs for the specified mission, optionally filtered by run status, so you can track the mission's execution history over time.
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
     * Cancels a running or paused run and returns the updated run object. A cancelled run stops executing; start a new run to execute the mission again.
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
     * Returns a paginated list of recent runs across every mission in your organization, optionally filtered by run status. Useful for monitoring overall mission activity without querying each mission individually.
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
     * Pauses a currently running run and returns the updated run object. Execution halts until the run is resumed.
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
     * Resumes a previously paused run and returns the updated run object, letting execution continue from where it was paused.
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
