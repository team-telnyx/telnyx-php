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
     * Aggregation type: All = 0, By Connections = 1, By Tags = 2, By Billing Group = 3.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $obj = clone $this;
        $obj['aggregationType'] = $aggregationType;

        return $obj;
    }

    /**
     * @param list<string> $connections
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
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    public function withProductBreakdown(int $productBreakdown): self
    {
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

    public function withResult(mixed $result): self
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
     * Status of the report: Pending = 1, Complete = 2, Failed = 3, Expired = 4.
     */
    public function withStatus(int $status): self
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
