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
 *   dateEndedAt?: DateEndedAt|null,
 *   dateStartedAt?: DateStartedAt|null,
 *   durationSecs?: int|null,
 *   participantID?: string|null,
 *   roomID?: string|null,
 *   sessionID?: string|null,
 *   status?: string|null,
 *   type?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('date_ended_at')]
    public ?DateEndedAt $dateEndedAt;

    #[Optional('date_started_at')]
    public ?DateStartedAt $dateStartedAt;

    /**
     * duration_secs greater or equal for filtering room recordings.
     */
    #[Optional('duration_secs')]
    public ?int $durationSecs;

    /**
     * participant_id for filtering room recordings.
     */
    #[Optional('participant_id')]
    public ?string $participantID;

    /**
     * room_id for filtering room recordings.
     */
    #[Optional('room_id')]
    public ?string $roomID;

    /**
     * session_id for filtering room recordings.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

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
     * } $dateEndedAt
     * @param DateStartedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateStartedAt
     */
    public static function with(
        DateEndedAt|array|null $dateEndedAt = null,
        DateStartedAt|array|null $dateStartedAt = null,
        ?int $durationSecs = null,
        ?string $participantID = null,
        ?string $roomID = null,
        ?string $sessionID = null,
        ?string $status = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $dateEndedAt && $obj['dateEndedAt'] = $dateEndedAt;
        null !== $dateStartedAt && $obj['dateStartedAt'] = $dateStartedAt;
        null !== $durationSecs && $obj['durationSecs'] = $durationSecs;
        null !== $participantID && $obj['participantID'] = $participantID;
        null !== $roomID && $obj['roomID'] = $roomID;
        null !== $sessionID && $obj['sessionID'] = $sessionID;
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
        $obj['dateEndedAt'] = $dateEndedAt;

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
        $obj['dateStartedAt'] = $dateStartedAt;

        return $obj;
    }

    /**
     * duration_secs greater or equal for filtering room recordings.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj['durationSecs'] = $durationSecs;

        return $obj;
    }

    /**
     * participant_id for filtering room recordings.
     */
    public function withParticipantID(string $participantID): self
    {
        $obj = clone $this;
        $obj['participantID'] = $participantID;

        return $obj;
    }

    /**
     * room_id for filtering room recordings.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj['roomID'] = $roomID;

        return $obj;
    }

    /**
     * session_id for filtering room recordings.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

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
