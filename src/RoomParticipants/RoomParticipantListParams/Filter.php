<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants\RoomParticipantListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter\DateJoinedAt;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter\DateLeftAt;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter\DateUpdatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id].
 *
 * @phpstan-type FilterShape = array{
 *   context?: string|null,
 *   date_joined_at?: DateJoinedAt|null,
 *   date_left_at?: DateLeftAt|null,
 *   date_updated_at?: DateUpdatedAt|null,
 *   session_id?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter room participants based on the context.
     */
    #[Api(optional: true)]
    public ?string $context;

    #[Api(optional: true)]
    public ?DateJoinedAt $date_joined_at;

    #[Api(optional: true)]
    public ?DateLeftAt $date_left_at;

    #[Api(optional: true)]
    public ?DateUpdatedAt $date_updated_at;

    /**
     * Session_id for filtering room participants.
     */
    #[Api(optional: true)]
    public ?string $session_id;

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
        ?string $context = null,
        ?DateJoinedAt $date_joined_at = null,
        ?DateLeftAt $date_left_at = null,
        ?DateUpdatedAt $date_updated_at = null,
        ?string $session_id = null,
    ): self {
        $obj = new self;

        null !== $context && $obj->context = $context;
        null !== $date_joined_at && $obj->date_joined_at = $date_joined_at;
        null !== $date_left_at && $obj->date_left_at = $date_left_at;
        null !== $date_updated_at && $obj->date_updated_at = $date_updated_at;
        null !== $session_id && $obj->session_id = $session_id;

        return $obj;
    }

    /**
     * Filter room participants based on the context.
     */
    public function withContext(string $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    public function withDateJoinedAt(DateJoinedAt $dateJoinedAt): self
    {
        $obj = clone $this;
        $obj->date_joined_at = $dateJoinedAt;

        return $obj;
    }

    public function withDateLeftAt(DateLeftAt $dateLeftAt): self
    {
        $obj = clone $this;
        $obj->date_left_at = $dateLeftAt;

        return $obj;
    }

    public function withDateUpdatedAt(DateUpdatedAt $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj->date_updated_at = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Session_id for filtering room participants.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->session_id = $sessionID;

        return $obj;
    }
}
