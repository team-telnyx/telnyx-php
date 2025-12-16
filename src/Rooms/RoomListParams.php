<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomListParams\Page;

/**
 * View a list of rooms.
 *
 * @see Telnyx\Services\RoomsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\RoomListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Rooms\RoomListParams\Page
 *
 * @phpstan-type RoomListParamsShape = array{
 *   filter?: FilterShape|null, includeSessions?: bool|null, page?: PageShape|null
 * }
 */
final class RoomListParams implements BaseModel
{
    /** @use SdkModel<RoomListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * To decide if room sessions should be included in the response.
     */
    #[Optional]
    public ?bool $includeSessions;

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
        ?bool $includeSessions = null,
        Page|array|null $page = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $includeSessions && $self['includeSessions'] = $includeSessions;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name].
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
     * To decide if room sessions should be included in the response.
     */
    public function withIncludeSessions(bool $includeSessions): self
    {
        $self = clone $this;
        $self['includeSessions'] = $includeSessions;

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
