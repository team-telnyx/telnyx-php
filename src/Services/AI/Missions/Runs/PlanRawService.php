<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions\Runs;

use Telnyx\AI\Missions\Runs\Plan\CreatePlanStepRequest;
use Telnyx\AI\Missions\Runs\Plan\PlanAddStepsToPlanParams;
use Telnyx\AI\Missions\Runs\Plan\PlanCreateParams;
use Telnyx\AI\Missions\Runs\Plan\PlanGetResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanGetStepDetailsParams;
use Telnyx\AI\Missions\Runs\Plan\PlanRetrieveParams;
use Telnyx\AI\Missions\Runs\Plan\PlanStepResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanStepsCreatedResponse;
use Telnyx\AI\Missions\Runs\Plan\PlanUpdateStepParams;
use Telnyx\AI\Missions\Runs\Plan\StepStatus;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\Runs\PlanRawContract;

/**
 * @phpstan-import-type CreatePlanStepRequestShape from \Telnyx\AI\Missions\Runs\Plan\CreatePlanStepRequest
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PlanRawService implements PlanRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create the initial plan for a run
     *
     * @param string $runID path param: Unique identifier of the run
     * @param array{
     *   missionID: string,
     *   steps: list<CreatePlanStepRequest|CreatePlanStepRequestShape>,
     * }|PlanCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanStepsCreatedResponse>
     *
     * @throws APIException
     */
    public function create(
        string $runID,
        array|PlanCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlanCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/plan', $missionID, $runID],
            body: (object) array_diff_key($parsed, array_flip(['missionID'])),
            options: $options,
            convert: PlanStepsCreatedResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the plan (all steps) for a run
     *
     * @param string $runID unique identifier of the run
     * @param array{missionID: string}|PlanRetrieveParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PlanRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/runs/%2$s/plan', $missionID, $runID],
            options: $options,
            convert: PlanGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Add one or more steps to an existing plan
     *
     * @param string $runID path param: Unique identifier of the run
     * @param array{
     *   missionID: string,
     *   steps: list<CreatePlanStepRequest|CreatePlanStepRequestShape>,
     * }|PlanAddStepsToPlanParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanStepsCreatedResponse>
     *
     * @throws APIException
     */
    public function addStepsToPlan(
        string $runID,
        array|PlanAddStepsToPlanParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlanAddStepsToPlanParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/runs/%2$s/plan/steps', $missionID, $runID],
            body: (object) array_diff_key($parsed, array_flip(['missionID'])),
            options: $options,
            convert: PlanStepsCreatedResponse::class,
        );
    }

    /**
     * @api
     *
     * Get details of a specific plan step
     *
     * @param string $stepID unique identifier of the step
     * @param array{missionID: string, runID: string}|PlanGetStepDetailsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanStepResponse>
     *
     * @throws APIException
     */
    public function getStepDetails(
        string $stepID,
        array|PlanGetStepDetailsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlanGetStepDetailsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);
        $runID = $parsed['runID'];
        unset($parsed['runID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/missions/%1$s/runs/%2$s/plan/steps/%3$s',
                $missionID,
                $runID,
                $stepID,
            ],
            options: $options,
            convert: PlanStepResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the status of a plan step
     *
     * @param string $stepID path param: Unique identifier of the step
     * @param array{
     *   missionID: string,
     *   runID: string,
     *   metadata?: array<string,mixed>,
     *   status?: StepStatus|value-of<StepStatus>,
     * }|PlanUpdateStepParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlanStepResponse>
     *
     * @throws APIException
     */
    public function updateStep(
        string $stepID,
        array|PlanUpdateStepParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlanUpdateStepParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);
        $runID = $parsed['runID'];
        unset($parsed['runID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'ai/missions/%1$s/runs/%2$s/plan/steps/%3$s',
                $missionID,
                $runID,
                $stepID,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['missionID', 'runID'])
            ),
            options: $options,
            convert: PlanStepResponse::class,
        );
    }
}
