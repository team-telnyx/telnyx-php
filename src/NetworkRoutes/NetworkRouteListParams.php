<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Page;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Sort;

/**
 * Lists the routes of the account's Networks. A Network's list is its effective route table: the routes added with `POST /network_routes` (`origin` `static`) and the routes that its attachments install (`origin` `attachment`). Lookup is longest prefix within the Network.
 *
 * @see Telnyx\Services\NetworkRoutesService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Page
 *
 * @phpstan-type NetworkRouteListParamsShape = array{
 *   filter: Filter|FilterShape,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class NetworkRouteListParams implements BaseModel
{
    /** @use SdkModel<NetworkRouteListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[network_id], filter[origin], filter[next_hop.type], filter[cidr], filter[status].
     */
    #[Required]
    public Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[limit].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Sorts the results by a field, ascending, or descending with a leading `-`. The default is `-created_at`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * `new NetworkRouteListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NetworkRouteListParams::with(filter: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NetworkRouteListParams)->withFilter(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape $filter
     * @param Page|PageShape|null $page
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array $filter,
        Page|array|null $page = null,
        Sort|string|null $sort = null
    ): self {
        $self = new self;

        $self['filter'] = $filter;

        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[network_id], filter[origin], filter[next_hop.type], filter[cidr], filter[status].
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
     * Consolidated page parameter (deepObject style). Originally: page[after], page[limit].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Sorts the results by a field, ascending, or descending with a leading `-`. The default is `-created_at`.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
