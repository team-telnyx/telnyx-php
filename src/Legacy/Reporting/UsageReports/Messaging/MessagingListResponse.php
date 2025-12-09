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
     *   aggregationType?: int|null,
     *   connections?: list<string>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: mixed,
     *   startTime?: \DateTimeInterface|null,
     *   status?: int|null,
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
     * @param list<MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregationType?: int|null,
     *   connections?: list<string>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: mixed,
     *   startTime?: \DateTimeInterface|null,
     *   status?: int|null,
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
