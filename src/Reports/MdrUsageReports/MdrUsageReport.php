<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Result;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Status;

/**
 * @phpstan-type MdrUsageReportShape = array{
 *   id?: string|null,
 *   aggregation_type?: value-of<AggregationType>|null,
 *   connections?: list<int>|null,
 *   created_at?: \DateTimeInterface|null,
 *   end_date?: \DateTimeInterface|null,
 *   profiles?: string|null,
 *   record_type?: string|null,
 *   report_url?: string|null,
 *   result?: list<Result>|null,
 *   start_date?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class MdrUsageReport implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MdrUsageReportShape> */
    use SdkModel;

    use SdkResponse;

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
    public ?\DateTimeInterface $end_date;

    #[Api(optional: true)]
    public ?string $profiles;

    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $report_url;

    /** @var list<Result>|null $result */
    #[Api(list: Result::class, optional: true)]
    public ?array $result;

    #[Api(optional: true)]
    public ?\DateTimeInterface $start_date;

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
     * @param list<Result> $result
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        AggregationType|string|null $aggregation_type = null,
        ?array $connections = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $end_date = null,
        ?string $profiles = null,
        ?string $record_type = null,
        ?string $report_url = null,
        ?array $result = null,
        ?\DateTimeInterface $start_date = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $aggregation_type && $obj['aggregation_type'] = $aggregation_type;
        null !== $connections && $obj->connections = $connections;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $end_date && $obj->end_date = $end_date;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $report_url && $obj->report_url = $report_url;
        null !== $result && $obj->result = $result;
        null !== $start_date && $obj->start_date = $start_date;
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

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->end_date = $endDate;

        return $obj;
    }

    public function withProfiles(string $profiles): self
    {
        $obj = clone $this;
        $obj->profiles = $profiles;

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
     * @param list<Result> $result
     */
    public function withResult(array $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->start_date = $startDate;

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
