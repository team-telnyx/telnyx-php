<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\VoiceContract;

/**
 * Voice batch detail records.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceService implements VoiceContract
{
    /**
     * @api
     */
    public VoiceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceRawService($client);
    }

    /**
     * @api
     *
     * Creates a new CDR report request with the specified filters
     *
     * @param \DateTimeInterface $endTime End time in ISO format
     * @param \DateTimeInterface $startTime Start time in ISO format
     * @param list<int> $callTypes List of call types to filter by (Inbound = 1, Outbound = 2)
     * @param list<int> $connections List of connections to filter by
     * @param list<string> $fields Set of fields to include in the report
     * @param list<Filter|FilterShape> $filters List of filters to apply
     * @param bool $includeAllMetadata Whether to include all metadata
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<int> $recordTypes List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3)
     * @param string $reportName Name of the report
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param string $source Source of the report. Valid values: calls (default), call-control, fax-api, webrtc
     * @param string $timezone Timezone for the report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime,
        ?array $callTypes = null,
        ?array $connections = null,
        ?array $fields = null,
        ?array $filters = null,
        ?bool $includeAllMetadata = null,
        ?array $managedAccounts = null,
        ?array $recordTypes = null,
        ?string $reportName = null,
        ?bool $selectAllManagedAccounts = null,
        ?string $source = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): VoiceNewResponse {
        $params = Util::removeNulls(
            [
                'endTime' => $endTime,
                'startTime' => $startTime,
                'callTypes' => $callTypes,
                'connections' => $connections,
                'fields' => $fields,
                'filters' => $filters,
                'includeAllMetadata' => $includeAllMetadata,
                'managedAccounts' => $managedAccounts,
                'recordTypes' => $recordTypes,
                'reportName' => $reportName,
                'selectAllManagedAccounts' => $selectAllManagedAccounts,
                'source' => $source,
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
     * Retrieves a specific CDR report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VoiceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all CDR report requests for the authenticated user
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): VoiceListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a specific CDR report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VoiceDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all available fields that can be used in CDR reports
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveFields(
        RequestOptions|array|null $requestOptions = null
    ): VoiceGetFieldsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveFields(requestOptions: $requestOptions);

        return $response->parse();
    }
}
