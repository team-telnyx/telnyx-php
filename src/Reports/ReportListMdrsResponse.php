<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\PaginationMetaReporting;
use Telnyx\Reports\ReportListMdrsResponse\Data;
use Telnyx\Reports\ReportListMdrsResponse\Data\Currency;
use Telnyx\Reports\ReportListMdrsResponse\Data\MessageType;
use Telnyx\Reports\ReportListMdrsResponse\Data\Status;

/**
 * @phpstan-type ReportListMdrsResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMetaReporting|null
 * }
 */
final class ReportListMdrsResponse implements BaseModel
{
    /** @use SdkModel<ReportListMdrsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   cld?: string|null,
     *   cli?: string|null,
     *   cost?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: value-of<Currency>|null,
     *   direction?: string|null,
     *   messageType?: value-of<MessageType>|null,
     *   parts?: float|null,
     *   profileName?: string|null,
     *   rate?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   cld?: string|null,
     *   cli?: string|null,
     *   cost?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: value-of<Currency>|null,
     *   direction?: string|null,
     *   messageType?: value-of<MessageType>|null,
     *   parts?: float|null,
     *   profileName?: string|null,
     *   rate?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaReporting|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
