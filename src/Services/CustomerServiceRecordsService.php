<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Page;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomerServiceRecordsContract;

use const Telnyx\Core\OMIT as omit;

final class CustomerServiceRecordsService implements CustomerServiceRecordsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new customer service record for the provided phone number.
     *
     * @param string $phoneNumber a valid US phone number in E164 format
     * @param AdditionalData $additionalData
     * @param string $webhookURL callback URL to receive webhook notifications
     */
    public function create(
        $phoneNumber,
        $additionalData = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordNewResponse {
        [$parsed, $options] = CustomerServiceRecordCreateParams::parseRequest(
            [
                'phoneNumber' => $phoneNumber,
                'additionalData' => $additionalData,
                'webhookURL' => $webhookURL,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'customer_service_records',
            body: (object) $parsed,
            options: $options,
            convert: CustomerServiceRecordNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a specific customer service record.
     */
    public function retrieve(
        string $customerServiceRecordID,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['customer_service_records/%1$s', $customerServiceRecordID],
            options: $requestOptions,
            convert: CustomerServiceRecordGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List customer service records.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordListResponse {
        [$parsed, $options] = CustomerServiceRecordListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'customer_service_records',
            query: $parsed,
            options: $options,
            convert: CustomerServiceRecordListResponse::class,
        );
    }

    /**
     * @api
     *
     * Verify the coverage for a list of phone numbers.
     *
     * @param list<string> $phoneNumbers the phone numbers list to be verified
     */
    public function verifyPhoneNumberCoverage(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse {
        [
            $parsed, $options,
        ] = CustomerServiceRecordVerifyPhoneNumberCoverageParams::parseRequest(
            ['phoneNumbers' => $phoneNumbers],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'customer_service_records/phone_number_coverages',
            body: (object) $parsed,
            options: $options,
            convert: CustomerServiceRecordVerifyPhoneNumberCoverageResponse::class,
        );
    }
}
