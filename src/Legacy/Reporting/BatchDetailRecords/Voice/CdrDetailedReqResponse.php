<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;

/**
 * Response object for CDR detailed report.
 *
 * @phpstan-type CdrDetailedReqResponseShape = array{
 *   id?: string|null,
 *   call_types?: list<int>|null,
 *   connections?: list<int>|null,
 *   created_at?: string|null,
 *   end_time?: string|null,
 *   filters?: list<Filter>|null,
 *   managed_accounts?: list<string>|null,
 *   record_type?: string|null,
 *   record_types?: list<int>|null,
 *   report_name?: string|null,
 *   report_url?: string|null,
 *   retry?: int|null,
 *   source?: string|null,
 *   start_time?: string|null,
 *   status?: int|null,
 *   timezone?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class CdrDetailedReqResponse implements BaseModel
{
    /** @use SdkModel<CdrDetailedReqResponseShape> */
    use SdkModel;

    /**
     * Unique identifier for the report.
     */
    #[Optional]
    public ?string $id;

    /**
     * List of call types (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $call_types
     */
    #[Optional(list: 'int')]
    public ?array $call_types;

    /**
     * List of connections.
     *
     * @var list<int>|null $connections
     */
    #[Optional(list: 'int')]
    public ?array $connections;

    /**
     * Creation date of the report.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * End time in ISO format.
     */
    #[Optional]
    public ?string $end_time;

    /**
     * List of filters.
     *
     * @var list<Filter>|null $filters
     */
    #[Optional(list: Filter::class)]
    public ?array $filters;

    /**
     * List of managed accounts.
     *
     * @var list<string>|null $managed_accounts
     */
    #[Optional(list: 'string')]
    public ?array $managed_accounts;

    #[Optional]
    public ?string $record_type;

    /**
     * List of record types (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @var list<int>|null $record_types
     */
    #[Optional(list: 'int')]
    public ?array $record_types;

    /**
     * Name of the report.
     */
    #[Optional]
    public ?string $report_name;

    /**
     * URL to download the report.
     */
    #[Optional]
    public ?string $report_url;

    /**
     * Number of retries.
     */
    #[Optional]
    public ?int $retry;

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    #[Optional]
    public ?string $source;

    /**
     * Start time in ISO format.
     */
    #[Optional]
    public ?string $start_time;

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    #[Optional]
    public ?int $status;

    /**
     * Timezone for the report.
     */
    #[Optional]
    public ?string $timezone;

    /**
     * Last update date of the report.
     */
    #[Optional]
    public ?string $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $call_types
     * @param list<int> $connections
     * @param list<Filter|array{
     *   billing_group?: string|null,
     *   cld?: string|null,
     *   cld_filter?: value-of<CldFilter>|null,
     *   cli?: string|null,
     *   cli_filter?: value-of<CliFilter>|null,
     *   filter_type?: value-of<FilterType>|null,
     *   tags_list?: string|null,
     * }> $filters
     * @param list<string> $managed_accounts
     * @param list<int> $record_types
     */
    public static function with(
        ?string $id = null,
        ?array $call_types = null,
        ?array $connections = null,
        ?string $created_at = null,
        ?string $end_time = null,
        ?array $filters = null,
        ?array $managed_accounts = null,
        ?string $record_type = null,
        ?array $record_types = null,
        ?string $report_name = null,
        ?string $report_url = null,
        ?int $retry = null,
        ?string $source = null,
        ?string $start_time = null,
        ?int $status = null,
        ?string $timezone = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $call_types && $obj['call_types'] = $call_types;
        null !== $connections && $obj['connections'] = $connections;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $filters && $obj['filters'] = $filters;
        null !== $managed_accounts && $obj['managed_accounts'] = $managed_accounts;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $record_types && $obj['record_types'] = $record_types;
        null !== $report_name && $obj['report_name'] = $report_name;
        null !== $report_url && $obj['report_url'] = $report_url;
        null !== $retry && $obj['retry'] = $retry;
        null !== $source && $obj['source'] = $source;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $status && $obj['status'] = $status;
        null !== $timezone && $obj['timezone'] = $timezone;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Unique identifier for the report.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * List of call types (Inbound = 1, Outbound = 2).
     *
     * @param list<int> $callTypes
     */
    public function withCallTypes(array $callTypes): self
    {
        $obj = clone $this;
        $obj['call_types'] = $callTypes;

        return $obj;
    }

    /**
     * List of connections.
     *
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj['connections'] = $connections;

        return $obj;
    }

    /**
     * Creation date of the report.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * List of filters.
     *
     * @param list<Filter|array{
     *   billing_group?: string|null,
     *   cld?: string|null,
     *   cld_filter?: value-of<CldFilter>|null,
     *   cli?: string|null,
     *   cli_filter?: value-of<CliFilter>|null,
     *   filter_type?: value-of<FilterType>|null,
     *   tags_list?: string|null,
     * }> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj['filters'] = $filters;

        return $obj;
    }

    /**
     * List of managed accounts.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $obj = clone $this;
        $obj['managed_accounts'] = $managedAccounts;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * List of record types (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @param list<int> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $obj = clone $this;
        $obj['record_types'] = $recordTypes;

        return $obj;
    }

    /**
     * Name of the report.
     */
    public function withReportName(string $reportName): self
    {
        $obj = clone $this;
        $obj['report_name'] = $reportName;

        return $obj;
    }

    /**
     * URL to download the report.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['report_url'] = $reportURL;

        return $obj;
    }

    /**
     * Number of retries.
     */
    public function withRetry(int $retry): self
    {
        $obj = clone $this;
        $obj['retry'] = $retry;

        return $obj;
    }

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Timezone for the report.
     */
    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj['timezone'] = $timezone;

        return $obj;
    }

    /**
     * Last update date of the report.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
