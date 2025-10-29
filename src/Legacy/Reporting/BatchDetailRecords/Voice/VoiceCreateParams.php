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
 * @see Telnyx\Legacy\Reporting\BatchDetailRecords\Voice->create
 *
 * @phpstan-type VoiceCreateParamsShape = array{
 *   endTime: \DateTimeInterface,
 *   startTime: \DateTimeInterface,
 *   callTypes?: list<int>,
 *   connections?: list<int>,
 *   fields?: list<string>,
 *   filters?: list<Filter>,
 *   includeAllMetadata?: bool,
 *   managedAccounts?: list<string>,
 *   recordTypes?: list<int>,
 *   reportName?: string,
 *   selectAllManagedAccounts?: bool,
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
    #[Api('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * Start time in ISO format.
     */
    #[Api('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * List of call types to filter by (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $callTypes
     */
    #[Api('call_types', list: 'int', optional: true)]
    public ?array $callTypes;

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
    #[Api('include_all_metadata', optional: true)]
    public ?bool $includeAllMetadata;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Api('managed_accounts', list: 'string', optional: true)]
    public ?array $managedAccounts;

    /**
     * List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @var list<int>|null $recordTypes
     */
    #[Api('record_types', list: 'int', optional: true)]
    public ?array $recordTypes;

    /**
     * Name of the report.
     */
    #[Api('report_name', optional: true)]
    public ?string $reportName;

    /**
     * Whether to select all managed accounts.
     */
    #[Api('select_all_managed_accounts', optional: true)]
    public ?bool $selectAllManagedAccounts;

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
     * VoiceCreateParams::with(endTime: ..., startTime: ...)
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
     * @param list<int> $callTypes
     * @param list<int> $connections
     * @param list<string> $fields
     * @param list<Filter> $filters
     * @param list<string> $managedAccounts
     * @param list<int> $recordTypes
     */
    public static function with(
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
    ): self {
        $obj = new self;

        $obj->endTime = $endTime;
        $obj->startTime = $startTime;

        null !== $callTypes && $obj->callTypes = $callTypes;
        null !== $connections && $obj->connections = $connections;
        null !== $fields && $obj->fields = $fields;
        null !== $filters && $obj->filters = $filters;
        null !== $includeAllMetadata && $obj->includeAllMetadata = $includeAllMetadata;
        null !== $managedAccounts && $obj->managedAccounts = $managedAccounts;
        null !== $recordTypes && $obj->recordTypes = $recordTypes;
        null !== $reportName && $obj->reportName = $reportName;
        null !== $selectAllManagedAccounts && $obj->selectAllManagedAccounts = $selectAllManagedAccounts;
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
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

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
        $obj->callTypes = $callTypes;

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
        $obj->includeAllMetadata = $includeAllMetadata;

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
        $obj->managedAccounts = $managedAccounts;

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
        $obj->recordTypes = $recordTypes;

        return $obj;
    }

    /**
     * Name of the report.
     */
    public function withReportName(string $reportName): self
    {
        $obj = clone $this;
        $obj->reportName = $reportName;

        return $obj;
    }

    /**
     * Whether to select all managed accounts.
     */
    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $obj = clone $this;
        $obj->selectAllManagedAccounts = $selectAllManagedAccounts;

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
