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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $aggregationType && $self['aggregationType'] = $aggregationType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $reportURL && $self['reportURL'] = $reportURL;
        null !== $result && $self['result'] = $result;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $status && $self['status'] = $status;
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
     * Type of aggregation used in the report.
     */
    public function withAggregationType(string $aggregationType): self
    {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * Timestamp when the report was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * End date of the report period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * List of managed account IDs included in the report.
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
     * Record type identifier.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * URL to download the complete report.
     */
    public function withReportURL(string $reportURL): self
    {
        $self = clone $this;
        $self['reportURL'] = $reportURL;

        return $self;
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
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    /**
     * Start date of the report period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Current status of the report.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Timestamp when the report was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
