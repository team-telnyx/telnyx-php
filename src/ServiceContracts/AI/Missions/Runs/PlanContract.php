<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanCreateParams\Step;
use Telnyx\AI\Missions\Runs\Plan\PlanGetResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanGetStepDetailsResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanNewResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepParams\Status;
use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type StepShape from \Telnyx\AI\Missions\Runs\Plan\PlanCreateParams\Step
 * @phpstan-import-type StepShape from \Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanParams\Step as StepShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PlanContract
{
    /**
     * @api
     *
     * @param string $runID path param: Unique identifier of the run
     * @param string $missionID path param: Unique identifier of the mission
     * @param list<Step|StepShape> $steps Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $runID,
        string $missionID,
        array $steps,
        RequestOptions|array|null $requestOptions = null,
    ): PlanNewResponse;

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
     * @param list<\Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanParams\Step|StepShape1> $steps Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addStepsToPlan(
        string $runID,
        string $missionID,
        array $steps,
        RequestOptions|array|null $requestOptions = null,
    ): PlanAddStepsToPlanResponse;

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
    ): PlanGetStepDetailsResponse;

    /**
     * @api
     *
     * @param string $stepID path param: Unique identifier of the step
     * @param string $missionID path param: Unique identifier of the mission
     * @param string $runID path param: Unique identifier of the run
     * @param array<string,mixed> $metadata Body param
     * @param Status|value-of<Status> $status Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStep(
        string $stepID,
        string $missionID,
        string $runID,
        ?array $metadata = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): PlanUpdateStepResponse;
}
