<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Direction;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\RecordType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Status;

/**
 * @phpstan-type mdr_detail_report_response = array{
 *   id?: string,
 *   connections?: list<int>,
 *   createdAt?: \DateTimeInterface,
 *   directions?: list<value-of<Direction>>,
 *   endDate?: \DateTimeInterface,
 *   filters?: list<Filter>,
 *   profiles?: list<string>,
 *   recordType?: string,
 *   recordTypes?: list<value-of<RecordType>>,
 *   reportName?: string,
 *   reportURL?: string,
 *   startDate?: \DateTimeInterface,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class MdrDetailReportResponse implements BaseModel
{
    /** @use SdkModel<mdr_detail_report_response> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var list<int>|null $connections */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /** @var list<value-of<Direction>>|null $directions */
    #[Api(list: Direction::class, optional: true)]
    public ?array $directions;

    #[Api('end_date', optional: true)]
    public ?\DateTimeInterface $endDate;

    /** @var list<Filter>|null $filters */
    #[Api(list: Filter::class, optional: true)]
    public ?array $filters;

    /**
     * List of messaging profile IDs.
     *
     * @var list<string>|null $profiles
     */
    #[Api(list: 'string', optional: true)]
    public ?array $profiles;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /** @var list<value-of<RecordType>>|null $recordTypes */
    #[Api('record_types', list: RecordType::class, optional: true)]
    public ?array $recordTypes;

    #[Api('report_name', optional: true)]
    public ?string $reportName;

    #[Api('report_url', optional: true)]
    public ?string $reportURL;

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
     * @param list<int> $connections
     * @param list<Direction|value-of<Direction>> $directions
     * @param list<Filter> $filters
     * @param list<string> $profiles
     * @param list<RecordType|value-of<RecordType>> $recordTypes
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?array $connections = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $directions = null,
        ?\DateTimeInterface $endDate = null,
        ?array $filters = null,
        ?array $profiles = null,
        ?string $recordType = null,
        ?array $recordTypes = null,
        ?string $reportName = null,
        ?string $reportURL = null,
        ?\DateTimeInterface $startDate = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connections && $obj->connections = $connections;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $directions && $obj['directions'] = $directions;
        null !== $endDate && $obj->endDate = $endDate;
        null !== $filters && $obj->filters = $filters;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $recordTypes && $obj['recordTypes'] = $recordTypes;
        null !== $reportName && $obj->reportName = $reportName;
        null !== $reportURL && $obj->reportURL = $reportURL;
        null !== $startDate && $obj->startDate = $startDate;
        null !== $status && $obj['status'] = $status;
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

    /**
     * @param list<Direction|value-of<Direction>> $directions
     */
    public function withDirections(array $directions): self
    {
        $obj = clone $this;
        $obj['directions'] = $directions;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * @param list<Filter> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }

    /**
     * List of messaging profile IDs.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
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

    /**
     * @param list<RecordType|value-of<RecordType>> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $obj = clone $this;
        $obj['recordTypes'] = $recordTypes;

        return $obj;
    }

    public function withReportName(string $reportName): self
    {
        $obj = clone $this;
        $obj->reportName = $reportName;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->reportURL = $reportURL;

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
        $obj['status'] = $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
