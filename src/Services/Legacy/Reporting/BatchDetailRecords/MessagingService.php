<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\MessagingContract;

use const Telnyx\Core\OMIT as omit;

final class MessagingService implements MessagingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new MDR detailed report request with the specified filters
     *
     * @param \DateTimeInterface $endTime End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation
     * @param \DateTimeInterface $startTime Start time in ISO format
     * @param list<int> $connections List of connections to filter by
     * @param list<int> $directions List of directions to filter by (Inbound = 1, Outbound = 2)
     * @param list<Filter> $filters List of filters to apply
     * @param bool $includeMessageBody Whether to include message body in the report
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<string> $profiles List of messaging profile IDs to filter by
     * @param list<int> $recordTypes List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3)
     * @param string $reportName Name of the report
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param string $timezone Timezone for the report
     *
     * @return MessagingNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $endTime,
        $startTime,
        $connections = omit,
        $directions = omit,
        $filters = omit,
        $includeMessageBody = omit,
        $managedAccounts = omit,
        $profiles = omit,
        $recordTypes = omit,
        $reportName = omit,
        $selectAllManagedAccounts = omit,
        $timezone = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingNewResponse {
        $params = [
            'endTime' => $endTime,
            'startTime' => $startTime,
            'connections' => $connections,
            'directions' => $directions,
            'filters' => $filters,
            'includeMessageBody' => $includeMessageBody,
            'managedAccounts' => $managedAccounts,
            'profiles' => $profiles,
            'recordTypes' => $recordTypes,
            'reportName' => $reportName,
            'selectAllManagedAccounts' => $selectAllManagedAccounts,
            'timezone' => $timezone,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessagingNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingNewResponse {
        [$parsed, $options] = MessagingCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/messaging',
            body: (object) $parsed,
            options: $options,
            convert: MessagingNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a specific MDR detailed report request by ID
     *
     * @return MessagingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessagingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all MDR detailed report requests for the authenticated user
     *
     * @return MessagingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessagingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/messaging',
            options: $requestOptions,
            convert: MessagingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific MDR detailed report request by ID
     *
     * @return MessagingDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessagingDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/messaging/%1$s', $id],
            options: $requestOptions,
            convert: MessagingDeleteResponse::class,
        );
    }
}
