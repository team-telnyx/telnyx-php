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
 * @phpstan-type FilterShape = array{
 *   dateCreatedAt?: DateCreatedAt|null,
 *   sessionID?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param DateCreatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateCreatedAt
     * @param Status|value-of<Status> $status
     */
    public static function with(
        DateCreatedAt|array|null $dateCreatedAt = null,
        ?string $sessionID = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $dateCreatedAt && $obj['dateCreatedAt'] = $dateCreatedAt;
        null !== $sessionID && $obj['sessionID'] = $sessionID;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param DateCreatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateCreatedAt
     */
    public function withDateCreatedAt(DateCreatedAt|array $dateCreatedAt): self
    {
        $obj = clone $this;
        $obj['dateCreatedAt'] = $dateCreatedAt;

        return $obj;
    }

    /**
     * The session_id for filtering room compositions.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }

    /**
     * The status for filtering room compositions.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
