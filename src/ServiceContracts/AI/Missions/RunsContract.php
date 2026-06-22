<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions;

use Telnyx\AI\Missions\Runs\MissionRunData;
use Telnyx\AI\Missions\Runs\MissionRunResponse;
use Telnyx\AI\Missions\Runs\RunStatus;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RunsContract
{
    /**
     * @api
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
    ): MissionRunResponse;

    /**
     * @api
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
    ): MissionRunResponse;

    /**
     * @api
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
    ): MissionRunResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): MissionRunResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): MissionRunResponse;

    /**
     * @api
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
    ): MissionRunResponse;
}
