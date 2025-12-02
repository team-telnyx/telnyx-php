<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams;
use Telnyx\PhoneNumbers\Jobs\JobListResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\RequestOptions;

interface JobsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        ?RequestOptions $requestOptions = null
    ): JobListResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|JobDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): JobDeleteBatchResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|JobUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): JobUpdateBatchResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobUpdateEmergencySettingsBatchParams $params
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        array|JobUpdateEmergencySettingsBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateEmergencySettingsBatchResponse;
}
