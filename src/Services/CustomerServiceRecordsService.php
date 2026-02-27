<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomerServiceRecordsContract;

/**
 * Customer Service Record operations.
 *
 * @phpstan-import-type AdditionalDataShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordCreateParams\AdditionalData
 * @phpstan-import-type FilterShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CustomerServiceRecordsService implements CustomerServiceRecordsContract
{
    /**
     * @api
     */
    public CustomerServiceRecordsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomerServiceRecordsRawService($client);
    }

    /**
     * @api
     *
     * Create a new customer service record for the provided phone number.
     *
     * @param string $phoneNumber a valid US phone number in E164 format
     * @param AdditionalData|AdditionalDataShape $additionalData
     * @param string $webhookURL callback URL to receive webhook notifications
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumber,
        AdditionalData|array|null $additionalData = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerServiceRecordNewResponse {
        $params = Util::removeNulls(
            [
                'phoneNumber' => $phoneNumber,
                'additionalData' => $additionalData,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific customer service record.
     *
     * @param string $customerServiceRecordID The ID of the customer service record
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        RequestOptions|array|null $requestOptions = null,
    ): CustomerServiceRecordGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($customerServiceRecordID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List customer service records.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CustomerServiceRecord>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Verify the coverage for a list of phone numbers.
     *
     * @param list<string> $phoneNumbers the phone numbers list to be verified
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verifyPhoneNumberCoverage(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
