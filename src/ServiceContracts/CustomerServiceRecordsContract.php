<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Page;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CustomerServiceRecordsContract
{
    /**
     * @api
     *
     * @param string $phoneNumber a valid US phone number in E164 format
     * @param AdditionalData $additionalData
     * @param string $webhookURL callback URL to receive webhook notifications
     *
     * @return CustomerServiceRecordNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $phoneNumber,
        $additionalData = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CustomerServiceRecordNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordNewResponse;

    /**
     * @api
     *
     * @return CustomerServiceRecordGetResponse<HasRawResponse>
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
     * @return CustomerServiceRecordGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $customerServiceRecordID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return CustomerServiceRecordListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CustomerServiceRecordListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordListResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers the phone numbers list to be verified
     *
     * @return CustomerServiceRecordVerifyPhoneNumberCoverageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CustomerServiceRecordVerifyPhoneNumberCoverageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverageRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
}
