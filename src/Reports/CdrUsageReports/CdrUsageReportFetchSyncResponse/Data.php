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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $aggregationType && $self['aggregationType'] = $aggregationType;
        null !== $connections && $self['connections'] = $connections;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $productBreakdown && $self['productBreakdown'] = $productBreakdown;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $reportURL && $self['reportURL'] = $reportURL;
        null !== $result && $self['result'] = $result;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * @param list<int> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $self = clone $this;
        $self['productBreakdown'] = $productBreakdown;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withReportURL(string $reportURL): self
    {
        $self = clone $this;
        $self['reportURL'] = $reportURL;

        return $self;
    }

    /**
     * @param array<string,mixed> $result
     */
    public function withResult(array $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
