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
 * @phpstan-type MessagingListResponseShape = array{
 *   data?: list<MdrDetailReportResponse>|null, meta?: BatchCsvPaginationMeta|null
 * }
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<MessagingListResponseShape> */
    use SdkModel;

    /** @var list<MdrDetailReportResponse>|null $data */
    #[Api(list: MdrDetailReportResponse::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * }> $data
     * @param BatchCsvPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(BatchCsvPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
