<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Direction;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\RecordType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Status;

/**
 * @phpstan-type MdrDetailReportResponseShape = array{
 *   id?: string|null,
 *   connections?: list<int>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   directions?: list<value-of<Direction>>|null,
 *   endDate?: \DateTimeInterface|null,
 *   filters?: list<Filter>|null,
 *   profiles?: list<string>|null,
 *   recordType?: string|null,
 *   recordTypes?: list<value-of<RecordType>>|null,
 *   reportName?: string|null,
 *   reportURL?: string|null,
 *   startDate?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class MdrDetailReportResponse implements BaseModel
{
    /** @use SdkModel<MdrDetailReportResponseShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /** @var list<int>|null $connections */
    #[Optional(list: 'int')]
    public ?array $connections;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /** @var list<value-of<Direction>>|null $directions */
    #[Optional(list: Direction::class)]
    public ?array $directions;

    #[Optional('end_date')]
    public ?\DateTimeInterface $endDate;

    /** @var list<Filter>|null $filters */
    #[Optional(list: Filter::class)]
    public ?array $filters;

    /**
     * List of messaging profile IDs.
     *
     * @var list<string>|null $profiles
     */
    #[Optional(list: 'string')]
    public ?array $profiles;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<value-of<RecordType>>|null $recordTypes */
    #[Optional('record_types', list: RecordType::class)]
    public ?array $recordTypes;

    #[Optional('report_name')]
    public ?string $reportName;

    #[Optional('report_url')]
    public ?string $reportURL;

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
     * @param list<int> $connections
     * @param list<Direction|value-of<Direction>> $directions
     * @param list<Filter|array{
     *   billingGroup?: string|null,
     *   cld?: string|null,
     *   cldFilter?: value-of<CldFilter>|null,
     *   cli?: string|null,
     *   cliFilter?: value-of<CliFilter>|null,
     *   filterType?: value-of<FilterType>|null,
     *   tagsList?: string|null,
     * }> $filters
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $connections && $self['connections'] = $connections;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $directions && $self['directions'] = $directions;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $filters && $self['filters'] = $filters;
        null !== $profiles && $self['profiles'] = $profiles;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $recordTypes && $self['recordTypes'] = $recordTypes;
        null !== $reportName && $self['reportName'] = $reportName;
        null !== $reportURL && $self['reportURL'] = $reportURL;
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

    /**
     * @param list<Direction|value-of<Direction>> $directions
     */
    public function withDirections(array $directions): self
    {
        $self = clone $this;
        $self['directions'] = $directions;

        return $self;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * @param list<Filter|array{
     *   billingGroup?: string|null,
     *   cld?: string|null,
     *   cldFilter?: value-of<CldFilter>|null,
     *   cli?: string|null,
     *   cliFilter?: value-of<CliFilter>|null,
     *   filterType?: value-of<FilterType>|null,
     *   tagsList?: string|null,
     * }> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * List of messaging profile IDs.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
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

    /**
     * @param list<RecordType|value-of<RecordType>> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $self = clone $this;
        $self['recordTypes'] = $recordTypes;

        return $self;
    }

    public function withReportName(string $reportName): self
    {
        $self = clone $this;
        $self['reportName'] = $reportName;

        return $self;
    }

    public function withReportURL(string $reportURL): self
    {
        $self = clone $this;
        $self['reportURL'] = $reportURL;

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
