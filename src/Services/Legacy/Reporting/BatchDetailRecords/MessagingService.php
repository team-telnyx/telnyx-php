<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\MessagingContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingService implements MessagingContract
{
    /**
     * @api
     */
    public MessagingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingRawService($client);
    }

    /**
     * @api
     *
     * Creates a new MDR detailed report request with the specified filters
     *
     * @param \DateTimeInterface $endTime End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation
     * @param \DateTimeInterface $startTime Start time in ISO format
     * @param list<int> $connections List of connections to filter by
     * @param list<int> $directions List of directions to filter by (Inbound = 1, Outbound = 2)
     * @param list<Filter|FilterShape> $filters List of filters to apply
     * @param bool $includeMessageBody Whether to include message body in the report
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<string> $profiles List of messaging profile IDs to filter by
     * @param list<int> $recordTypes List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3)
     * @param string $reportName Name of the report
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param string $timezone Timezone for the report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime,
        ?array $connections = null,
        ?array $directions = null,
        ?array $filters = null,
        ?bool $includeMessageBody = null,
        ?array $managedAccounts = null,
        ?array $profiles = null,
        ?array $recordTypes = null,
        ?string $reportName = null,
        ?bool $selectAllManagedAccounts = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingNewResponse {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a specific MDR detailed report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all MDR detailed report requests for the authenticated user
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): MessagingListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a specific MDR detailed report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
