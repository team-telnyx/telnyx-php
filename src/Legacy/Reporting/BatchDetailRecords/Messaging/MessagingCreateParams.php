<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessagingCreateParams); // set properties as needed
 * $client->legacy.reporting.batchDetailRecords.messaging->create(...$params->toArray());
 * ```
 * Creates a new MDR detailed report request with the specified filters.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->legacy.reporting.batchDetailRecords.messaging->create(...$params->toArray());`
 *
 * @see Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging->create
 *
 * @phpstan-type messaging_create_params = array{
 *   endTime: \DateTimeInterface,
 *   startTime: \DateTimeInterface,
 *   connections?: list<int>,
 *   directions?: list<int>,
 *   filters?: list<Filter>,
 *   includeMessageBody?: bool,
 *   managedAccounts?: list<string>,
 *   profiles?: list<string>,
 *   recordTypes?: list<int>,
 *   reportName?: string,
 *   selectAllManagedAccounts?: bool,
 *   timezone?: string,
 * }
 */
final class MessagingCreateParams implements BaseModel
{
    /** @use SdkModel<messaging_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation.
     */
    #[Api('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * Start time in ISO format.
     */
    #[Api('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * List of connections to filter by.
     *
     * @var list<int>|null $connections
     */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    /**
     * List of directions to filter by (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $directions
     */
    #[Api(list: 'int', optional: true)]
    public ?array $directions;

    /**
     * List of filters to apply.
     *
     * @var list<Filter>|null $filters
     */
    #[Api(list: Filter::class, optional: true)]
    public ?array $filters;

    /**
     * Whether to include message body in the report.
     */
    #[Api('include_message_body', optional: true)]
    public ?bool $includeMessageBody;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Api('managed_accounts', list: 'string', optional: true)]
    public ?array $managedAccounts;

    /**
     * List of messaging profile IDs to filter by.
     *
     * @var list<string>|null $profiles
     */
    #[Api(list: 'string', optional: true)]
    public ?array $profiles;

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
     * Timezone for the report.
     */
    #[Api(optional: true)]
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
     * @param list<int> $connections
     * @param list<int> $directions
     * @param list<Filter> $filters
     * @param list<string> $managedAccounts
     * @param list<string> $profiles
     * @param list<int> $recordTypes
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
        $obj = new self;

        $obj->endTime = $endTime;
        $obj->startTime = $startTime;

        null !== $connections && $obj->connections = $connections;
        null !== $directions && $obj->directions = $directions;
        null !== $filters && $obj->filters = $filters;
        null !== $includeMessageBody && $obj->includeMessageBody = $includeMessageBody;
        null !== $managedAccounts && $obj->managedAccounts = $managedAccounts;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $recordTypes && $obj->recordTypes = $recordTypes;
        null !== $reportName && $obj->reportName = $reportName;
        null !== $selectAllManagedAccounts && $obj->selectAllManagedAccounts = $selectAllManagedAccounts;
        null !== $timezone && $obj->timezone = $timezone;

        return $obj;
    }

    /**
     * End time in ISO format. Note: If end time includes the last 4 hours, some MDRs might not appear in this report, due to wait time for downstream message delivery confirmation.
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
     * List of directions to filter by (Inbound = 1, Outbound = 2).
     *
     * @param list<int> $directions
     */
    public function withDirections(array $directions): self
    {
        $obj = clone $this;
        $obj->directions = $directions;

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
     * Whether to include message body in the report.
     */
    public function withIncludeMessageBody(bool $includeMessageBody): self
    {
        $obj = clone $this;
        $obj->includeMessageBody = $includeMessageBody;

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
     * List of messaging profile IDs to filter by.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $obj = clone $this;
        $obj->profiles = $profiles;

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
     * Timezone for the report.
     */
    public function withTimezone(string $timezone): self
    {
        $obj = clone $this;
        $obj->timezone = $timezone;

        return $obj;
    }
}
