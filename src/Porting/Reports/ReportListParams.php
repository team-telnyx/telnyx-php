<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ReportListParams\Filter;
use Telnyx\Porting\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Porting\Reports\ReportListParams\Filter\Status;
use Telnyx\Porting\Reports\ReportListParams\Page;

/**
 * List the reports generated about porting operations.
 *
 * @see Telnyx\Services\Porting\ReportsService::list()
 *
 * @phpstan-type ReportListParamsShape = array{
 *   filter?: Filter|array{
 *     report_type?: value-of<ReportType>|null, status?: value-of<Status>|null
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
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
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
     *   report_type?: value-of<ReportType>|null, status?: value-of<Status>|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status].
     *
     * @param Filter|array{
     *   report_type?: value-of<ReportType>|null, status?: value-of<Status>|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
