<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;

/**
 * Creates a new CDR report request with the specified filters.
 *
 * @see Telnyx\Services\Legacy\Reporting\BatchDetailRecords\VoiceService::create()
 *
 * @phpstan-type VoiceCreateParamsShape = array{
 *   endTime: \DateTimeInterface,
 *   startTime: \DateTimeInterface,
 *   callTypes?: list<int>,
 *   connections?: list<int>,
 *   fields?: list<string>,
 *   filters?: list<Filter|array{
 *     billingGroup?: string|null,
 *     cld?: string|null,
 *     cldFilter?: value-of<CldFilter>|null,
 *     cli?: string|null,
 *     cliFilter?: value-of<CliFilter>|null,
 *     filterType?: value-of<FilterType>|null,
 *     tagsList?: string|null,
 *   }>,
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
    #[Required('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * Start time in ISO format.
     */
    #[Required('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * List of call types to filter by (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $callTypes
     */
    #[Optional('call_types', list: 'int')]
    public ?array $callTypes;

    /**
     * List of connections to filter by.
     *
     * @var list<int>|null $connections
     */
    #[Optional(list: 'int')]
    public ?array $connections;

    /**
     * Set of fields to include in the report.
     *
     * @var list<string>|null $fields
     */
    #[Optional(list: 'string')]
    public ?array $fields;

    /**
     * List of filters to apply.
     *
     * @var list<Filter>|null $filters
     */
    #[Optional(list: Filter::class)]
    public ?array $filters;

    /**
     * Whether to include all metadata.
     */
    #[Optional('include_all_metadata')]
    public ?bool $includeAllMetadata;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Optional('managed_accounts', list: 'string')]
    public ?array $managedAccounts;

    /**
     * List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @var list<int>|null $recordTypes
     */
    #[Optional('record_types', list: 'int')]
    public ?array $recordTypes;

    /**
     * Name of the report.
     */
    #[Optional('report_name')]
    public ?string $reportName;

    /**
     * Whether to select all managed accounts.
     */
    #[Optional('select_all_managed_accounts')]
    public ?bool $selectAllManagedAccounts;

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    #[Optional]
    public ?string $source;

    /**
     * Timezone for the report.
     */
    #[Optional]
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
     * @param list<Filter|array{
     *   billingGroup?: string|null,
     *   cld?: string|null,
     *   cldFilter?: value-of<CldFilter>|null,
     *   cli?: string|null,
     *   cliFilter?: value-of<CliFilter>|null,
     *   filterType?: value-of<FilterType>|null,
     *   tagsList?: string|null,
     * }> $filters
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
        $self = new self;

        $self['endTime'] = $endTime;
        $self['startTime'] = $startTime;

        null !== $callTypes && $self['callTypes'] = $callTypes;
        null !== $connections && $self['connections'] = $connections;
        null !== $fields && $self['fields'] = $fields;
        null !== $filters && $self['filters'] = $filters;
        null !== $includeAllMetadata && $self['includeAllMetadata'] = $includeAllMetadata;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $recordTypes && $self['recordTypes'] = $recordTypes;
        null !== $reportName && $self['reportName'] = $reportName;
        null !== $selectAllManagedAccounts && $self['selectAllManagedAccounts'] = $selectAllManagedAccounts;
        null !== $source && $self['source'] = $source;
        null !== $timezone && $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Start time in ISO format.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * List of call types to filter by (Inbound = 1, Outbound = 2).
     *
     * @param list<int> $callTypes
     */
    public function withCallTypes(array $callTypes): self
    {
        $self = clone $this;
        $self['callTypes'] = $callTypes;

        return $self;
    }

    /**
     * List of connections to filter by.
     *
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    /**
     * Set of fields to include in the report.
     *
     * @param list<string> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * List of filters to apply.
     *
     * @param list<Filter|array{
     *   billingGroup?: string|null,
     *   cld?: string|null,
     *   cldFilter?: value-of<CldFilter>|null,
     *   cli?: string|null,
     *   cliFilter?: value-of<CliFilter>|null,
     *   filterType?: value-of<FilterType>|null,
     *   tagsList?: string|null,
     * }> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * Whether to include all metadata.
     */
    public function withIncludeAllMetadata(bool $includeAllMetadata): self
    {
        $self = clone $this;
        $self['includeAllMetadata'] = $includeAllMetadata;

        return $self;
    }

    /**
     * List of managed accounts to include.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $self = clone $this;
        $self['managedAccounts'] = $managedAccounts;

        return $self;
    }

    /**
     * List of record types to filter by (Complete = 1, Incomplete = 2, Errors = 3).
     *
     * @param list<int> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $self = clone $this;
        $self['recordTypes'] = $recordTypes;

        return $self;
    }

    /**
     * Name of the report.
     */
    public function withReportName(string $reportName): self
    {
        $self = clone $this;
        $self['reportName'] = $reportName;

        return $self;
    }

    /**
     * Whether to select all managed accounts.
     */
    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $self = clone $this;
        $self['selectAllManagedAccounts'] = $selectAllManagedAccounts;

        return $self;
    }

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * Timezone for the report.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
