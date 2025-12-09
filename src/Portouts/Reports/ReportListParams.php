<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ReportListParams\Filter;
use Telnyx\Portouts\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Portouts\Reports\ReportListParams\Filter\Status;
use Telnyx\Portouts\Reports\ReportListParams\Page;

/**
 * List the reports generated about port-out operations.
 *
 * @see Telnyx\Services\Portouts\ReportsService::list()
 *
 * @phpstan-type ReportListParamsShape = array{
 *   filter?: Filter|array{
 *     reportType?: value-of<ReportType>|null, status?: value-of<Status>|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
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
     * @param Filter|array{
     *   reportType?: value-of<ReportType>|null, status?: value-of<Status>|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
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
     * @param Filter|array{
     *   reportType?: value-of<ReportType>|null, status?: value-of<Status>|null
     * } $filter
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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
