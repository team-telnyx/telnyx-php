<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * Creates a new CDR report request with the specified filters.
 *
 * @see Telnyx\STAINLESS_FIXME_Legacy\STAINLESS_FIXME_Reporting\STAINLESS_FIXME_BatchDetailRecords\VoiceService::create()
 *
 * @phpstan-type VoiceCreateParamsShape = array{
 *   end_time: \DateTimeInterface,
 *   start_time: \DateTimeInterface,
 *   call_types?: list<int>,
 *   connections?: list<int>,
 *   fields?: list<string>,
 *   filters?: list<Filter>,
 *   include_all_metadata?: bool,
 *   managed_accounts?: list<string>,
 *   record_types?: list<int>,
 *   report_name?: string,
 *   select_all_managed_accounts?: bool,
 *   source?: string,
 *   timezone?: string,
 * }
 */
final class VoiceCreateParams implements BaseModel
{
    /** @use SdkModel<VoiceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End time in ISO format.
     */
    #[Api]
    public \DateTimeInterface $end_time;

    /**
     * Start time in ISO format.
     */
    #[Api]
    public \DateTimeInterface $start_time;

    /**
     * List of call types to filter by (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $call_types
     */
    #[Api(list: 'int', optional: true)]
    public ?array $call_types;

    /**
     * List of connections to filter by.
     *
     * @var list<int>|null $connections
     */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    /**
     * Set of fields to include in the report.
     *
     * @var list<string>|null $fields
     */
    #[Api(list: 'string', optional: true)]
    public ?array $fields;

    /**
     * List of filters to apply.
     *
     * @var list<Filter>|null $filters
     */
    #[Api(list: Filter::class, optional: true)]
    public ?array $filters;

    /**
     * Whether to include all metadata.
     */
    #[Api(optional: true)]
    public ?bool $include_all_metadata;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managed_accounts
     */
    #[Api(list: 'string', optional: true)]
    public ?array $managed_accounts;

    /**
     * List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @var list<int>|null $record_types
     */
    #[Api(list: 'int', optional: true)]
    public ?array $record_types;

    /**
     * Name of the report.
     */
    #[Api(optional: true)]
    public ?string $report_name;

    /**
     * Whether to select all managed accounts.
     */
    #[Api(optional: true)]
    public ?bool $select_all_managed_accounts;

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    #[Api(optional: true)]
    public ?string $source;

    /**
     * Timezone for the report.
     */
    #[Api(optional: true)]
    public ?string $timezone;

    /**
     * `new VoiceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCreateParams::with(end_time: ..., start_time: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCreateParams)->withEndTime(...)->withStartTime(...)
     * ```
     */
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
     * @param list<string> $fields
     * @param list<Filter> $filters
     * @param list<string> $managed_accounts
     * @param list<int> $record_types
     */
    public static function with(
        \DateTimeInterface $end_time,
        \DateTimeInterface $start_time,
        ?array $call_types = null,
        ?array $connections = null,
        ?array $fields = null,
        ?array $filters = null,
        ?bool $include_all_metadata = null,
        ?array $managed_accounts = null,
        ?array $record_types = null,
        ?string $report_name = null,
        ?bool $select_all_managed_accounts = null,
        ?string $source = null,
        ?string $timezone = null,
    ): self {
        $obj = new self;

        $obj->end_time = $end_time;
        $obj->start_time = $start_time;

        null !== $call_types && $obj->call_types = $call_types;
        null !== $connections && $obj->connections = $connections;
        null !== $fields && $obj->fields = $fields;
        null !== $filters && $obj->filters = $filters;
        null !== $include_all_metadata && $obj->include_all_metadata = $include_all_metadata;
        null !== $managed_accounts && $obj->managed_accounts = $managed_accounts;
        null !== $record_types && $obj->record_types = $record_types;
        null !== $report_name && $obj->report_name = $report_name;
        null !== $select_all_managed_accounts && $obj->select_all_managed_accounts = $select_all_managed_accounts;
        null !== $source && $obj->source = $source;
        null !== $timezone && $obj->timezone = $timezone;

        return $obj;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->end_time = $endTime;

        return $obj;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->start_time = $startTime;

        return $obj;
    }

    /**
     * List of call types to filter by (Inbound = 1, Outbound = 2).
     *
     * @param list<int> $callTypes
     */
    public function withCallTypes(array $callTypes): self
    {
        $obj = clone $this;
        $obj->call_types = $callTypes;

        return $obj;
    }

    /**
     * List of connections to filter by.
     *
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj->connections = $connections;

        return $obj;
    }

    /**
     * Set of fields to include in the report.
     *
     * @param list<string> $fields
     */
    public function withFields(array $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

        return $obj;
    }

    /**
     * List of filters to apply.
     *
     * @param list<Filter> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }

    /**
     * Whether to include all metadata.
     */
    public function withIncludeAllMetadata(bool $includeAllMetadata): self
    {
        $obj = clone $this;
        $obj->include_all_metadata = $includeAllMetadata;

        return $obj;
    }

    /**
     * List of managed accounts to include.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $obj = clone $this;
        $obj->managed_accounts = $managedAccounts;

        return $obj;
    }

    /**
     * List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @param list<int> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $obj = clone $this;
        $obj->record_types = $recordTypes;

        return $obj;
    }

    /**
     * Name of the report.
     */
    public function withReportName(string $reportName): self
    {
        $obj = clone $this;
        $obj->report_name = $reportName;

        return $obj;
    }

    /**
     * Whether to select all managed accounts.
     */
    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $obj = clone $this;
        $obj->select_all_managed_accounts = $selectAllManagedAccounts;

        return $obj;
    }

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    /**
     * Timezone for the report.
     */
    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone;

        return $obj;
    }
}
