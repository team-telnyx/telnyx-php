<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Direction;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\RecordType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Status;

/**
 * @phpstan-type MessagingListResponseShape = array{
 *   data?: list<MdrDetailReportResponse>|null, meta?: BatchCsvPaginationMeta|null
 * }
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<MessagingListResponseShape> */
    use SdkModel;

    /** @var list<MdrDetailReportResponse>|null $data */
    #[Optional(list: MdrDetailReportResponse::class)]
    public ?array $data;

    #[Optional]
    public ?BatchCsvPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MdrDetailReportResponse|array{
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
     * }> $data
     * @param BatchCsvPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        BatchCsvPaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MdrDetailReportResponse|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param BatchCsvPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(BatchCsvPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
