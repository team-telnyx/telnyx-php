<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\ReportingPaginationMeta77109e5d17;
use Telnyx\Reports\ReportListMdrsResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Reports\ReportListMdrsResponse\Data
 * @phpstan-import-type ReportingPaginationMeta77109e5d17Shape from \Telnyx\Reports\MdrUsageReports\ReportingPaginationMeta77109e5d17
 *
 * @phpstan-type ReportListMdrsResponseShape = array{
 *   data?: list<Data|DataShape>|null,
 *   meta?: null|ReportingPaginationMeta77109e5d17|ReportingPaginationMeta77109e5d17Shape,
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
    public ?ReportingPaginationMeta77109e5d17 $meta;

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
     * @param ReportingPaginationMeta77109e5d17|ReportingPaginationMeta77109e5d17Shape|null $meta
     */
    public static function with(
        ?array $data = null,
        ReportingPaginationMeta77109e5d17|array|null $meta = null
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
     * @param ReportingPaginationMeta77109e5d17|ReportingPaginationMeta77109e5d17Shape $meta
     */
    public function withMeta(
        ReportingPaginationMeta77109e5d17|array $meta
    ): self {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
