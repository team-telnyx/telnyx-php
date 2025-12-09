<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices\Contains;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Page;

/**
 * List all locations and the interfaces that region supports.
 *
 * @see Telnyx\Services\NetworkCoverageService::list()
 *
 * @phpstan-type NetworkCoverageListParamsShape = array{
 *   filter?: Filter|array{
 *     locationCode?: string|null,
 *     locationPop?: string|null,
 *     locationRegion?: string|null,
 *     locationSite?: string|null,
 *   },
 *   filters?: Filters|array{
 *     availableServices?: null|Contains|value-of<AvailableService>
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class NetworkCoverageListParams implements BaseModel
{
    /** @use SdkModel<NetworkCoverageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains].
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
     *   locationCode?: string|null,
     *   locationPop?: string|null,
     *   locationRegion?: string|null,
     *   locationSite?: string|null,
     * } $filter
     * @param Filters|array{
     *   availableServices?: Contains|value-of<AvailableService>|null
     * } $filters
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
     * Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
     *
     * @param Filter|array{
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
     * Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains].
     *
     * @param Filters|array{
     *   availableServices?: Contains|value-of<AvailableService>|null
     * } $filters
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
