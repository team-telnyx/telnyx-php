<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions\RoomCompositionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\DateCreatedAt;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status].
 *
 * @phpstan-import-type DateCreatedAtShape from \Telnyx\RoomCompositions\RoomCompositionListParams\Filter\DateCreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   dateCreatedAt?: null|DateCreatedAt|DateCreatedAtShape,
 *   sessionID?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('date_created_at')]
    public ?DateCreatedAt $dateCreatedAt;

    /**
     * The session_id for filtering room compositions.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    /**
     * The status for filtering room compositions.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DateCreatedAt|DateCreatedAtShape|null $dateCreatedAt
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        DateCreatedAt|array|null $dateCreatedAt = null,
        ?string $sessionID = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $dateCreatedAt && $self['dateCreatedAt'] = $dateCreatedAt;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * @param DateCreatedAt|DateCreatedAtShape $dateCreatedAt
     */
    public function withDateCreatedAt(DateCreatedAt|array $dateCreatedAt): self
    {
        $self = clone $this;
        $self['dateCreatedAt'] = $dateCreatedAt;

        return $self;
    }

    /**
     * The session_id for filtering room compositions.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * The status for filtering room compositions.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
