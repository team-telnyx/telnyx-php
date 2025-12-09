<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Legacy V2 CDR usage report response.
 *
 * @phpstan-type CdrUsageReportResponseLegacyShape = array{
 *   id?: string|null,
 *   aggregationType?: int|null,
 *   connections?: list<string>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endTime?: \DateTimeInterface|null,
 *   productBreakdown?: int|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: mixed,
 *   startTime?: \DateTimeInterface|null,
 *   status?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class CdrUsageReportResponseLegacy implements BaseModel
{
    /** @use SdkModel<CdrUsageReportResponseLegacyShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    #[Optional('aggregation_type')]
    public ?int $aggregationType;

    /** @var list<string>|null $connections */
    #[Optional(list: 'string')]
    public ?array $connections;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    #[Optional('product_breakdown')]
    public ?int $productBreakdown;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('report_url')]
    public ?string $reportURL;

    #[Optional]
    public mixed $result;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /**
     * Status of the report: Pending = 1, Complete = 2, Failed = 3, Expired = 4.
     */
    #[Optional]
    public ?int $status;

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
     * @param list<string> $connections
     */
    public static function with(
        ?string $id = null,
        ?int $aggregationType = null,
        ?array $connections = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $endTime = null,
        ?int $productBreakdown = null,
        ?string $recordType = null,
        ?string $reportURL = null,
        mixed $result = null,
        ?\DateTimeInterface $startTime = null,
        ?int $status = null,
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
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * @param list<string> $connections
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
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    public function withProductBreakdown(int $productBreakdown): self
    {
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

    public function withResult(mixed $result): self
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
     * Status of the report: Pending = 1, Complete = 2, Failed = 3, Expired = 4.
     */
    public function withStatus(int $status): self
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
