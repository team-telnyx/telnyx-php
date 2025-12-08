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
 * @phpstan-type MdrUsageReportListResponseShape = array{
 *   data?: list<MdrUsageReport>|null, meta?: PaginationMetaReporting|null
 * }
 */
final class MdrUsageReportListResponse implements BaseModel
{
    /** @use SdkModel<MdrUsageReportListResponseShape> */
    use SdkModel;

    /** @var list<MdrUsageReport>|null $data */
    #[Api(list: MdrUsageReport::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   aggregation_type?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   profiles?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMetaReporting|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaReporting|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MdrUsageReport|array{
     *   id?: string|null,
     *   aggregation_type?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   profiles?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
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
     * @param PaginationMetaReporting|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaReporting|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
