<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants\RoomParticipantListParams;

use Telnyx\Core\Attributes\Optional;
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
 *   dateJoinedAt?: DateJoinedAt|null,
 *   dateLeftAt?: DateLeftAt|null,
 *   dateUpdatedAt?: DateUpdatedAt|null,
 *   sessionID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter room participants based on the context.
     */
    #[Optional]
    public ?string $context;

    #[Optional('date_joined_at')]
    public ?DateJoinedAt $dateJoinedAt;

    #[Optional('date_left_at')]
    public ?DateLeftAt $dateLeftAt;

    #[Optional('date_updated_at')]
    public ?DateUpdatedAt $dateUpdatedAt;

    /**
     * Session_id for filtering room participants.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DateJoinedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateJoinedAt
     * @param DateLeftAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateLeftAt
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateUpdatedAt
     */
    public static function with(
        ?string $context = null,
        DateJoinedAt|array|null $dateJoinedAt = null,
        DateLeftAt|array|null $dateLeftAt = null,
        DateUpdatedAt|array|null $dateUpdatedAt = null,
        ?string $sessionID = null,
    ): self {
        $obj = new self;

        null !== $context && $obj['context'] = $context;
        null !== $dateJoinedAt && $obj['dateJoinedAt'] = $dateJoinedAt;
        null !== $dateLeftAt && $obj['dateLeftAt'] = $dateLeftAt;
        null !== $dateUpdatedAt && $obj['dateUpdatedAt'] = $dateUpdatedAt;
        null !== $sessionID && $obj['sessionID'] = $sessionID;

        return $obj;
    }

    /**
     * Filter room participants based on the context.
     */
    public function withContext(string $context): self
    {
        $obj = clone $this;
        $obj['context'] = $context;

        return $obj;
    }

    /**
     * @param DateJoinedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateJoinedAt
     */
    public function withDateJoinedAt(DateJoinedAt|array $dateJoinedAt): self
    {
        $obj = clone $this;
        $obj['dateJoinedAt'] = $dateJoinedAt;

        return $obj;
    }

    /**
     * @param DateLeftAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateLeftAt
     */
    public function withDateLeftAt(DateLeftAt|array $dateLeftAt): self
    {
        $obj = clone $this;
        $obj['dateLeftAt'] = $dateLeftAt;

        return $obj;
    }

    /**
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateUpdatedAt
     */
    public function withDateUpdatedAt(DateUpdatedAt|array $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj['dateUpdatedAt'] = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Session_id for filtering room participants.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }
}
