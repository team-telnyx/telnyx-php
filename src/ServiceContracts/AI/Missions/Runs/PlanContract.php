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
     * @param string $runID Path param
     * @param string $missionID Path param
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
     * @param string $runID Path param
     * @param string $missionID Path param
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
     * @param string $stepID Path param
     * @param string $missionID Path param
     * @param string $runID Path param
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
