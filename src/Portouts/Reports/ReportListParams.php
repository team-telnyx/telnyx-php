<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ReportListParams\Filter;
use Telnyx\Portouts\Reports\ReportListParams\Page;

/**
 * List the reports generated about port-out operations.
 *
 * @see Telnyx\Services\Portouts\ReportsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\Reports\ReportListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Portouts\Reports\ReportListParams\Page
 *
 * @phpstan-type ReportListParamsShape = array{
 *   filter?: null|Filter|FilterShape, page?: null|Page|PageShape
 * }
 */
final class ReportListParams implements BaseModel
{
    /** @use SdkModel<ReportListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
