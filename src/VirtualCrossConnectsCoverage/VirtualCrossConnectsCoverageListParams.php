<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page;

/**
 * List Virtual Cross Connects Cloud Coverage.<br /><br />This endpoint shows which cloud regions are available for the `location_code` your Virtual Cross Connect will be provisioned in.
 *
 * @see Telnyx\Services\VirtualCrossConnectsCoverageService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter
 * @phpstan-import-type FiltersShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters
 * @phpstan-import-type PageShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page
 *
 * @phpstan-type VirtualCrossConnectsCoverageListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   filters?: null|Filters|FiltersShape,
 *   page?: null|Page|PageShape,
 * }
 */
final class VirtualCrossConnectsCoverageListParams implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectsCoverageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains].
     */
    #[Optional]
    public ?Filters $filters;

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
     * @param Filters|FiltersShape|null $filters
     * @param Page|PageShape|null $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Filters|array|null $filters = null,
        Page|array|null $page = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $filters && $self['filters'] = $filters;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
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
     * Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains].
     *
     * @param Filters|FiltersShape $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

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
