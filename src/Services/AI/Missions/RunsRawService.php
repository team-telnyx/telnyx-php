<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\AI\Missions\Runs\MissionRunData;
use Telnyx\AI\Missions\Runs\MissionRunResponse;
use Telnyx\AI\Missions\Runs\RunCancelRunParams;
use Telnyx\AI\Missions\Runs\RunCreateParams;
use Telnyx\AI\Missions\Runs\RunListParams;
use Telnyx\AI\Missions\Runs\RunListRunsParams;
use Telnyx\AI\Missions\Runs\RunPauseRunParams;
use Telnyx\AI\Missions\Runs\RunResumeRunParams;
use Telnyx\AI\Missions\Runs\RunRetrieveParams;
use Telnyx\AI\Missions\Runs\RunStatus;
use Telnyx\AI\Missions\Runs\RunUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\RunsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RunsRawService implements RunsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Starts a new run of the specified mission and returns the created run object. Track its progress through the run detail, plan, and events endpoints.
     *
     * @param string $missionID unique identifier of the mission
     * @param array{
     *   input?: array<string,mixed>, metadata?: array<string,mixed>
     * }|RunCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionRunResponse>
     *
     * @throws APIException
     */
    public function create(
        string $missionID,
        array|RunCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs', $missionID],
            body: (object) $parsed,
            options: $options,
            convert: MissionRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the full details of a single run, including its current status. Use this to poll an in-flight run or inspect the outcome of a completed one.
     *
     * @param string $runID unique identifier of the run
     * @param array{missionID: string}|RunRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionRunResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        array|RunRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/runs/%2$s', $missionID, $runID],
            options: $options,
            convert: MissionRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a run's status and/or result and returns the updated run object. Typically used by executing agents to report progress or record the final outcome.
     *
     * @param string $runID path param: Unique identifier of the run
     * @param array{
     *   missionID: string,
     *   error?: string,
     *   metadata?: array<string,mixed>,
     *   resultPayload?: array<string,mixed>,
     *   resultSummary?: string,
     *   status?: RunStatus|value-of<RunStatus>,
     * }|RunUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionRunResponse>
     *
     * @throws APIException
     */
    public function update(
        string $runID,
        array|RunUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/missions/%1$s/runs/%2$s', $missionID, $runID],
            body: (object) array_diff_key($parsed, array_flip(['missionID'])),
            options: $options,
            convert: MissionRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of runs for the specified mission, optionally filtered by run status, so you can track the mission's execution history over time.
     *
     * @param string $missionID unique identifier of the mission
     * @param array{
     *   pageNumber?: int, pageSize?: int, status?: string
     * }|RunListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MissionRunData>>
     *
     * @throws APIException
     */
    public function list(
        string $missionID,
        array|RunListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/runs', $missionID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MissionRunData::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Cancels a running or paused run and returns the updated run object. A cancelled run stops executing; start a new run to execute the mission again.
     *
     * @param string $runID unique identifier of the run
     * @param array{missionID: string}|RunCancelRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionRunResponse>
     *
     * @throws APIException
     */
    public function cancelRun(
        string $runID,
        array|RunCancelRunParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunCancelRunParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/cancel', $missionID, $runID],
            options: $options,
            convert: MissionRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of recent runs across every mission in your organization, optionally filtered by run status. Useful for monitoring overall mission activity without querying each mission individually.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, status?: string
     * }|RunListRunsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MissionRunData>>
     *
     * @throws APIException
     */
    public function listRuns(
        array|RunListRunsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunListRunsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/missions/runs',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MissionRunData::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Pauses a currently running run and returns the updated run object. Execution halts until the run is resumed.
     *
     * @param string $runID unique identifier of the run
     * @param array{missionID: string}|RunPauseRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionRunResponse>
     *
     * @throws APIException
     */
    public function pauseRun(
        string $runID,
        array|RunPauseRunParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunPauseRunParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/pause', $missionID, $runID],
            options: $options,
            convert: MissionRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Resumes a previously paused run and returns the updated run object, letting execution continue from where it was paused.
     *
     * @param string $runID unique identifier of the run
     * @param array{missionID: string}|RunResumeRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionRunResponse>
     *
     * @throws APIException
     */
    public function resumeRun(
        string $runID,
        array|RunResumeRunParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RunResumeRunParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/resume', $missionID, $runID],
            options: $options,
            convert: MissionRunResponse::class,
        );
    }
}
