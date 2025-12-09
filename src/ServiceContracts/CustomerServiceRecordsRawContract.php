<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface CustomerServiceRecordsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomerServiceRecordCreateParams $params
     *
     * @return BaseResponse<CustomerServiceRecordNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CustomerServiceRecordCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $customerServiceRecordID The ID of the customer service record
     *
     * @return BaseResponse<CustomerServiceRecordGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CustomerServiceRecordListParams $params
     *
     * @return BaseResponse<DefaultPagination<CustomerServiceRecord>>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerServiceRecordListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params
     *
     * @return BaseResponse<CustomerServiceRecordVerifyPhoneNumberCoverageResponse>
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
