<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;

interface VoiceContract
{
    /**
     * @api
     *
     * @param string|\DateTimeInterface $endTime End time in ISO format
     * @param string|\DateTimeInterface $startTime Start time in ISO format
     * @param list<int> $callTypes List of call types to filter by (Inbound = 1, Outbound = 2)
     * @param list<int> $connections List of connections to filter by
     * @param list<string> $fields Set of fields to include in the report
     * @param list<array{
     *   billingGroup?: string,
     *   cld?: string,
     *   cldFilter?: 'contains'|'starts_with'|'ends_with'|CldFilter,
     *   cli?: string,
     *   cliFilter?: 'contains'|'starts_with'|'ends_with'|CliFilter,
     *   filterType?: 'and'|'or'|FilterType,
     *   tagsList?: string,
     * }|Filter> $filters List of filters to apply
     * @param bool $includeAllMetadata Whether to include all metadata
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<int> $recordTypes List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3)
     * @param string $reportName Name of the report
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param string $source Source of the report. Valid values: calls (default), call-control, fax-api, webrtc
     * @param string $timezone Timezone for the report
     *
     * @throws APIException
     */
    public function create(
        string|\DateTimeInterface $endTime,
        string|\DateTimeInterface $startTime,
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
        ?RequestOptions $requestOptions = null,
    ): VoiceNewResponse;

    /**
     * @api
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
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse;

    /**
     * @api
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
     * @throws APIException
     */
    public function retrieveFields(
        ?RequestOptions $requestOptions = null
    ): VoiceGetFieldsResponse;
}
