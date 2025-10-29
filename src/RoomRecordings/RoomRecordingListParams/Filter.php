<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter\DateEndedAt;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter\DateStartedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs].
 *
 * @phpstan-type FilterShape = array{
 *   dateEndedAt?: DateEndedAt,
 *   dateStartedAt?: DateStartedAt,
 *   durationSecs?: int,
 *   participantID?: string,
 *   roomID?: string,
 *   sessionID?: string,
 *   status?: string,
 *   type?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api('date_ended_at', optional: true)]
    public ?DateEndedAt $dateEndedAt;

    #[Api('date_started_at', optional: true)]
    public ?DateStartedAt $dateStartedAt;

    /**
     * duration_secs greater or equal for filtering room recordings.
     */
    #[Api('duration_secs', optional: true)]
    public ?int $durationSecs;

    /**
     * participant_id for filtering room recordings.
     */
    #[Api('participant_id', optional: true)]
    public ?string $participantID;

    /**
     * room_id for filtering room recordings.
     */
    #[Api('room_id', optional: true)]
    public ?string $roomID;

    /**
     * session_id for filtering room recordings.
     */
    #[Api('session_id', optional: true)]
    public ?string $sessionID;

    /**
     * status for filtering room recordings.
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * type for filtering room recordings.
     */
    #[Api(optional: true)]
    public ?string $type;

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
        ?DateEndedAt $dateEndedAt = null,
        ?DateStartedAt $dateStartedAt = null,
        ?int $durationSecs = null,
        ?string $participantID = null,
        ?string $roomID = null,
        ?string $sessionID = null,
        ?string $status = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $dateEndedAt && $obj->dateEndedAt = $dateEndedAt;
        null !== $dateStartedAt && $obj->dateStartedAt = $dateStartedAt;
        null !== $durationSecs && $obj->durationSecs = $durationSecs;
        null !== $participantID && $obj->participantID = $participantID;
        null !== $roomID && $obj->roomID = $roomID;
        null !== $sessionID && $obj->sessionID = $sessionID;
        null !== $status && $obj->status = $status;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    public function withDateEndedAt(DateEndedAt $dateEndedAt): self
    {
        $obj = clone $this;
        $obj->dateEndedAt = $dateEndedAt;

        return $obj;
    }

    public function withDateStartedAt(DateStartedAt $dateStartedAt): self
    {
        $obj = clone $this;
        $obj->dateStartedAt = $dateStartedAt;

        return $obj;
    }

    /**
     * duration_secs greater or equal for filtering room recordings.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj->durationSecs = $durationSecs;

        return $obj;
    }

    /**
     * participant_id for filtering room recordings.
     */
    public function withParticipantID(string $participantID): self
    {
        $obj = clone $this;
        $obj->participantID = $participantID;

        return $obj;
    }

    /**
     * room_id for filtering room recordings.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj->roomID = $roomID;

        return $obj;
    }

    /**
     * session_id for filtering room recordings.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }

    /**
     * status for filtering room recordings.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * type for filtering room recordings.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
