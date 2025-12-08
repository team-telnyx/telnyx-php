<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse\Data\Result;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse\Data\Result\Aggregation;

/**
 * Telco data usage report response.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   aggregation_type?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   end_date?: \DateTimeInterface|null,
 *   managed_accounts?: list<string>|null,
 *   record_type?: string|null,
 *   report_url?: string|null,
 *   result?: list<Result>|null,
 *   start_date?: \DateTimeInterface|null,
 *   status?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the report.
     */
    #[Optional]
    public ?string $id;

    /**
     * Type of aggregation used in the report.
     */
    #[Optional]
    public ?string $aggregation_type;

    /**
     * Timestamp when the report was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * End date of the report period.
     */
    #[Optional]
    public ?\DateTimeInterface $end_date;

    /**
     * List of managed account IDs included in the report.
     *
     * @var list<string>|null $managed_accounts
     */
    #[Optional(list: 'string')]
    public ?array $managed_accounts;

    /**
     * Record type identifier.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * URL to download the complete report.
     */
    #[Optional]
    public ?string $report_url;

    /**
     * Array of usage records.
     *
     * @var list<Result>|null $result
     */
    #[Optional(list: Result::class)]
    public ?array $result;

    /**
     * Start date of the report period.
     */
    #[Optional]
    public ?\DateTimeInterface $start_date;

    /**
     * Current status of the report.
     */
    #[Optional]
    public ?string $status;

    /**
     * Timestamp when the report was last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $managed_accounts
     * @param list<Result|array{
     *   aggregations?: list<Aggregation>|null,
     *   record_type?: string|null,
     *   user_id?: string|null,
     * }> $result
     */
    public static function with(
        ?string $id = null,
        ?string $aggregation_type = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $end_date = null,
        ?array $managed_accounts = null,
        ?string $record_type = null,
        ?string $report_url = null,
        ?array $result = null,
        ?\DateTimeInterface $start_date = null,
        ?string $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $aggregation_type && $obj['aggregation_type'] = $aggregation_type;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $managed_accounts && $obj['managed_accounts'] = $managed_accounts;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $report_url && $obj['report_url'] = $report_url;
        null !== $result && $obj['result'] = $result;
        null !== $start_date && $obj['start_date'] = $start_date;
        null !== $status && $obj['status'] = $status;
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
     * Type of aggregation used in the report.
     */
    public function withAggregationType(string $aggregationType): self
    {
        $obj = clone $this;
        $obj['aggregation_type'] = $aggregationType;

        return $obj;
    }

    /**
     * Timestamp when the report was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * End date of the report period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    /**
     * List of managed account IDs included in the report.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $obj = clone $this;
        $obj['managed_accounts'] = $managedAccounts;

        return $obj;
    }

    /**
     * Record type identifier.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * URL to download the complete report.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['report_url'] = $reportURL;

        return $obj;
    }

    /**
     * Array of usage records.
     *
     * @param list<Result|array{
     *   aggregations?: list<Aggregation>|null,
     *   record_type?: string|null,
     *   user_id?: string|null,
     * }> $result
     */
    public function withResult(array $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }

    /**
     * Start date of the report period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    /**
     * Current status of the report.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Timestamp when the report was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
