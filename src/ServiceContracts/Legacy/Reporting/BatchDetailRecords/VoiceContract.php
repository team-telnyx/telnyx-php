<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface VoiceContract
{
    /**
     * @api
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
    ): VoiceNewResponse;

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
    ): VoiceNewResponse;

    /**
     * @api
     *
     * @return VoiceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse;

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
    ): VoiceGetResponse;

    /**
     * @api
     *
     * @return VoiceListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse;

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
    ): VoiceListResponse;

    /**
     * @api
     *
     * @return VoiceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse;

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
    ): VoiceDeleteResponse;

    /**
     * @api
     *
     * @return VoiceGetFieldsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveFields(
        ?RequestOptions $requestOptions = null
    ): VoiceGetFieldsResponse;

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
    ): VoiceGetFieldsResponse;
}
