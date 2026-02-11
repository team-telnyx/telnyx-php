<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions;

use Telnyx\AI\Missions\Runs\RunCancelRunResponse;
use Telnyx\AI\Missions\Runs\RunGetResponse;
use Telnyx\AI\Missions\Runs\RunListResponse;
use Telnyx\AI\Missions\Runs\RunListRunsResponse;
use Telnyx\AI\Missions\Runs\RunNewResponse;
use Telnyx\AI\Missions\Runs\RunPauseRunResponse;
use Telnyx\AI\Missions\Runs\RunResumeRunResponse;
use Telnyx\AI\Missions\Runs\RunUpdateParams\Status;
use Telnyx\AI\Missions\Runs\RunUpdateResponse;
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
    ): RunNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): RunGetResponse;

    /**
     * @api
     *
     * @param string $runID Path param
     * @param string $missionID Path param
     * @param string $error Body param
     * @param array<string,mixed> $metadata Body param
     * @param array<string,mixed> $resultPayload Body param
     * @param string $resultSummary Body param
     * @param Status|value-of<Status> $status Body param
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
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): RunUpdateResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RunListResponse>
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancelRun(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): RunCancelRunResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RunListRunsResponse>
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pauseRun(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): RunPauseRunResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resumeRun(
        string $runID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): RunResumeRunResponse;
}
