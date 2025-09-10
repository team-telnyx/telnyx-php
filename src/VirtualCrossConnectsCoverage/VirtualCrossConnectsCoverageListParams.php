<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VirtualCrossConnectsCoverageListParams); // set properties as needed
 * $client->virtualCrossConnectsCoverage->list(...$params->toArray());
 * ```
 * List Virtual Cross Connects Cloud Coverage.<br /><br />This endpoint shows which cloud regions are available for the `location_code` your Virtual Cross Connect will be provisioned in.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->virtualCrossConnectsCoverage->list(...$params->toArray());`
 *
 * @see Telnyx\VirtualCrossConnectsCoverage->list
 *
 * @phpstan-type virtual_cross_connects_coverage_list_params = array{
 *   filter?: Filter, filters?: Filters, page?: Page
 * }
 */
final class VirtualCrossConnectsCoverageListParams implements BaseModel
{
    /** @use SdkModel<virtual_cross_connects_coverage_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains].
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
     */
    public static function with(
        ?Filter $filter = null,
        ?Filters $filters = null,
        ?Page $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $filters && $obj->filters = $filters;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains].
     */
    public function withFilters(Filters $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
