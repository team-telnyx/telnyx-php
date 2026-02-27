<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\FineTuning\JobsRawContract;

/**
 * Customize LLMs for your unique needs.
 *
 * @phpstan-import-type HyperparametersShape from \Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   hyperparameters?: Hyperparameters|HyperparametersShape,
     *   suffix?: string,
     * }|JobCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function create(
        array|JobCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function retrieve(
        string $jobID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function cancel(
        string $jobID,
        RequestOptions|array|null $requestOptions = null
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
