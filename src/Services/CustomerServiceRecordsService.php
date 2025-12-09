<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort\Value;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomerServiceRecordsContract;

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
     * @param array{
     *   phoneNumber: string,
     *   additionalData?: array{
     *     accountNumber?: string,
     *     addressLine1?: string,
     *     authorizedPersonName?: string,
     *     billingPhoneNumber?: string,
     *     city?: string,
     *     customerCode?: string,
     *     name?: string,
     *     pin?: string,
     *     state?: string,
     *     zipCode?: string,
     *   },
     *   webhookURL?: string,
     * }|CustomerServiceRecordCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CustomerServiceRecordCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordNewResponse {
        [$parsed, $options] = CustomerServiceRecordCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CustomerServiceRecordNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'customer_service_records',
            body: (object) $parsed,
            options: $options,
            convert: CustomerServiceRecordNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific customer service record.
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordGetResponse {
        /** @var BaseResponse<CustomerServiceRecordGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['customer_service_records/%1$s', $customerServiceRecordID],
            options: $requestOptions,
            convert: CustomerServiceRecordGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List customer service records.
     *
     * @param array{
     *   filter?: array{
     *     createdAt?: array{
     *       gt?: string|\DateTimeInterface, lt?: string|\DateTimeInterface
     *     },
     *     phoneNumber?: array{eq?: string, in?: list<string>},
     *     status?: array{
     *       eq?: 'pending'|'completed'|'failed'|Eq,
     *       in?: list<'pending'|'completed'|'failed'|In>,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: 'created_at'|'-created_at'|Value},
     * }|CustomerServiceRecordListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CustomerServiceRecordListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordListResponse {
        [$parsed, $options] = CustomerServiceRecordListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CustomerServiceRecordListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'customer_service_records',
            query: $parsed,
            options: $options,
            convert: CustomerServiceRecordListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Verify the coverage for a list of phone numbers.
     *
     * @param array{
     *   phoneNumbers: list<string>
     * }|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse {
        [$parsed, $options] = CustomerServiceRecordVerifyPhoneNumberCoverageParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CustomerServiceRecordVerifyPhoneNumberCoverageResponse,> */
        $response = $this->client->request(
            method: 'post',
            path: 'customer_service_records/phone_number_coverages',
            body: (object) $parsed,
            options: $options,
            convert: CustomerServiceRecordVerifyPhoneNumberCoverageResponse::class,
        );

        return $response->parse();
    }
}
