<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort\Value;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface CustomerServiceRecordsContract
{
    /**
     * @api
     *
     * @param string $phoneNumber a valid US phone number in E164 format
     * @param array{
     *   accountNumber?: string,
     *   addressLine1?: string,
     *   authorizedPersonName?: string,
     *   billingPhoneNumber?: string,
     *   city?: string,
     *   customerCode?: string,
     *   name?: string,
     *   pin?: string,
     *   state?: string,
     *   zipCode?: string,
     * } $additionalData
     * @param string $webhookURL callback URL to receive webhook notifications
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumber,
        ?array $additionalData = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordNewResponse;

    /**
     * @api
     *
     * @param string $customerServiceRecordID The ID of the customer service record
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
     * @param array{
     *   createdAt?: array{
     *     gt?: string|\DateTimeInterface, lt?: string|\DateTimeInterface
     *   },
     *   phoneNumber?: array{eq?: string, in?: list<string>},
     *   status?: array{
     *     eq?: 'pending'|'completed'|'failed'|Eq,
     *     in?: list<'pending'|'completed'|'failed'|In>,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return DefaultPagination<CustomerServiceRecord>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers the phone numbers list to be verified
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
}
