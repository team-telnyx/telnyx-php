<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   aggregationType?: value-of<AggregationType>|null,
 *   connections?: list<int>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endTime?: \DateTimeInterface|null,
 *   productBreakdown?: value-of<ProductBreakdown>|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: array<string,mixed>|null,
 *   startTime?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /** @var value-of<AggregationType>|null $aggregationType */
    #[Optional('aggregation_type', enum: AggregationType::class)]
    public ?string $aggregationType;

    /** @var list<int>|null $connections */
    #[Optional(list: 'int')]
    public ?array $connections;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /** @var value-of<ProductBreakdown>|null $productBreakdown */
    #[Optional('product_breakdown', enum: ProductBreakdown::class)]
    public ?string $productBreakdown;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('report_url')]
    public ?string $reportURL;

    /** @var array<string,mixed>|null $result */
    #[Optional(map: 'mixed')]
    public ?array $result;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param list<int> $connections
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     * @param array<string,mixed> $result
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        AggregationType|string|null $aggregationType = null,
        ?array $connections = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $endTime = null,
        ProductBreakdown|string|null $productBreakdown = null,
        ?string $recordType = null,
        ?string $reportURL = null,
        ?array $result = null,
        ?\DateTimeInterface $startTime = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $aggregationType && $obj['aggregationType'] = $aggregationType;
        null !== $connections && $obj['connections'] = $connections;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $endTime && $obj['endTime'] = $endTime;
        null !== $productBreakdown && $obj['productBreakdown'] = $productBreakdown;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $reportURL && $obj['reportURL'] = $reportURL;
        null !== $result && $obj['result'] = $result;
        null !== $startTime && $obj['startTime'] = $startTime;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $obj = clone $this;
        $obj['aggregationType'] = $aggregationType;

        return $obj;
    }

    /**
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj['connections'] = $connections;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['endTime'] = $endTime;

        return $obj;
    }

    /**
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $obj = clone $this;
        $obj['productBreakdown'] = $productBreakdown;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['reportURL'] = $reportURL;

        return $obj;
    }

    /**
     * @param array<string,mixed> $result
     */
    public function withResult(array $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
