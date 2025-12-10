<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\FineTuning\JobsContract;

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
     * Create a new fine tuning job.
     *
     * @param string $model the base model that is being fine-tuned
     * @param string $trainingFile the storage bucket or object used for training
     * @param array{
     *   nEpochs?: int
     * } $hyperparameters The hyperparameters used for the fine-tuning job
     * @param string $suffix optional suffix to append to the fine tuned model's name
     *
     * @throws APIException
     */
    public function create(
        string $model,
        string $trainingFile,
        ?array $hyperparameters = null,
        ?string $suffix = null,
        ?RequestOptions $requestOptions = null,
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
     * Retrieve a fine tuning job by `job_id`.
     *
     * @throws APIException
     */
    public function retrieve(
        string $jobID,
        ?RequestOptions $requestOptions = null
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
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): JobListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancel a fine tuning job.
     *
     * @throws APIException
     */
    public function cancel(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($jobID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
