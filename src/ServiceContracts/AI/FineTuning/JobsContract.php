<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type HyperparametersShape from \Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JobsContract
{
    /**
     * @api
     *
     * @param string $model the base model that is being fine-tuned
     * @param string $trainingFile the storage bucket or object used for training
     * @param Hyperparameters|HyperparametersShape $hyperparameters the hyperparameters used for the fine-tuning job
     * @param string $suffix optional suffix to append to the fine tuned model's name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $model,
        string $trainingFile,
        Hyperparameters|array|null $hyperparameters = null,
        ?string $suffix = null,
        RequestOptions|array|null $requestOptions = null,
    ): FineTuningJob;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $jobID,
        RequestOptions|array|null $requestOptions = null
    ): FineTuningJob;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): JobListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $jobID,
        RequestOptions|array|null $requestOptions = null
    ): FineTuningJob;
}
