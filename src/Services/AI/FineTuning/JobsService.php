<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\FineTuning\JobsContract;

use const Telnyx\Core\OMIT as omit;

final class JobsService implements JobsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new fine tuning job.
     *
     * @param string $model the base model that is being fine-tuned
     * @param string $trainingFile the storage bucket or object used for training
     * @param Hyperparameters $hyperparameters the hyperparameters used for the fine-tuning job
     * @param string $suffix optional suffix to append to the fine tuned model's name
     *
     * @return FineTuningJob<HasRawResponse>
     */
    public function create(
        $model,
        $trainingFile,
        $hyperparameters = omit,
        $suffix = omit,
        ?RequestOptions $requestOptions = null,
    ): FineTuningJob {
        [$parsed, $options] = JobCreateParams::parseRequest(
            [
                'model' => $model,
                'trainingFile' => $trainingFile,
                'hyperparameters' => $hyperparameters,
                'suffix' => $suffix,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/fine_tuning/jobs',
            body: (object) $parsed,
            options: $options,
            convert: FineTuningJob::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a fine tuning job by `job_id`.
     *
     * @return FineTuningJob<HasRawResponse>
     */
    public function retrieve(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/fine_tuning/jobs/%1$s', $jobID],
            options: $requestOptions,
            convert: FineTuningJob::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all fine tuning jobs created by the user.
     *
     * @return JobListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): JobListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/fine_tuning/jobs',
            options: $requestOptions,
            convert: JobListResponse::class,
        );
    }

    /**
     * @api
     *
     * Cancel a fine tuning job.
     *
     * @return FineTuningJob<HasRawResponse>
     */
    public function cancel(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/fine_tuning/jobs/%1$s/cancel', $jobID],
            options: $requestOptions,
            convert: FineTuningJob::class,
        );
    }
}
