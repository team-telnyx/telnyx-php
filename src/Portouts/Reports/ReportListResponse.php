<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\PortoutReport\ReportType;
use Telnyx\Portouts\Reports\PortoutReport\Status;

/**
 * @phpstan-type ReportListResponseShape = array{
 *   data?: list<PortoutReport>|null, meta?: PaginationMeta|null
 * }
 */
final class ReportListResponse implements BaseModel
{
    /** @use SdkModel<ReportListResponseShape> */
    use SdkModel;

    /** @var list<PortoutReport>|null $data */
    #[Optional(list: PortoutReport::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortoutReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   recordType?: string|null,
     *   reportType?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<PortoutReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   params?: ExportPortoutsCsvReport|null,
     *   recordType?: string|null,
     *   reportType?: value-of<ReportType>|null,
     *   status?: value-of<Status>|null,
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
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
