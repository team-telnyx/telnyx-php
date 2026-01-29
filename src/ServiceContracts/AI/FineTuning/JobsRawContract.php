<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\FineTuning;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob;
use Telnyx\AI\FineTuning\Jobs\JobCreateParams;
use Telnyx\AI\FineTuning\Jobs\JobListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JobsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|JobCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FineTuningJob>
     *
     * @throws APIException
     */
    public function create(
        array|JobCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
