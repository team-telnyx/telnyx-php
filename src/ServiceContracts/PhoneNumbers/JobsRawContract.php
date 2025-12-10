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

interface JobsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the Phone Numbers Job
     *
     * @return BaseResponse<JobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobListParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumbersJob>>
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobDeleteBatchParams $params
     *
     * @return BaseResponse<JobDeleteBatchResponse>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|JobDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobUpdateBatchParams $params
     *
     * @return BaseResponse<JobUpdateBatchResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|JobUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobUpdateEmergencySettingsBatchParams $params
     *
     * @return BaseResponse<JobUpdateEmergencySettingsBatchResponse>
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        array|JobUpdateEmergencySettingsBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
