<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters\AvailableBandwidth\Contains;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page;

/**
 * List Virtual Cross Connects Cloud Coverage.<br /><br />This endpoint shows which cloud regions are available for the `location_code` your Virtual Cross Connect will be provisioned in.
 *
 * @see Telnyx\Services\VirtualCrossConnectsCoverageService::list()
 *
 * @phpstan-type VirtualCrossConnectsCoverageListParamsShape = array{
 *   filter?: Filter|array{
 *     cloudProvider?: value-of<CloudProvider>|null,
 *     cloudProviderRegion?: string|null,
 *     locationCode?: string|null,
 *     locationPop?: string|null,
 *     locationRegion?: string|null,
 *     locationSite?: string|null,
 *   },
 *   filters?: Filters|array{availableBandwidth?: int|null|Contains},
 *   page?: Page|array{number?: int|null, size?: int|null},
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
     * @param Filter|array{
     *   cloudProvider?: value-of<CloudProvider>|null,
     *   cloudProviderRegion?: string|null,
     *   locationCode?: string|null,
     *   locationPop?: string|null,
     *   locationRegion?: string|null,
     *   locationSite?: string|null,
     * } $filter
     * @param Filters|array{availableBandwidth?: int|Contains|null} $filters
     * @param Page|array{number?: int|null, size?: int|null} $page
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
     * @param Filter|array{
     *   cloudProvider?: value-of<CloudProvider>|null,
     *   cloudProviderRegion?: string|null,
     *   locationCode?: string|null,
     *   locationPop?: string|null,
     *   locationRegion?: string|null,
     *   locationSite?: string|null,
     * } $filter
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
     * @param Filters|array{availableBandwidth?: int|Contains|null} $filters
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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
