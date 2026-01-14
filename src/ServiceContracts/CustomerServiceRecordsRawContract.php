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
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CustomerServiceRecordsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CustomerServiceRecordCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerServiceRecordNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CustomerServiceRecordCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $customerServiceRecordID The ID of the customer service record
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerServiceRecordGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomerServiceRecordListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CustomerServiceRecord>>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerServiceRecordListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerServiceRecordVerifyPhoneNumberCoverageResponse>
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
