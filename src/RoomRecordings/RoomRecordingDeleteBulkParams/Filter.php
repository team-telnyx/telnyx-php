<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter\DateEndedAt;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter\DateStartedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs].
 *
 * @phpstan-type FilterShape = array{
 *   date_ended_at?: DateEndedAt|null,
 *   date_started_at?: DateStartedAt|null,
 *   duration_secs?: int|null,
 *   participant_id?: string|null,
 *   room_id?: string|null,
 *   session_id?: string|null,
 *   status?: string|null,
 *   type?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?DateEndedAt $date_ended_at;

    #[Optional]
    public ?DateStartedAt $date_started_at;

    /**
     * duration_secs greater or equal for filtering room recordings.
     */
    #[Optional]
    public ?int $duration_secs;

    /**
     * participant_id for filtering room recordings.
     */
    #[Optional]
    public ?string $participant_id;

    /**
     * room_id for filtering room recordings.
     */
    #[Optional]
    public ?string $room_id;

    /**
     * session_id for filtering room recordings.
     */
    #[Optional]
    public ?string $session_id;

    /**
     * status for filtering room recordings.
     */
    #[Optional]
    public ?string $status;

    /**
     * type for filtering room recordings.
     */
    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DateEndedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_ended_at
     * @param DateStartedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_started_at
     */
    public static function with(
        DateEndedAt|array|null $date_ended_at = null,
        DateStartedAt|array|null $date_started_at = null,
        ?int $duration_secs = null,
        ?string $participant_id = null,
        ?string $room_id = null,
        ?string $session_id = null,
        ?string $status = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $date_ended_at && $obj['date_ended_at'] = $date_ended_at;
        null !== $date_started_at && $obj['date_started_at'] = $date_started_at;
        null !== $duration_secs && $obj['duration_secs'] = $duration_secs;
        null !== $participant_id && $obj['participant_id'] = $participant_id;
        null !== $room_id && $obj['room_id'] = $room_id;
        null !== $session_id && $obj['session_id'] = $session_id;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param DateEndedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateEndedAt
     */
    public function withDateEndedAt(DateEndedAt|array $dateEndedAt): self
    {
        $obj = clone $this;
        $obj['date_ended_at'] = $dateEndedAt;

        return $obj;
    }

    /**
     * @param DateStartedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateStartedAt
     */
    public function withDateStartedAt(DateStartedAt|array $dateStartedAt): self
    {
        $obj = clone $this;
        $obj['date_started_at'] = $dateStartedAt;

        return $obj;
    }

    /**
     * duration_secs greater or equal for filtering room recordings.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj['duration_secs'] = $durationSecs;

        return $obj;
    }

    /**
     * participant_id for filtering room recordings.
     */
    public function withParticipantID(string $participantID): self
    {
        $obj = clone $this;
        $obj['participant_id'] = $participantID;

        return $obj;
    }

    /**
     * room_id for filtering room recordings.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj['room_id'] = $roomID;

        return $obj;
    }

    /**
     * session_id for filtering room recordings.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['session_id'] = $sessionID;

        return $obj;
    }

    /**
     * status for filtering room recordings.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * type for filtering room recordings.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
