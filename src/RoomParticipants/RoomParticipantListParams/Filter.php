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
 * @phpstan-type filter_alias = array{
 *   context?: string|null,
 *   dateJoinedAt?: DateJoinedAt|null,
 *   dateLeftAt?: DateLeftAt|null,
 *   dateUpdatedAt?: DateUpdatedAt|null,
 *   sessionID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter room participants based on the context.
     */
    #[Api(optional: true)]
    public ?string $context;

    #[Api('date_joined_at', optional: true)]
    public ?DateJoinedAt $dateJoinedAt;

    #[Api('date_left_at', optional: true)]
    public ?DateLeftAt $dateLeftAt;

    #[Api('date_updated_at', optional: true)]
    public ?DateUpdatedAt $dateUpdatedAt;

    /**
     * Session_id for filtering room participants.
     */
    #[Api('session_id', optional: true)]
    public ?string $sessionID;

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
        ?DateJoinedAt $dateJoinedAt = null,
        ?DateLeftAt $dateLeftAt = null,
        ?DateUpdatedAt $dateUpdatedAt = null,
        ?string $sessionID = null,
    ): self {
        $obj = new self;

        null !== $context && $obj->context = $context;
        null !== $dateJoinedAt && $obj->dateJoinedAt = $dateJoinedAt;
        null !== $dateLeftAt && $obj->dateLeftAt = $dateLeftAt;
        null !== $dateUpdatedAt && $obj->dateUpdatedAt = $dateUpdatedAt;
        null !== $sessionID && $obj->sessionID = $sessionID;

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
        $obj->dateJoinedAt = $dateJoinedAt;

        return $obj;
    }

    public function withDateLeftAt(DateLeftAt $dateLeftAt): self
    {
        $obj = clone $this;
        $obj->dateLeftAt = $dateLeftAt;

        return $obj;
    }

    public function withDateUpdatedAt(DateUpdatedAt $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj->dateUpdatedAt = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Session_id for filtering room participants.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }
}
