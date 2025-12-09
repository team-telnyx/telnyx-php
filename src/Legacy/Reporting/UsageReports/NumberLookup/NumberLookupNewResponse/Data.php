<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data\Result;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data\Result\Aggregation;

/**
 * Telco data usage report response.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   aggregationType?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endDate?: \DateTimeInterface|null,
 *   managedAccounts?: list<string>|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: list<Result>|null,
 *   startDate?: \DateTimeInterface|null,
 *   status?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
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
    #[Optional('aggregation_type')]
    public ?string $aggregationType;

    /**
     * Timestamp when the report was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * End date of the report period.
     */
    #[Optional('end_date')]
    public ?\DateTimeInterface $endDate;

    /**
     * List of managed account IDs included in the report.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Optional('managed_accounts', list: 'string')]
    public ?array $managedAccounts;

    /**
     * Record type identifier.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * URL to download the complete report.
     */
    #[Optional('report_url')]
    public ?string $reportURL;

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
    #[Optional('start_date')]
    public ?\DateTimeInterface $startDate;

    /**
     * Current status of the report.
     */
    #[Optional]
    public ?string $status;

    /**
     * Timestamp when the report was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $managedAccounts
     * @param list<Result|array{
     *   aggregations?: list<Aggregation>|null,
     *   recordType?: string|null,
     *   userID?: string|null,
     * }> $result
     */
    public static function with(
        ?string $id = null,
        ?string $aggregationType = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $endDate = null,
        ?array $managedAccounts = null,
        ?string $recordType = null,
        ?string $reportURL = null,
        ?array $result = null,
        ?\DateTimeInterface $startDate = null,
        ?string $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $aggregationType && $obj['aggregationType'] = $aggregationType;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $managedAccounts && $obj['managedAccounts'] = $managedAccounts;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $reportURL && $obj['reportURL'] = $reportURL;
        null !== $result && $obj['result'] = $result;
        null !== $startDate && $obj['startDate'] = $startDate;
        null !== $status && $obj['status'] = $status;
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
     * Type of aggregation used in the report.
     */
    public function withAggregationType(string $aggregationType): self
    {
        $obj = clone $this;
        $obj['aggregationType'] = $aggregationType;

        return $obj;
    }

    /**
     * Timestamp when the report was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * End date of the report period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

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
        $obj['managedAccounts'] = $managedAccounts;

        return $obj;
    }

    /**
     * Record type identifier.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * URL to download the complete report.
     */
    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['reportURL'] = $reportURL;

        return $obj;
    }

    /**
     * Array of usage records.
     *
     * @param list<Result|array{
     *   aggregations?: list<Aggregation>|null,
     *   recordType?: string|null,
     *   userID?: string|null,
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
        $obj['startDate'] = $startDate;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
