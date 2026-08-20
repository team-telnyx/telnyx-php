<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\FineTuning\JobsContract;

/**
 * Customize LLMs for your unique needs.
 *
 * @phpstan-import-type HyperparametersShape from \Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class JobsService implements JobsContract
{
    /**
     * @api
     */
    public JobsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new JobsRawService($client);
    }

    /**
     * @api
     *
     * Creates a new fine-tuning job that trains a model on the provided dataset, and returns the created job.
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
    ): FineTuningJob {
        $params = Util::removeNulls(
            [
                'model' => $model,
                'trainingFile' => $trainingFile,
                'hyperparameters' => $hyperparameters,
                'suffix' => $suffix,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a single fine-tuning job by its job_id, including its current status.
     *
     * @param string $jobID unique identifier of the job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $jobID,
        RequestOptions|array|null $requestOptions = null
    ): FineTuningJob {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($jobID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all fine tuning jobs created by the user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): JobListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancels the specified in-progress fine-tuning job and returns the updated job.
     *
     * @param string $jobID unique identifier of the job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $jobID,
        RequestOptions|array|null $requestOptions = null
    ): FineTuningJob {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($jobID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
