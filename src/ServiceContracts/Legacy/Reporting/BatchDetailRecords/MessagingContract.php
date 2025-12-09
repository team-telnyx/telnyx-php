<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;

interface MessagingContract
{
    /**
     * @api
     *
     * @param string|\DateTimeInterface $endTime End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation
     * @param string|\DateTimeInterface $startTime Start time in ISO format
     * @param list<int> $connections List of connections to filter by
     * @param list<int> $directions List of directions to filter by (Inbound = 1, Outbound = 2)
     * @param list<array{
     *   billingGroup?: string,
     *   cld?: string,
     *   cldFilter?: 'contains'|'starts_with'|'ends_with'|CldFilter,
     *   cli?: string,
     *   cliFilter?: 'contains'|'starts_with'|'ends_with'|CliFilter,
     *   filterType?: 'and'|'or'|FilterType,
     *   tagsList?: string,
     * }|Filter> $filters List of filters to apply
     * @param bool $includeMessageBody Whether to include message body in the report
     * @param list<string> $managedAccounts List of managed accounts to include
     * @param list<string> $profiles List of messaging profile IDs to filter by
     * @param list<int> $recordTypes List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3)
     * @param string $reportName Name of the report
     * @param bool $selectAllManagedAccounts Whether to select all managed accounts
     * @param string $timezone Timezone for the report
     *
     * @throws APIException
     */
    public function create(
        string|\DateTimeInterface $endTime,
        string|\DateTimeInterface $startTime,
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
        ?RequestOptions $requestOptions = null,
    ): MessagingNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse;
}
