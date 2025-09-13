<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Result;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Status;

/**
 * @phpstan-type mdr_usage_report = array{
 *   id?: string,
 *   aggregationType?: value-of<AggregationType>,
 *   connections?: list<int>,
 *   createdAt?: \DateTimeInterface,
 *   endDate?: \DateTimeInterface,
 *   profiles?: string,
 *   recordType?: string,
 *   reportURL?: string,
 *   result?: list<Result>,
 *   startDate?: \DateTimeInterface,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class MdrUsageReport implements BaseModel
{
    /** @use SdkModel<mdr_usage_report> */
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

    #[Api('end_date', optional: true)]
    public ?\DateTimeInterface $endDate;

    #[Api(optional: true)]
    public ?string $profiles;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('report_url', optional: true)]
    public ?string $reportURL;

    /** @var list<Result>|null $result */
    #[Api(list: Result::class, optional: true)]
    public ?array $result;

    #[Api('start_date', optional: true)]
    public ?\DateTimeInterface $startDate;

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
     * @param list<Result> $result
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        AggregationType|string|null $aggregationType = null,
        ?array $connections = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $endDate = null,
        ?string $profiles = null,
        ?string $recordType = null,
        ?string $reportURL = null,
        ?array $result = null,
        ?\DateTimeInterface $startDate = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $aggregationType && $obj->aggregationType = $aggregationType instanceof AggregationType ? $aggregationType->value : $aggregationType;
        null !== $connections && $obj->connections = $connections;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $endDate && $obj->endDate = $endDate;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $result && $obj->result = $result;
        null !== $startDate && $obj->startDate = $startDate;
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

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

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
        $obj->startDate = $startDate;

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
