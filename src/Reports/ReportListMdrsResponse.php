<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\PaginationMetaReporting;
use Telnyx\Reports\ReportListMdrsResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Reports\ReportListMdrsResponse\Data
 * @phpstan-import-type PaginationMetaReportingShape from \Telnyx\Reports\MdrUsageReports\PaginationMetaReporting
 *
 * @phpstan-type ReportListMdrsResponseShape = array{
 *   data?: list<Data|DataShape>|null,
 *   meta?: null|PaginationMetaReporting|PaginationMetaReportingShape,
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
     * @param list<Data|DataShape>|null $data
     * @param PaginationMetaReporting|PaginationMetaReportingShape|null $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaReporting|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaReporting|PaginationMetaReportingShape $meta
     */
    public function withMeta(PaginationMetaReporting|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
