<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\AI\Missions\Runs\RunCancelRunParams;
use Telnyx\AI\Missions\Runs\RunCancelRunResponse;
use Telnyx\AI\Missions\Runs\RunCreateParams;
use Telnyx\AI\Missions\Runs\RunGetResponse;
use Telnyx\AI\Missions\Runs\RunListParams;
use Telnyx\AI\Missions\Runs\RunListResponse;
use Telnyx\AI\Missions\Runs\RunListRunsParams;
use Telnyx\AI\Missions\Runs\RunListRunsResponse;
use Telnyx\AI\Missions\Runs\RunNewResponse;
use Telnyx\AI\Missions\Runs\RunPauseRunParams;
use Telnyx\AI\Missions\Runs\RunPauseRunResponse;
use Telnyx\AI\Missions\Runs\RunResumeRunParams;
use Telnyx\AI\Missions\Runs\RunResumeRunResponse;
use Telnyx\AI\Missions\Runs\RunRetrieveParams;
use Telnyx\AI\Missions\Runs\RunUpdateParams;
use Telnyx\AI\Missions\Runs\RunUpdateParams\Status;
use Telnyx\AI\Missions\Runs\RunUpdateResponse;
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
     * Start a new run for a mission
     *
     * @param array{
     *   input?: array<string,mixed>, metadata?: array<string,mixed>
     * }|RunCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RunNewResponse>
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
            convert: RunNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get details of a specific run
     *
     * @param array{missionID: string}|RunRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RunGetResponse>
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
            convert: RunGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update run status and/or result
     *
     * @param string $runID Path param
     * @param array{
     *   missionID: string,
     *   error?: string,
     *   metadata?: array<string,mixed>,
     *   resultPayload?: array<string,mixed>,
     *   resultSummary?: string,
     *   status?: Status|value-of<Status>,
     * }|RunUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RunUpdateResponse>
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
            convert: RunUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all runs for a specific mission
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, status?: string
     * }|RunListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RunListResponse>>
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
            convert: RunListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Cancel a running or paused run
     *
     * @param array{missionID: string}|RunCancelRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RunCancelRunResponse>
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
            convert: RunCancelRunResponse::class,
        );
    }

    /**
     * @api
     *
     * List recent runs across all missions
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, status?: string
     * }|RunListRunsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RunListRunsResponse>>
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
            convert: RunListRunsResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Pause a running run
     *
     * @param array{missionID: string}|RunPauseRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RunPauseRunResponse>
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
            convert: RunPauseRunResponse::class,
        );
    }

    /**
     * @api
     *
     * Resume a paused run
     *
     * @param array{missionID: string}|RunResumeRunParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RunResumeRunResponse>
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
            convert: RunResumeRunResponse::class,
        );
    }
}
