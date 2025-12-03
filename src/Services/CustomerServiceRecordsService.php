<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;
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
     *   phone_number: string,
     *   additional_data?: array{
     *     account_number?: string,
     *     address_line_1?: string,
     *     authorized_person_name?: string,
     *     billing_phone_number?: string,
     *     city?: string,
     *     customer_code?: string,
     *     name?: string,
     *     pin?: string,
     *     state?: string,
     *     zip_code?: string,
     *   },
     *   webhook_url?: string,
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

        // @phpstan-ignore-next-line return.type
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordGetResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     created_at?: array{
     *       gt?: string|\DateTimeInterface, lt?: string|\DateTimeInterface
     *     },
     *     phone_number?: array{eq?: string, in?: list<string>},
     *     status?: array{
     *       eq?: 'pending'|'completed'|'failed',
     *       in?: list<'pending'|'completed'|'failed'>,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: 'created_at'|'-created_at'},
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

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   phone_numbers: list<string>
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'customer_service_records/phone_number_coverages',
            body: (object) $parsed,
            options: $options,
            convert: CustomerServiceRecordVerifyPhoneNumberCoverageResponse::class,
        );
    }
}
