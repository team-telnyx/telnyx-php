<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * Creates a new MDR detailed report request with the specified filters.
 *
 * @see Telnyx\Services\Legacy\Reporting\BatchDetailRecords\MessagingService::create()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Filter
 *
 * @phpstan-type MessagingCreateParamsShape = array{
 *   endTime: \DateTimeInterface,
 *   startTime: \DateTimeInterface,
 *   connections?: list<int>|null,
 *   directions?: list<int>|null,
 *   filters?: list<Filter|FilterShape>|null,
 *   includeMessageBody?: bool|null,
 *   managedAccounts?: list<string>|null,
 *   profiles?: list<string>|null,
 *   recordTypes?: list<int>|null,
 *   reportName?: string|null,
 *   selectAllManagedAccounts?: bool|null,
 *   timezone?: string|null,
 * }
 */
final class MessagingCreateParams implements BaseModel
{
    /** @use SdkModel<MessagingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation.
     */
    #[Required('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * Start time in ISO format.
     */
    #[Required('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * List of connections to filter by.
     *
     * @var list<int>|null $connections
     */
    #[Optional(list: 'int')]
    public ?array $connections;

    /**
     * List of directions to filter by (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $directions
     */
    #[Optional(list: 'int')]
    public ?array $directions;

    /**
     * List of filters to apply.
     *
     * @var list<Filter>|null $filters
     */
    #[Optional(list: Filter::class)]
    public ?array $filters;

    /**
     * Whether to include message body in the report.
     */
    #[Optional('include_message_body')]
    public ?bool $includeMessageBody;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Optional('managed_accounts', list: 'string')]
    public ?array $managedAccounts;

    /**
     * List of messaging profile IDs to filter by.
     *
     * @var list<string>|null $profiles
     */
    #[Optional(list: 'string')]
    public ?array $profiles;

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
     * Timezone for the report.
     */
    #[Optional]
    public ?string $timezone;

    /**
     * `new MessagingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingCreateParams::with(endTime: ..., startTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingCreateParams)->withEndTime(...)->withStartTime(...)
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
     * @param list<int>|null $connections
     * @param list<int>|null $directions
     * @param list<Filter|FilterShape>|null $filters
     * @param list<string>|null $managedAccounts
     * @param list<string>|null $profiles
     * @param list<int>|null $recordTypes
     */
    public static function with(
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
    ): self {
        $self = new self;

        $self['endTime'] = $endTime;
        $self['startTime'] = $startTime;

        null !== $connections && $self['connections'] = $connections;
        null !== $directions && $self['directions'] = $directions;
        null !== $filters && $self['filters'] = $filters;
        null !== $includeMessageBody && $self['includeMessageBody'] = $includeMessageBody;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $profiles && $self['profiles'] = $profiles;
        null !== $recordTypes && $self['recordTypes'] = $recordTypes;
        null !== $reportName && $self['reportName'] = $reportName;
        null !== $selectAllManagedAccounts && $self['selectAllManagedAccounts'] = $selectAllManagedAccounts;
        null !== $timezone && $self['timezone'] = $timezone;

        return $self;
    }

    /**
     * End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation.
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
     * List of directions to filter by (Inbound = 1, Outbound = 2).
     *
     * @param list<int> $directions
     */
    public function withDirections(array $directions): self
    {
        $self = clone $this;
        $self['directions'] = $directions;

        return $self;
    }

    /**
     * List of filters to apply.
     *
     * @param list<Filter|FilterShape> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * Whether to include message body in the report.
     */
    public function withIncludeMessageBody(bool $includeMessageBody): self
    {
        $self = clone $this;
        $self['includeMessageBody'] = $includeMessageBody;

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
     * List of messaging profile IDs to filter by.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $self = clone $this;
        $self['profiles'] = $profiles;

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
     * Timezone for the report.
     */
    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
