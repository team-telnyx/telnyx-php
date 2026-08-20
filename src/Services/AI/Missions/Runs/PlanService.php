<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Plan\CreatePlanStepRequest;
use Telnyx\AI\Missions\Runs\Plan\PlanGetResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanStepResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanStepsCreatedResponse;
use Telnyx\AI\Missions\Runs\Plan\StepStatus;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\Runs\PlanContract;

/**
 * @phpstan-import-type CreatePlanStepRequestShape from \Telnyx\AI\Missions\Runs\Plan\CreatePlanStepRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PlanService implements PlanContract
{
    /**
     * @api
     */
    public PlanRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PlanRawService($client);
    }

    /**
     * @api
     *
     * Creates the initial plan for the specified run from the provided steps and returns the created plan steps. Progress is subsequently reported by updating individual steps.
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
    ): PlanStepsCreatedResponse {
        $params = Util::removeNulls(['missionID' => $missionID, 'steps' => $steps]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the plan for the specified run, including all plan steps and their statuses, so you can see how the mission was decomposed and how far execution has progressed.
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
    ): PlanGetResponse {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add one or more steps to an existing plan
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
    ): PlanStepsCreatedResponse {
        $params = Util::removeNulls(['missionID' => $missionID, 'steps' => $steps]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addStepsToPlan($runID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a single plan step within a run's plan, including its status.
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
    ): PlanStepResponse {
        $params = Util::removeNulls(['missionID' => $missionID, 'runID' => $runID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStepDetails($stepID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the status of a single plan step and returns the updated step. Typically called by the executing agent as it works through the plan.
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
    ): PlanStepResponse {
        $params = Util::removeNulls(
            [
                'missionID' => $missionID,
                'runID' => $runID,
                'metadata' => $metadata,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateStep($stepID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
