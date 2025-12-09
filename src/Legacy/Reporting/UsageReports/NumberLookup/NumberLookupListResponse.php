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
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<Result>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param StandardPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<Result>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: string|null,
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
     * @param StandardPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(StandardPaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
