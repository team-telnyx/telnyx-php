<?php

declare(strict_types=1);

namespace Telnyx\Tunnels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Tunnels\TunnelListParams\Filter;
use Telnyx\Tunnels\TunnelListParams\Page;
use Telnyx\Tunnels\TunnelListParams\Sort;

/**
 * Lists the tunnels on the account with their status and connected tunnel processes. Responses never include `tunnel_token`.
 *
 * @see Telnyx\Services\TunnelsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Tunnels\TunnelListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Tunnels\TunnelListParams\Page
 *
 * @phpstan-type TunnelListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class TunnelListParams implements BaseModel
{
    /** @use SdkModel<TunnelListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[status].
     */
    #[Optional]
    public ?Filter $filter;

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
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[status].
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
