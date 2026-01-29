<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters;

/**
 * List Virtual Cross Connects Cloud Coverage.<br /><br />This endpoint shows which cloud regions are available for the `location_code` your Virtual Cross Connect will be provisioned in.
 *
 * @see Telnyx\Services\VirtualCrossConnectsCoverageService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter
 * @phpstan-import-type FiltersShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters
 *
 * @phpstan-type VirtualCrossConnectsCoverageListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   filters?: null|Filters|FiltersShape,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
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

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

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
     */
    public static function with(
        Filter|array|null $filter = null,
        Filters|array|null $filters = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $filters && $self['filters'] = $filters;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

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

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
