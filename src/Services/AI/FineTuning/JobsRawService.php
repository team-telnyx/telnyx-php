<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\FineTuning\JobsRawContract;

final class JobsRawService implements JobsRawContract
{
    // @phpstan-ignore-next-line
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
     *   trainingFile: string,
     *   hyperparameters?: array{nEpochs?: int},
     *   suffix?: string,
     * }|JobCreateParams $params
     *
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function create(
        array|JobCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = JobCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function retrieve(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<JobListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function cancel(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/fine_tuning/jobs/%1$s/cancel', $jobID],
            options: $requestOptions,
            convert: FineTuningJob::class,
        );
    }
}
