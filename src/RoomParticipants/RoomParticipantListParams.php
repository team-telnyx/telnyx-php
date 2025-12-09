<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter\DateJoinedAt;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter\DateLeftAt;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter\DateUpdatedAt;
use Telnyx\RoomParticipants\RoomParticipantListParams\Page;

/**
 * View a list of room participants.
 *
 * @see Telnyx\Services\RoomParticipantsService::list()
 *
 * @phpstan-type RoomParticipantListParamsShape = array{
 *   filter?: Filter|array{
 *     context?: string|null,
 *     dateJoinedAt?: DateJoinedAt|null,
 *     dateLeftAt?: DateLeftAt|null,
 *     dateUpdatedAt?: DateUpdatedAt|null,
 *     sessionID?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class RoomParticipantListParams implements BaseModel
{
    /** @use SdkModel<RoomParticipantListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id].
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
     * @param Filter|array{
     *   context?: string|null,
     *   dateJoinedAt?: DateJoinedAt|null,
     *   dateLeftAt?: DateLeftAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     *   sessionID?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id].
     *
     * @param Filter|array{
     *   context?: string|null,
     *   dateJoinedAt?: DateJoinedAt|null,
     *   dateLeftAt?: DateLeftAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     *   sessionID?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

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
