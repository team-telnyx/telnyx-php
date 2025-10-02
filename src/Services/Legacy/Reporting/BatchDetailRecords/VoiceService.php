<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceCreateParams\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\VoiceContract;

use const Telnyx\Core\OMIT as omit;

final class VoiceService implements VoiceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param list<Filter> $filters List of filters to apply
     * @param bool $includeAllMetadata Whether to include all metadata
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<int> $recordTypes List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3)
     * @param string $reportName Name of the report
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param string $source Source of the report. Valid values: calls (default), call-control, fax-api, webrtc
     * @param string $timezone Timezone for the report
     *
     * @return VoiceNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $endTime,
        $startTime,
        $callTypes = omit,
        $connections = omit,
        $fields = omit,
        $filters = omit,
        $includeAllMetadata = omit,
        $managedAccounts = omit,
        $recordTypes = omit,
        $reportName = omit,
        $selectAllManagedAccounts = omit,
        $source = omit,
        $timezone = omit,
        ?RequestOptions $requestOptions = null,
    ): VoiceNewResponse {
        $params = [
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
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VoiceNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VoiceNewResponse {
        [$parsed, $options] = VoiceCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/voice',
            body: (object) $parsed,
            options: $options,
            convert: VoiceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a specific CDR report request by ID
     *
     * @return VoiceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VoiceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all CDR report requests for the authenticated user
     *
     * @return VoiceListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VoiceListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/voice',
            options: $requestOptions,
            convert: VoiceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific CDR report request by ID
     *
     * @return VoiceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VoiceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/voice/%1$s', $id],
            options: $requestOptions,
            convert: VoiceDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all available fields that can be used in CDR reports
     *
     * @return VoiceGetFieldsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveFields(
        ?RequestOptions $requestOptions = null
    ): VoiceGetFieldsResponse {
        $params = [];

        return $this->retrieveFieldsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VoiceGetFieldsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveFieldsRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VoiceGetFieldsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/voice/fields',
            options: $requestOptions,
            convert: VoiceGetFieldsResponse::class,
        );
    }
}
