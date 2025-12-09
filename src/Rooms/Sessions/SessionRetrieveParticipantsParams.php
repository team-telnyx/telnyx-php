<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter\DateJoinedAt;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter\DateLeftAt;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter\DateUpdatedAt;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Page;

/**
 * View a list of room participants.
 *
 * @see Telnyx\Services\Rooms\SessionsService::retrieveParticipants()
 *
 * @phpstan-type SessionRetrieveParticipantsParamsShape = array{
 *   filter?: Filter|array{
 *     context?: string|null,
 *     dateJoinedAt?: DateJoinedAt|null,
 *     dateLeftAt?: DateLeftAt|null,
 *     dateUpdatedAt?: DateUpdatedAt|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class SessionRetrieveParticipantsParams implements BaseModel
{
    /** @use SdkModel<SessionRetrieveParticipantsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context].
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
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
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
     * Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context].
     *
     * @param Filter|array{
     *   context?: string|null,
     *   dateJoinedAt?: DateJoinedAt|null,
     *   dateLeftAt?: DateLeftAt|null,
     *   dateUpdatedAt?: DateUpdatedAt|null,
     * } $filter
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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
