<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage;

use Telnyx\Core\Attributes\Api;
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
 *     location_code?: string|null,
 *     location_pop?: string|null,
 *     location_region?: string|null,
 *     location_site?: string|null,
 *   },
 *   filters?: Filters|array{
 *     available_services?: null|Contains|value-of<AvailableService>
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
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains].
     */
    #[Api(optional: true)]
    public ?Filters $filters;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
     *   location_code?: string|null,
     *   location_pop?: string|null,
     *   location_region?: string|null,
     *   location_site?: string|null,
     * } $filter
     * @param Filters|array{
     *   available_services?: Contains|value-of<AvailableService>|null
     * } $filters
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Filters|array|null $filters = null,
        Page|array|null $page = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $filters && $obj['filters'] = $filters;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
     *
     * @param Filter|array{
     *   location_code?: string|null,
     *   location_pop?: string|null,
     *   location_region?: string|null,
     *   location_site?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains].
     *
     * @param Filters|array{
     *   available_services?: Contains|value-of<AvailableService>|null
     * } $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $obj = clone $this;
        $obj['filters'] = $filters;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
