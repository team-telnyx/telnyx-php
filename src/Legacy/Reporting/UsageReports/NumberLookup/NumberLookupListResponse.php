<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\StandardPaginationMeta;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse\Data;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListResponse\Data\Result;

/**
 * @phpstan-type NumberLookupListResponseShape = array{
 *   data?: list<Data>|null, meta?: StandardPaginationMeta|null
 * }
 */
final class NumberLookupListResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   aggregation_type?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: string|null,
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
     * @param list<Data|array{
     *   id?: string|null,
     *   aggregation_type?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: string|null,
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
