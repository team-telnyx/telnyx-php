<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateCreatedAt;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateEndedAt;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateUpdatedAt;
use Telnyx\Rooms\Sessions\SessionList0Params\Page;

/**
 * View a list of room sessions.
 *
 * @see Telnyx\Services\Rooms\SessionsService::list0()
 *
 * @phpstan-type SessionList0ParamsShape = array{
 *   filter?: Filter|array{
 *     active?: bool|null,
 *     dateCreatedAt?: DateCreatedAt|null,
 *     dateEndedAt?: DateEndedAt|null,
 *     dateUpdatedAt?: DateUpdatedAt|null,
 *     roomID?: string|null,
 *   },
 *   includeParticipants?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class SessionList0Params implements BaseModel
{
    /** @use SdkModel<SessionList0ParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * To decide if room participants should be included in the response.
     */
    #[Optional]
    public ?bool $includeParticipants;

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
     *   active?: bool|null,
     *   dateCreatedAt?: DateCreatedAt|null,
     *   dateEndedAt?: DateEndedAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     *   roomID?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        ?bool $includeParticipants = null,
        Page|array|null $page = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $includeParticipants && $obj['includeParticipants'] = $includeParticipants;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active].
     *
     * @param Filter|array{
     *   active?: bool|null,
     *   dateCreatedAt?: DateCreatedAt|null,
     *   dateEndedAt?: DateEndedAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     *   roomID?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * To decide if room participants should be included in the response.
     */
    public function withIncludeParticipants(bool $includeParticipants): self
    {
        $obj = clone $this;
        $obj['includeParticipants'] = $includeParticipants;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
