<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface CustomerServiceRecordsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomerServiceRecordCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CustomerServiceRecordCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CustomerServiceRecordListParams $params
     *
     * @return DefaultPagination<CustomerServiceRecord>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerServiceRecordListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
}
