<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\FineTuning\JobsContract;

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
     * @param array{
     *   model: string,
     *   training_file: string,
     *   hyperparameters?: array{n_epochs?: int},
     *   suffix?: string,
     * }|JobCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|JobCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob {
        [$parsed, $options] = JobCreateParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @throws APIException
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
     * @throws APIException
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
