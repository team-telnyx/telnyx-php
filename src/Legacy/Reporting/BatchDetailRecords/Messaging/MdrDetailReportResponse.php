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
 * @phpstan-type MdrDetailReportResponseShape = array{
 *   id?: string|null,
 *   connections?: list<int>|null,
 *   created_at?: \DateTimeInterface|null,
 *   directions?: list<value-of<Direction>>|null,
 *   end_date?: \DateTimeInterface|null,
 *   filters?: list<Filter>|null,
 *   profiles?: list<string>|null,
 *   record_type?: string|null,
 *   record_types?: list<value-of<RecordType>>|null,
 *   report_name?: string|null,
 *   report_url?: string|null,
 *   start_date?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class MdrDetailReportResponse implements BaseModel
{
    /** @use SdkModel<MdrDetailReportResponseShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /** @var list<int>|null $connections */
    #[Api(list: 'int', optional: true)]
    public ?array $connections;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /** @var list<value-of<Direction>>|null $directions */
    #[Api(list: Direction::class, optional: true)]
    public ?array $directions;

    #[Api(optional: true)]
    public ?\DateTimeInterface $end_date;

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

    #[Api(optional: true)]
    public ?string $record_type;

    /** @var list<value-of<RecordType>>|null $record_types */
    #[Api(list: RecordType::class, optional: true)]
    public ?array $record_types;

    #[Api(optional: true)]
    public ?string $report_name;

    #[Api(optional: true)]
    public ?string $report_url;

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
     * @param list<int> $connections
     * @param list<Direction|value-of<Direction>> $directions
     * @param list<Filter> $filters
     * @param list<string> $profiles
     * @param list<RecordType|value-of<RecordType>> $record_types
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?array $connections = null,
        ?\DateTimeInterface $created_at = null,
        ?array $directions = null,
        ?\DateTimeInterface $end_date = null,
        ?array $filters = null,
        ?array $profiles = null,
        ?string $record_type = null,
        ?array $record_types = null,
        ?string $report_name = null,
        ?string $report_url = null,
        ?\DateTimeInterface $start_date = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connections && $obj->connections = $connections;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $directions && $obj['directions'] = $directions;
        null !== $end_date && $obj->end_date = $end_date;
        null !== $filters && $obj->filters = $filters;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $record_types && $obj['record_types'] = $record_types;
        null !== $report_name && $obj->report_name = $report_name;
        null !== $report_url && $obj->report_url = $report_url;
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
        $obj->end_date = $endDate;

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
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * @param list<RecordType|value-of<RecordType>> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $obj = clone $this;
        $obj['record_types'] = $recordTypes;

        return $obj;
    }

    public function withReportName(string $reportName): self
    {
        $obj = clone $this;
        $obj->report_name = $reportName;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj->report_url = $reportURL;

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
