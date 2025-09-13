<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface JobsContract
{
    /**
     * @api
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
    ): FineTuningJob;

    /**
     * @api
     *
     * @return FineTuningJob<HasRawResponse>
     */
    public function retrieve(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob;

    /**
     * @api
     *
     * @return JobListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): JobListResponse;

    /**
     * @api
     *
     * @return FineTuningJob<HasRawResponse>
     */
    public function cancel(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob;
}
