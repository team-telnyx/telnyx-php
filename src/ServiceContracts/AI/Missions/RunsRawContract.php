<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions;

use Telnyx\AI\Missions\Runs\MissionRunData;
use Telnyx\AI\Missions\Runs\MissionRunResponse;
use Telnyx\AI\Missions\Runs\RunCancelRunParams;
use Telnyx\AI\Missions\Runs\RunCreateParams;
use Telnyx\AI\Missions\Runs\RunListParams;
use Telnyx\AI\Missions\Runs\RunListRunsParams;
use Telnyx\AI\Missions\Runs\RunPauseRunParams;
use Telnyx\AI\Missions\Runs\RunResumeRunParams;
use Telnyx\AI\Missions\Runs\RunRetrieveParams;
use Telnyx\AI\Missions\Runs\RunUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RunsRawContract
{
    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param array<string,mixed>|RunCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID unique identifier of the run
     * @param array<string,mixed>|RunRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param array<string,mixed>|RunUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param array<string,mixed>|RunListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID unique identifier of the run
     * @param array<string,mixed>|RunCancelRunParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RunListRunsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MissionRunData>>
     *
     * @throws APIException
     */
    public function listRuns(
        array|RunListRunsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID unique identifier of the run
     * @param array<string,mixed>|RunPauseRunParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID unique identifier of the run
     * @param array<string,mixed>|RunResumeRunParams $params
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
    ): BaseResponse;
}
