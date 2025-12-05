<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\StandardPaginationMeta;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<CdrUsageReportResponseLegacy>|null,
 *   meta?: StandardPaginationMeta|null,
 * }
 */
final class VoiceListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<CdrUsageReportResponseLegacy>|null $data */
    #[Api(list: CdrUsageReportResponseLegacy::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<CdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   product_breakdown?: int|null,
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
     * @param list<CdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   product_breakdown?: int|null,
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
