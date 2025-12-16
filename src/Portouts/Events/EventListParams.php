<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListParams\Filter;
use Telnyx\Portouts\Events\EventListParams\Page;

/**
 * Returns a list of all port-out events.
 *
 * @see Telnyx\Services\Portouts\EventsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\Events\EventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Portouts\Events\EventListParams\Page
 *
 * @phpstan-type EventListParamsShape = array{
 *   filter?: FilterShape|null, page?: PageShape|null
 * }
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<EventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at].
     */
    #[Optional]
    public ?Filter $filter;

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
     * Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at].
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
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
