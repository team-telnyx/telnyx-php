<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordGetResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Sort\Value;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordNewResponse;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomerServiceRecordsContract;

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
    ): CustomerServiceRecordNewResponse {
        $params = [
            'phoneNumber' => $phoneNumber,
            'additionalData' => $additionalData,
            'webhookURL' => $webhookURL,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $customerServiceRecordID,
        ?RequestOptions $requestOptions = null
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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): CustomerServiceRecordListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function verifyPhoneNumberCoverage(
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): CustomerServiceRecordVerifyPhoneNumberCoverageResponse {
        $params = ['phoneNumbers' => $phoneNumbers];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verifyPhoneNumberCoverage(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
