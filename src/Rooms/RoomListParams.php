<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomListParams\Page;

/**
 * View a list of rooms.
 *
 * @see Telnyx\Rooms->list
 *
 * @phpstan-type RoomListParamsShape = array{
 *   filter?: Filter, include_sessions?: bool, page?: Page
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
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * To decide if room sessions should be included in the response.
     */
    #[Api(optional: true)]
    public ?bool $include_sessions;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
        ?bool $include_sessions = null,
        ?Page $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $include_sessions && $obj->include_sessions = $include_sessions;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * To decide if room sessions should be included in the response.
     */
    public function withIncludeSessions(bool $includeSessions): self
    {
        $obj = clone $this;
        $obj->include_sessions = $includeSessions;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
