<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\Messaging\StandardPaginationMeta;

/**
 * @phpstan-type NumberLookupListResponseShape = array{
 *   data?: list<TelcoDataUsageReportResponse>|null,
 *   meta?: StandardPaginationMeta|null,
 * }
 */
final class NumberLookupListResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupListResponseShape> */
    use SdkModel;

    /** @var list<TelcoDataUsageReportResponse>|null $data */
    #[Optional(list: TelcoDataUsageReportResponse::class)]
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
     * @param list<TelcoDataUsageReportResponse|array{
     *   id?: string|null,
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<TelcoDataUsageRecord>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param StandardPaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public static function with(
        ?array $data = null,
        StandardPaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<TelcoDataUsageReportResponse|array{
     *   id?: string|null,
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<TelcoDataUsageRecord>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: string|null,
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
     * @param StandardPaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public function withMeta(StandardPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
