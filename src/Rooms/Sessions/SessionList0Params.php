<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\Rooms\Sessions\SessionList0Params\Page;

/**
 * View a list of room sessions.
 *
 * @see Telnyx\Rooms\Sessions->list0
 *
 * @phpstan-type session_list_0_params = array{
 *   filter?: Filter, includeParticipants?: bool, page?: Page
 * }
 */
final class SessionList0Params implements BaseModel
{
    /** @use SdkModel<session_list_0_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * To decide if room participants should be included in the response.
     */
    #[Api(optional: true)]
    public ?bool $includeParticipants;

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
        ?bool $includeParticipants = null,
        ?Page $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $includeParticipants && $obj->includeParticipants = $includeParticipants;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * To decide if room participants should be included in the response.
     */
    public function withIncludeParticipants(bool $includeParticipants): self
    {
        $obj = clone $this;
        $obj->includeParticipants = $includeParticipants;

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
