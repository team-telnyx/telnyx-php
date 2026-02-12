<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions;

use Telnyx\AI\Missions\Runs\MissionRunData;
use Telnyx\AI\Missions\Runs\RunCancelRunParams;
use Telnyx\AI\Missions\Runs\RunCancelRunResponse;
use Telnyx\AI\Missions\Runs\RunCreateParams;
use Telnyx\AI\Missions\Runs\RunGetResponse;
use Telnyx\AI\Missions\Runs\RunListParams;
use Telnyx\AI\Missions\Runs\RunListRunsParams;
use Telnyx\AI\Missions\Runs\RunNewResponse;
use Telnyx\AI\Missions\Runs\RunPauseRunParams;
use Telnyx\AI\Missions\Runs\RunPauseRunResponse;
use Telnyx\AI\Missions\Runs\RunResumeRunParams;
use Telnyx\AI\Missions\Runs\RunResumeRunResponse;
use Telnyx\AI\Missions\Runs\RunRetrieveParams;
use Telnyx\AI\Missions\Runs\RunUpdateParams;
use Telnyx\AI\Missions\Runs\RunUpdateResponse;
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
     * @param array<string,mixed>|RunCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RunRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID Path param
     * @param array<string,mixed>|RunUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
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
     * @param array<string,mixed>|RunCancelRunParams $params
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
     * @param array<string,mixed>|RunPauseRunParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RunResumeRunParams $params
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
    ): BaseResponse;
}
