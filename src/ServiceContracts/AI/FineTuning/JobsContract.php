<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface JobsContract
{
    /**
     * @api
     *
     * @param array<mixed>|JobCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|JobCreateParams $params,
        ?RequestOptions $requestOptions = null
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
