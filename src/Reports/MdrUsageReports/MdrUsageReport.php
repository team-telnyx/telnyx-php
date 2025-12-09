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
 * @phpstan-type MdrUsageReportShape = array{
 *   id?: string|null,
 *   aggregationType?: value-of<AggregationType>|null,
 *   connections?: list<int>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endDate?: \DateTimeInterface|null,
 *   profiles?: string|null,
 *   recordType?: string|null,
 *   reportURL?: string|null,
 *   result?: list<Result>|null,
 *   startDate?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param list<int> $connections
     * @param list<Result|array{
     *   carrierPassthroughFee?: string|null,
     *   connection?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   delivered?: string|null,
     *   direction?: string|null,
     *   messageType?: string|null,
     *   parts?: string|null,
     *   product?: string|null,
     *   profileID?: string|null,
     *   received?: string|null,
     *   sent?: string|null,
     *   tags?: string|null,
     *   tnType?: string|null,
     * }> $result
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

        null !== $id && $obj['id'] = $id;
        null !== $aggregationType && $obj['aggregationType'] = $aggregationType;
        null !== $connections && $obj['connections'] = $connections;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $profiles && $obj['profiles'] = $profiles;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $reportURL && $obj['reportURL'] = $reportURL;
        null !== $result && $obj['result'] = $result;
        null !== $startDate && $obj['startDate'] = $startDate;
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

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

        return $obj;
    }

    public function withProfiles(string $profiles): self
    {
        $obj = clone $this;
        $obj['profiles'] = $profiles;

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
     * @param list<Result|array{
     *   carrierPassthroughFee?: string|null,
     *   connection?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   delivered?: string|null,
     *   direction?: string|null,
     *   messageType?: string|null,
     *   parts?: string|null,
     *   product?: string|null,
     *   profileID?: string|null,
     *   received?: string|null,
     *   sent?: string|null,
     *   tags?: string|null,
     *   tnType?: string|null,
     * }> $result
     */
    public function withResult(array $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

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
