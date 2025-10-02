<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;

/**
 * Response object for CDR detailed report.
 *
 * @phpstan-type cdr_detailed_req_response = array{
 *   id?: string,
 *   callTypes?: list<int>,
 *   connections?: list<int>,
 *   createdAt?: string,
 *   endTime?: string,
 *   filters?: list<Filter>,
 *   managedAccounts?: list<string>,
 *   recordType?: string,
 *   recordTypes?: list<int>,
 *   reportName?: string,
 *   reportURL?: string,
 *   retry?: int,
 *   source?: string,
 *   startTime?: string,
 *   status?: int,
 *   timezone?: string,
 *   updatedAt?: string,
 * }
 */
final class CdrDetailedReqResponse implements BaseModel
{
    /** @use SdkModel<cdr_detailed_req_response> */
    use SdkModel;

    /**
     * Unique identifier for the report.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * List of call types (Inbound = 1, Outbound = 2).
     *
     * @var list<int>|null $callTypes
     */
    #[Api('call_types', list: 'int', optional: true)]
    public ?array $callTypes;

    /**
     * List of connections.
     *
     * @var list<int>|null $connections
     */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    /**
     * Creation date of the report.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * End time in ISO format.
     */
    #[Api('end_time', optional: true)]
    public ?string $endTime;

    /**
     * List of filters.
     *
     * @var list<Filter>|null $filters
     */
    #[Api(list: Filter::class, optional: true)]
    public ?array $filters;

    /**
     * List of managed accounts.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Api('managed_accounts', list: 'string', optional: true)]
    public ?array $managedAccounts;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * List of record types (Complete = 1, Incomplete = 2, Errors = 3).
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
     * URL to download the report.
     */
    #[Api('report_url', optional: true)]
    public ?string $reportURL;

    /**
     * Number of retries.
     */
    #[Api(optional: true)]
    public ?int $retry;

    /**
     * Source of the report. Valid values: calls (default), call-control, fax-api, webrtc.
     */
    #[Api(optional: true)]
    public ?string $source;

    /**
     * Start time in ISO format.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    #[Api(optional: true)]
    public ?int $status;

    /**
     * Timezone for the report.
     */
    #[Api(optional: true)]
    public ?string $timezone;

    /**
     * Last update date of the report.
     */
    #[Api('updated_at', optional: true)]
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
     * @param list<Filter> $filters
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

        null !== $id && $obj->id = $id;
        null !== $callTypes && $obj->callTypes = $callTypes;
        null !== $connections && $obj->connections = $connections;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $filters && $obj->filters = $filters;
        null !== $managedAccounts && $obj->managedAccounts = $managedAccounts;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $recordTypes && $obj->recordTypes = $recordTypes;
        null !== $reportName && $obj->reportName = $reportName;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $retry && $obj->retry = $retry;
        null !== $source && $obj->source = $source;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj->status = $status;
        null !== $timezone && $obj->timezone = $timezone;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Unique identifier for the report.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
        $obj->callTypes = $callTypes;

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
        $obj->connections = $connections;

        return $obj;
    }

    /**
     * Creation date of the report.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * End time in ISO format.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * List of filters.
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
     * List of managed accounts.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $obj = clone $this;
        $obj->managedAccounts = $managedAccounts;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
     * URL to download the report.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->reportURL = $reportURL;

        return $obj;
    }

    /**
     * Number of retries.
     */
    public function withRetry(int $retry): self
    {
        $obj = clone $this;
        $obj->retry = $retry;

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
     * Start time in ISO format.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * Status of the report (Pending = 1, Complete = 2, Failed = 3, Expired = 4).
     */
    public function withStatus(int $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

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

    /**
     * Last update date of the report.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
