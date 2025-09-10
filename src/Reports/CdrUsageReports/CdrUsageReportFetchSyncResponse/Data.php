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
 * @phpstan-type data_alias = array{
 *   id?: string|null,
 *   aggregationType?: value-of<AggregationType>|null,
 *   connections?: list<int>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endTime?: \DateTimeInterface|null,
 *   productBreakdown?: value-of<ProductBreakdown>|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: array<string, mixed>|null,
 *   startTime?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var value-of<AggregationType>|null $aggregationType */
    #[Api('aggregation_type', enum: AggregationType::class, optional: true)]
    public ?string $aggregationType;

    /** @var list<int>|null $connections */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('end_time', optional: true)]
    public ?\DateTimeInterface $endTime;

    /** @var value-of<ProductBreakdown>|null $productBreakdown */
    #[Api('product_breakdown', enum: ProductBreakdown::class, optional: true)]
    public ?string $productBreakdown;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('report_url', optional: true)]
    public ?string $reportURL;

    /** @var array<string, mixed>|null $result */
    #[Api(map: 'mixed', optional: true)]
    public ?array $result;

    #[Api('start_time', optional: true)]
    public ?\DateTimeInterface $startTime;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api('updated_at', optional: true)]
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
     * @param array<string, mixed> $result
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

        null !== $id && $obj->id = $id;
        null !== $aggregationType && $obj->aggregationType = $aggregationType instanceof AggregationType ? $aggregationType->value : $aggregationType;
        null !== $connections && $obj->connections = $connections;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $productBreakdown && $obj->productBreakdown = $productBreakdown instanceof ProductBreakdown ? $productBreakdown->value : $productBreakdown;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $result && $obj->result = $result;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->aggregationType = $aggregationType instanceof AggregationType ? $aggregationType->value : $aggregationType;

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
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $obj = clone $this;
        $obj->productBreakdown = $productBreakdown instanceof ProductBreakdown ? $productBreakdown->value : $productBreakdown;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->reportURL = $reportURL;

        return $obj;
    }

    /**
     * @param array<string, mixed> $result
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
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
