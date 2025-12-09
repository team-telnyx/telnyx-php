<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface JobsContract
{
    /**
     * @api
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
    ): FineTuningJob;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): JobListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function cancel(
        string $jobID,
        ?RequestOptions $requestOptions = null
    ): FineTuningJob;
}
