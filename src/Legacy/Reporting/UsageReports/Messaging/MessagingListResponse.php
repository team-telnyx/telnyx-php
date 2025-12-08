<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingListResponseShape = array{
 *   data?: list<MdrUsageReportResponseLegacy>|null,
 *   meta?: StandardPaginationMeta|null,
 * }
 */
final class MessagingListResponse implements BaseModel
{
    /** @use SdkModel<MessagingListResponseShape> */
    use SdkModel;

    /** @var list<MdrUsageReportResponseLegacy>|null $data */
    #[Optional(list: MdrUsageReportResponseLegacy::class)]
    public ?array $data;

    #[Optional]
    public ?StandardPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: mixed,
     *   start_time?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param StandardPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        StandardPaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: mixed,
     *   start_time?: \DateTimeInterface|null,
     *   status?: int|null,
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
     * @param StandardPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(StandardPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
