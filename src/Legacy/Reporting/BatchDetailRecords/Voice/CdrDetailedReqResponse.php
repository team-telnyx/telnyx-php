<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * Response object for CDR detailed report.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\Filter
 *
 * @phpstan-type CdrDetailedReqResponseShape = array{
 *   id?: string|null,
 *   callTypes?: list<int>|null,
 *   connections?: list<int>|null,
 *   createdAt?: string|null,
 *   endTime?: string|null,
 *   filters?: list<FilterShape>|null,
 *   managedAccounts?: list<string>|null,
 *   recordType?: string|null,
 *   recordTypes?: list<int>|null,
 *   reportName?: string|null,
 *   reportURL?: string|null,
 *   retry?: int|null,
 *   source?: string|null,
 *   startTime?: string|null,
 *   status?: int|null,
 *   timezone?: string|null,
 *   updatedAt?: string|null,
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
     * @var list<int>|null $callTypes
     */
    #[Optional('call_types', list: 'int')]
    public ?array $callTypes;

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
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * End time in ISO format.
     */
    #[Optional('end_time')]
    public ?string $endTime;

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
     * @var list<string>|null $managedAccounts
     */
    #[Optional('managed_accounts', list: 'string')]
    public ?array $managedAccounts;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * List of record types (Complete = 1, Incomplete = 2, Errors = 3).
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
     * URL to download the report.
     */
    #[Optional('report_url')]
    public ?string $reportURL;

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
    #[Optional('start_time')]
    public ?string $startTime;

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
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
     * @param list<FilterShape> $filters
     * @param list<string> $managedAccounts
     * @param list<int> $recordTypes
     */
    public static function with(
        ?string $id = null,
        ?array $callTypes = null,
        ?array $connections = null,
        ?string $createdAt = null,
        ?string $endTime = null,
        ?array $filters = null,
        ?array $managedAccounts = null,
        ?string $recordType = null,
        ?array $recordTypes = null,
        ?string $reportName = null,
        ?string $reportURL = null,
        ?int $retry = null,
        ?string $source = null,
        ?string $startTime = null,
        ?int $status = null,
        ?string $timezone = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $callTypes && $self['callTypes'] = $callTypes;
        null !== $connections && $self['connections'] = $connections;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $filters && $self['filters'] = $filters;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $recordTypes && $self['recordTypes'] = $recordTypes;
        null !== $reportName && $self['reportName'] = $reportName;
        null !== $reportURL && $self['reportURL'] = $reportURL;
        null !== $retry && $self['retry'] = $retry;
        null !== $source && $self['source'] = $source;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $status && $self['status'] = $status;
        null !== $timezone && $self['timezone'] = $timezone;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Unique identifier for the report.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * List of call types (Inbound = 1, Outbound = 2).
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
     * List of connections.
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
     * Creation date of the report.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * List of filters.
     *
     * @param list<FilterShape> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * List of managed accounts.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $self = clone $this;
        $self['managedAccounts'] = $managedAccounts;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * List of record types (Complete = 1, Incomplete = 2, Errors = 3).
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
     * URL to download the report.
     */
    public function withReportURL(string $reportURL): self
    {
        $self = clone $this;
        $self['reportURL'] = $reportURL;

        return $self;
    }

    /**
     * Number of retries.
     */
    public function withRetry(int $retry): self
    {
        $self = clone $this;
        $self['retry'] = $retry;

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
     * Start time in ISO format.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    public function withStatus(int $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

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

    /**
     * Last update date of the report.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
