<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions\RoomCompositionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\DateCreatedAt;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   date_created_at?: DateCreatedAt|null,
 *   session_id?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?DateCreatedAt $date_created_at;

    /**
     * The session_id for filtering room compositions.
     */
    #[Api(optional: true)]
    public ?string $session_id;

    /**
     * The status for filtering room compositions.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
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
     * } $date_created_at
     * @param Status|value-of<Status> $status
     */
    public static function with(
        DateCreatedAt|array|null $date_created_at = null,
        ?string $session_id = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $date_created_at && $obj['date_created_at'] = $date_created_at;
        null !== $session_id && $obj['session_id'] = $session_id;
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
        $obj['date_created_at'] = $dateCreatedAt;

        return $obj;
    }

    /**
     * The session_id for filtering room compositions.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['session_id'] = $sessionID;

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
