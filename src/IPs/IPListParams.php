<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IPs\IPListParams\Filter;
use Telnyx\IPs\IPListParams\Page;

/**
 * Get all IPs belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\IPsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\IPs\IPListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\IPs\IPListParams\Page
 *
 * @phpstan-type IPListParamsShape = array{
 *   filter?: FilterShape|null, page?: PageShape|null
 * }
 */
final class IPListParams implements BaseModel
{
    /** @use SdkModel<IPListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     * @param FilterShape $filter
     * @param PageShape $page
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
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
