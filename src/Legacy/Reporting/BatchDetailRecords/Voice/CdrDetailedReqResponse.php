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
 *   callTypes?: list<int>|null,
 *   connections?: list<int>|null,
 *   createdAt?: string|null,
 *   endTime?: string|null,
 *   filters?: list<Filter>|null,
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $callTypes && $obj['callTypes'] = $callTypes;
        null !== $connections && $obj['connections'] = $connections;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $endTime && $obj['endTime'] = $endTime;
        null !== $filters && $obj['filters'] = $filters;
        null !== $managedAccounts && $obj['managedAccounts'] = $managedAccounts;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $recordTypes && $obj['recordTypes'] = $recordTypes;
        null !== $reportName && $obj['reportName'] = $reportName;
        null !== $reportURL && $obj['reportURL'] = $reportURL;
        null !== $retry && $obj['retry'] = $retry;
        null !== $source && $obj['source'] = $source;
        null !== $startTime && $obj['startTime'] = $startTime;
        null !== $status && $obj['status'] = $status;
        null !== $timezone && $obj['timezone'] = $timezone;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
        $obj['callTypes'] = $callTypes;

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
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['endTime'] = $endTime;

        return $obj;
    }

    /**
     * List of filters.
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
        $obj['managedAccounts'] = $managedAccounts;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
        $obj['recordTypes'] = $recordTypes;

        return $obj;
    }

    /**
     * Name of the report.
     */
    public function withReportName(string $reportName): self
    {
        $obj = clone $this;
        $obj['reportName'] = $reportName;

        return $obj;
    }

    /**
     * URL to download the report.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['reportURL'] = $reportURL;

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
        $obj['startTime'] = $startTime;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
