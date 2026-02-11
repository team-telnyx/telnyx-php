<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanParams;
use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanCreateParams;
use Telnyx\AI\Missions\Runs\Plan\PlanGetResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanGetStepDetailsParams;
use Telnyx\AI\Missions\Runs\Plan\PlanGetStepDetailsResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanNewResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanRetrieveParams;
use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepParams;
use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PlanRawContract
{
    /**
     * @api
     *
     * @param string $runID Path param
     * @param array<string,mixed>|PlanCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $runID,
        array|PlanCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlanRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $runID,
        array|PlanRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $runID Path param
     * @param array<string,mixed>|PlanAddStepsToPlanParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanAddStepsToPlanResponse>
     *
     * @throws APIException
     */
    public function addStepsToPlan(
        string $runID,
        array|PlanAddStepsToPlanParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlanGetStepDetailsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanGetStepDetailsResponse>
     *
     * @throws APIException
     */
    public function getStepDetails(
        string $stepID,
        array|PlanGetStepDetailsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $stepID Path param
     * @param array<string,mixed>|PlanUpdateStepParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanUpdateStepResponse>
     *
     * @throws APIException
     */
    public function updateStep(
        string $stepID,
        array|PlanUpdateStepParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
