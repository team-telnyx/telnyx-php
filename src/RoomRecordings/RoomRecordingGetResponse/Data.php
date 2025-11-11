<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data\Status;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   codec?: string|null,
 *   completed_at?: \DateTimeInterface|null,
 *   created_at?: \DateTimeInterface|null,
 *   download_url?: string|null,
 *   duration_secs?: int|null,
 *   ended_at?: \DateTimeInterface|null,
 *   participant_id?: string|null,
 *   record_type?: string|null,
 *   room_id?: string|null,
 *   session_id?: string|null,
 *   size_mb?: float|null,
 *   started_at?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A unique identifier for the room recording.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Shows the codec used for the room recording.
     */
    #[Api(optional: true)]
    public ?string $codec;

    /**
     * ISO 8601 timestamp when the room recording has completed.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $completed_at;

    /**
     * ISO 8601 timestamp when the room recording was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Url to download the recording.
     */
    #[Api(optional: true)]
    public ?string $download_url;

    /**
     * Shows the room recording duration in seconds.
     */
    #[Api(optional: true)]
    public ?int $duration_secs;

    /**
     * ISO 8601 timestamp when the room recording has ended.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $ended_at;

    /**
     * Identify the room participant associated with the room recording.
     */
    #[Api(optional: true)]
    public ?string $participant_id;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Identify the room associated with the room recording.
     */
    #[Api(optional: true)]
    public ?string $room_id;

    /**
     * Identify the room session associated with the room recording.
     */
    #[Api(optional: true)]
    public ?string $session_id;

    /**
     * Shows the room recording size in MB.
     */
    #[Api(optional: true)]
    public ?float $size_mb;

    /**
     * ISO 8601 timestamp when the room recording has stated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $started_at;

    /**
     * Shows the room recording status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Shows the room recording type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 timestamp when the room recording was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $codec = null,
        ?\DateTimeInterface $completed_at = null,
        ?\DateTimeInterface $created_at = null,
        ?string $download_url = null,
        ?int $duration_secs = null,
        ?\DateTimeInterface $ended_at = null,
        ?string $participant_id = null,
        ?string $record_type = null,
        ?string $room_id = null,
        ?string $session_id = null,
        ?float $size_mb = null,
        ?\DateTimeInterface $started_at = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $codec && $obj->codec = $codec;
        null !== $completed_at && $obj->completed_at = $completed_at;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $download_url && $obj->download_url = $download_url;
        null !== $duration_secs && $obj->duration_secs = $duration_secs;
        null !== $ended_at && $obj->ended_at = $ended_at;
        null !== $participant_id && $obj->participant_id = $participant_id;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $room_id && $obj->room_id = $room_id;
        null !== $session_id && $obj->session_id = $session_id;
        null !== $size_mb && $obj->size_mb = $size_mb;
        null !== $started_at && $obj->started_at = $started_at;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * A unique identifier for the room recording.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Shows the codec used for the room recording.
     */
    public function withCodec(string $codec): self
    {
        $obj = clone $this;
        $obj->codec = $codec;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording has completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completed_at = $completedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Url to download the recording.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $obj = clone $this;
        $obj->download_url = $downloadURL;

        return $obj;
    }

    /**
     * Shows the room recording duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj->duration_secs = $durationSecs;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->ended_at = $endedAt;

        return $obj;
    }

    /**
     * Identify the room participant associated with the room recording.
     */
    public function withParticipantID(string $participantID): self
    {
        $obj = clone $this;
        $obj->participant_id = $participantID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * Identify the room associated with the room recording.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj->room_id = $roomID;

        return $obj;
    }

    /**
     * Identify the room session associated with the room recording.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->session_id = $sessionID;

        return $obj;
    }

    /**
     * Shows the room recording size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $obj = clone $this;
        $obj->size_mb = $sizeMB;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->started_at = $startedAt;

        return $obj;
    }

    /**
     * Shows the room recording status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Shows the room recording type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
