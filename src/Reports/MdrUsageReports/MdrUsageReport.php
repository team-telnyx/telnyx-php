<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Result;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Status;

/**
 * @phpstan-import-type ResultShape from \Telnyx\Reports\MdrUsageReports\MdrUsageReport\Result
 *
 * @phpstan-type MdrUsageReportShape = array{
 *   id?: string|null,
 *   aggregationType?: null|AggregationType|value-of<AggregationType>,
 *   connections?: list<int>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endDate?: \DateTimeInterface|null,
 *   profiles?: string|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: list<ResultShape>|null,
 *   startDate?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class MdrUsageReport implements BaseModel
{
    /** @use SdkModel<MdrUsageReportShape> */
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

    #[Optional('end_date')]
    public ?\DateTimeInterface $endDate;

    #[Optional]
    public ?string $profiles;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('report_url')]
    public ?string $reportURL;

    /** @var list<Result>|null $result */
    #[Optional(list: Result::class)]
    public ?array $result;

    #[Optional('start_date')]
    public ?\DateTimeInterface $startDate;

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
     * @param AggregationType|value-of<AggregationType>|null $aggregationType
     * @param list<int>|null $connections
     * @param list<ResultShape>|null $result
     * @param Status|value-of<Status>|null $status
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $aggregationType && $self['aggregationType'] = $aggregationType;
        null !== $connections && $self['connections'] = $connections;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $profiles && $self['profiles'] = $profiles;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $reportURL && $self['reportURL'] = $reportURL;
        null !== $result && $self['result'] = $result;
        null !== $startDate && $self['startDate'] = $startDate;
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

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    public function withProfiles(string $profiles): self
    {
        $self = clone $this;
        $self['profiles'] = $profiles;

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
     * @param list<ResultShape> $result
     */
    public function withResult(array $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

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
