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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $connections && $obj['connections'] = $connections;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $directions && $obj['directions'] = $directions;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $filters && $obj['filters'] = $filters;
        null !== $profiles && $obj['profiles'] = $profiles;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $recordTypes && $obj['recordTypes'] = $recordTypes;
        null !== $reportName && $obj['reportName'] = $reportName;
        null !== $reportURL && $obj['reportURL'] = $reportURL;
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
        $obj['endDate'] = $endDate;

        return $obj;
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
        $obj = clone $this;
        $obj['filters'] = $filters;

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
        $obj['profiles'] = $profiles;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
        $obj['reportName'] = $reportName;

        return $obj;
    }

    public function withReportURL(string $reportURL): self
    {
        $obj = clone $this;
        $obj['reportURL'] = $reportURL;

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
