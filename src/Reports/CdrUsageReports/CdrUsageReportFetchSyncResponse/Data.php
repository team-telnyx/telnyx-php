<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   aggregation_type?: value-of<AggregationType>|null,
 *   connections?: list<int>|null,
 *   created_at?: \DateTimeInterface|null,
 *   end_time?: \DateTimeInterface|null,
 *   product_breakdown?: value-of<ProductBreakdown>|null,
 *   record_type?: string|null,
 *   report_url?: string|null,
 *   result?: array<string,mixed>|null,
 *   start_time?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var value-of<AggregationType>|null $aggregation_type */
    #[Api(enum: AggregationType::class, optional: true)]
    public ?string $aggregation_type;

    /** @var list<int>|null $connections */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?\DateTimeInterface $end_time;

    /** @var value-of<ProductBreakdown>|null $product_breakdown */
    #[Api(enum: ProductBreakdown::class, optional: true)]
    public ?string $product_breakdown;

    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $report_url;

    /** @var array<string,mixed>|null $result */
    #[Api(map: 'mixed', optional: true)]
    public ?array $result;

    #[Api(optional: true)]
    public ?\DateTimeInterface $start_time;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api(optional: true)]
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
     * @param AggregationType|value-of<AggregationType> $aggregation_type
     * @param list<int> $connections
     * @param ProductBreakdown|value-of<ProductBreakdown> $product_breakdown
     * @param array<string,mixed> $result
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        AggregationType|string|null $aggregation_type = null,
        ?array $connections = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $end_time = null,
        ProductBreakdown|string|null $product_breakdown = null,
        ?string $record_type = null,
        ?string $report_url = null,
        ?array $result = null,
        ?\DateTimeInterface $start_time = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $aggregation_type && $obj['aggregation_type'] = $aggregation_type;
        null !== $connections && $obj->connections = $connections;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $end_time && $obj->end_time = $end_time;
        null !== $product_breakdown && $obj['product_breakdown'] = $product_breakdown;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $report_url && $obj->report_url = $report_url;
        null !== $result && $obj->result = $result;
        null !== $start_time && $obj->start_time = $start_time;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $obj = clone $this;
        $obj['aggregation_type'] = $aggregationType;

        return $obj;
    }

    /**
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj->connections = $connections;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->end_time = $endTime;

        return $obj;
    }

    /**
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $obj = clone $this;
        $obj['product_breakdown'] = $productBreakdown;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->report_url = $reportURL;

        return $obj;
    }

    /**
     * @param array<string,mixed> $result
     */
    public function withResult(array $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->start_time = $startTime;

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
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
