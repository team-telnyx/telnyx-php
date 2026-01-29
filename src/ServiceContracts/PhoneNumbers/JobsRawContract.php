<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JobsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the Phone Numbers Job
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|JobListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PhoneNumbersJob>>
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|JobDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobDeleteBatchResponse>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|JobDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|JobUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobUpdateBatchResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|JobUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|JobUpdateEmergencySettingsBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobUpdateEmergencySettingsBatchResponse>
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        array|JobUpdateEmergencySettingsBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
