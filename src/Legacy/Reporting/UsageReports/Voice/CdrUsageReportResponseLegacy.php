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
 *   aggregation_type?: int|null,
 *   connections?: list<string>|null,
 *   created_at?: \DateTimeInterface|null,
 *   end_time?: \DateTimeInterface|null,
 *   product_breakdown?: int|null,
 *   record_type?: string|null,
 *   report_url?: string|null,
 *   result?: mixed,
 *   start_time?: \DateTimeInterface|null,
 *   status?: int|null,
 *   updated_at?: \DateTimeInterface|null,
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
    #[Optional]
    public ?int $aggregation_type;

    /** @var list<string>|null $connections */
    #[Optional(list: 'string')]
    public ?array $connections;

    #[Optional]
    public ?\DateTimeInterface $created_at;

    #[Optional]
    public ?\DateTimeInterface $end_time;

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    #[Optional]
    public ?int $product_breakdown;

    #[Optional]
    public ?string $record_type;

    #[Optional]
    public ?string $report_url;

    #[Optional]
    public mixed $result;

    #[Optional]
    public ?\DateTimeInterface $start_time;

    /**
     * Status of the report: Pending = 1, Complete = 2, Failed = 3, Expired = 4.
     */
    #[Optional]
    public ?int $status;

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
     * @param list<string> $connections
     */
    public static function with(
        ?string $id = null,
        ?int $aggregation_type = null,
        ?array $connections = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $end_time = null,
        ?int $product_breakdown = null,
        ?string $record_type = null,
        ?string $report_url = null,
        mixed $result = null,
        ?\DateTimeInterface $start_time = null,
        ?int $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $aggregation_type && $obj['aggregation_type'] = $aggregation_type;
        null !== $connections && $obj['connections'] = $connections;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $product_breakdown && $obj['product_breakdown'] = $product_breakdown;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $report_url && $obj['report_url'] = $report_url;
        null !== $result && $obj['result'] = $result;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['aggregation_type'] = $aggregationType;

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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * Product breakdown type: No breakdown = 0, DID vs Toll-free = 1, Country = 2, DID vs Toll-free per Country = 3.
     */
    public function withProductBreakdown(int $productBreakdown): self
    {
        $obj = clone $this;
        $obj['product_breakdown'] = $productBreakdown;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['report_url'] = $reportURL;

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
        $obj['start_time'] = $startTime;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
