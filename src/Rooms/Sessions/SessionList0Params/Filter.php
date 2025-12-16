<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\SessionList0Params;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateCreatedAt;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateEndedAt;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateUpdatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active].
 *
 * @phpstan-import-type DateCreatedAtShape from \Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateCreatedAt
 * @phpstan-import-type DateEndedAtShape from \Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateEndedAt
 * @phpstan-import-type DateUpdatedAtShape from \Telnyx\Rooms\Sessions\SessionList0Params\Filter\DateUpdatedAt
 *
 * @phpstan-type FilterShape = array{
 *   active?: bool|null,
 *   dateCreatedAt?: null|DateCreatedAt|DateCreatedAtShape,
 *   dateEndedAt?: null|DateEndedAt|DateEndedAtShape,
 *   dateUpdatedAt?: null|DateUpdatedAt|DateUpdatedAtShape,
 *   roomID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter active or inactive room sessions.
     */
    #[Optional]
    public ?bool $active;

    #[Optional('date_created_at')]
    public ?DateCreatedAt $dateCreatedAt;

    #[Optional('date_ended_at')]
    public ?DateEndedAt $dateEndedAt;

    #[Optional('date_updated_at')]
    public ?DateUpdatedAt $dateUpdatedAt;

    /**
     * Room_id for filtering room sessions.
     */
    #[Optional('room_id')]
    public ?string $roomID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DateCreatedAtShape $dateCreatedAt
     * @param DateEndedAtShape $dateEndedAt
     * @param DateUpdatedAtShape $dateUpdatedAt
     */
    public static function with(
        ?bool $active = null,
        DateCreatedAt|array|null $dateCreatedAt = null,
        DateEndedAt|array|null $dateEndedAt = null,
        DateUpdatedAt|array|null $dateUpdatedAt = null,
        ?string $roomID = null,
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $dateCreatedAt && $self['dateCreatedAt'] = $dateCreatedAt;
        null !== $dateEndedAt && $self['dateEndedAt'] = $dateEndedAt;
        null !== $dateUpdatedAt && $self['dateUpdatedAt'] = $dateUpdatedAt;
        null !== $roomID && $self['roomID'] = $roomID;

        return $self;
    }

    /**
     * Filter active or inactive room sessions.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * @param DateCreatedAtShape $dateCreatedAt
     */
    public function withDateCreatedAt(DateCreatedAt|array $dateCreatedAt): self
    {
        $self = clone $this;
        $self['dateCreatedAt'] = $dateCreatedAt;

        return $self;
    }

    /**
     * @param DateEndedAtShape $dateEndedAt
     */
    public function withDateEndedAt(DateEndedAt|array $dateEndedAt): self
    {
        $self = clone $this;
        $self['dateEndedAt'] = $dateEndedAt;

        return $self;
    }

    /**
     * @param DateUpdatedAtShape $dateUpdatedAt
     */
    public function withDateUpdatedAt(DateUpdatedAt|array $dateUpdatedAt): self
    {
        $self = clone $this;
        $self['dateUpdatedAt'] = $dateUpdatedAt;

        return $self;
    }

    /**
     * Room_id for filtering room sessions.
     */
    public function withRoomID(string $roomID): self
    {
        $self = clone $this;
        $self['roomID'] = $roomID;

        return $self;
    }
}
