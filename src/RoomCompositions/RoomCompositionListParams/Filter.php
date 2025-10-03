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
 * @phpstan-type filter_alias = array{
 *   dateCreatedAt?: DateCreatedAt, sessionID?: string, status?: value-of<Status>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api('date_created_at', optional: true)]
    public ?DateCreatedAt $dateCreatedAt;

    /**
     * The session_id for filtering room compositions.
     */
    #[Api('session_id', optional: true)]
    public ?string $sessionID;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?DateCreatedAt $dateCreatedAt = null,
        ?string $sessionID = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $dateCreatedAt && $obj->dateCreatedAt = $dateCreatedAt;
        null !== $sessionID && $obj->sessionID = $sessionID;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withDateCreatedAt(DateCreatedAt $dateCreatedAt): self
    {
        $obj = clone $this;
        $obj->dateCreatedAt = $dateCreatedAt;

        return $obj;
    }

    /**
     * The session_id for filtering room compositions.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

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
