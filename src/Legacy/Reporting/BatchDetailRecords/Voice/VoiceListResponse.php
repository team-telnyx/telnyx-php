<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\BatchCsvPaginationMeta;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<CdrDetailedReqResponse>|null, meta?: BatchCsvPaginationMeta|null
 * }
 */
final class VoiceListResponse implements BaseModel
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    /** @var list<CdrDetailedReqResponse>|null $data */
    #[Optional(list: CdrDetailedReqResponse::class)]
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
     * @param list<CdrDetailedReqResponse|array{
     *   id?: string|null,
     *   call_types?: list<int>|null,
     *   connections?: list<int>|null,
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   filters?: list<Filter>|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   record_types?: list<int>|null,
     *   report_name?: string|null,
     *   report_url?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   start_time?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updated_at?: string|null,
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
     * @param list<CdrDetailedReqResponse|array{
     *   id?: string|null,
     *   call_types?: list<int>|null,
     *   connections?: list<int>|null,
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   filters?: list<Filter>|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   record_types?: list<int>|null,
     *   report_name?: string|null,
     *   report_url?: string|null,
     *   retry?: int|null,
     *   source?: string|null,
     *   start_time?: string|null,
     *   status?: int|null,
     *   timezone?: string|null,
     *   updated_at?: string|null,
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
