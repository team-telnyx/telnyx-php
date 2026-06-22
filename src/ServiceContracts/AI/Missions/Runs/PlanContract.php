<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Plan\CreatePlanStepRequest;
use Telnyx\AI\Missions\Runs\Plan\PlanGetResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanStepResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanStepsCreatedResponse;
use Telnyx\AI\Missions\Runs\Plan\StepStatus;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CreatePlanStepRequestShape from \Telnyx\AI\Missions\Runs\Plan\CreatePlanStepRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PlanContract
{
    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param list<CreatePlanStepRequest|CreatePlanStepRequestShape> $steps Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $runID,
        string $missionID,
        array $steps,
        RequestOptions|array|null $requestOptions = null,
    ): PlanStepsCreatedResponse;

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
    ): PlanGetResponse;

    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param list<CreatePlanStepRequest|CreatePlanStepRequestShape> $steps Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addStepsToPlan(
        string $runID,
        string $missionID,
        array $steps,
        RequestOptions|array|null $requestOptions = null,
    ): PlanStepsCreatedResponse;

    /**
     * @api
     *
     * @param string $stepID unique identifier of the step
     * @param string $missionID unique identifier of the mission
     * @param string $runID unique identifier of the run
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStepDetails(
        string $stepID,
        string $missionID,
        string $runID,
        RequestOptions|array|null $requestOptions = null,
    ): PlanStepResponse;

    /**
     * @api
     *
     * @param string $stepID path param: Unique identifier of the step
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $runID path param: Unique identifier of the run
     * @param array<string,mixed> $metadata Body param
     * @param StepStatus|value-of<StepStatus> $status Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStep(
        string $stepID,
        string $missionID,
        string $runID,
        ?array $metadata = null,
        StepStatus|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): PlanStepResponse;
}
