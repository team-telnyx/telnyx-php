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
 * @phpstan-type MdrUsageReportListResponseShape = array{
 *   data?: list<MdrUsageReport>|null, meta?: PaginationMetaReporting|null
 * }
 */
final class MdrUsageReportListResponse implements BaseModel
{
    /** @use SdkModel<MdrUsageReportListResponseShape> */
    use SdkModel;

    /** @var list<MdrUsageReport>|null $data */
    #[Optional(list: MdrUsageReport::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMetaReporting $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MdrUsageReport|array{
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
     * }> $data
     * @param PaginationMetaReporting|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaReporting|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MdrUsageReport|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaReporting|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaReporting|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
