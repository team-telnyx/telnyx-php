<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageParams;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomerServiceRecordsRawContract;

/**
 * Customer Service Record operations.
 *
 * @phpstan-import-type AdditionalDataShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData
 * @phpstan-import-type FilterShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CustomerServiceRecordsRawService implements CustomerServiceRecordsRawContract
{
    // @phpstan-ignore-next-line
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
     *   additionalData?: AdditionalData|AdditionalDataShape,
     *   webhookURL?: string,
     * }|CustomerServiceRecordCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerServiceRecordNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CustomerServiceRecordCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
    ): BaseResponse {
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
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|SortShape,
     * }|CustomerServiceRecordListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CustomerServiceRecord>>
     *
     * @throws APIException
     */
    public function list(
        array|CustomerServiceRecordListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomerServiceRecordListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'customer_service_records',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: CustomerServiceRecord::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Verify the coverage for a list of phone numbers.
     *
     * @param array{
     *   phoneNumbers: list<string>
     * }|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomerServiceRecordVerifyPhoneNumberCoverageResponse>
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array|CustomerServiceRecordVerifyPhoneNumberCoverageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
