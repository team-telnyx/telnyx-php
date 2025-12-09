<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomListParams\Filter\DateCreatedAt;
use Telnyx\Rooms\RoomListParams\Filter\DateUpdatedAt;
use Telnyx\Rooms\RoomListParams\Page;

/**
 * View a list of rooms.
 *
 * @see Telnyx\Services\RoomsService::list()
 *
 * @phpstan-type RoomListParamsShape = array{
 *   filter?: Filter|array{
 *     dateCreatedAt?: DateCreatedAt|null,
 *     dateUpdatedAt?: DateUpdatedAt|null,
 *     uniqueName?: string|null,
 *   },
 *   includeSessions?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
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
     * @param Filter|array{
     *   dateCreatedAt?: DateCreatedAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     *   uniqueName?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
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
     * @param Filter|array{
     *   dateCreatedAt?: DateCreatedAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     *   uniqueName?: string|null,
     * } $filter
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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
