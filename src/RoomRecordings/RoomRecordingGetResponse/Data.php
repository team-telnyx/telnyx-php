<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings\RoomRecordingGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data\Status;
use Telnyx\RoomRecordings\RoomRecordingGetResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   codec?: string|null,
 *   completedAt?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   downloadURL?: string|null,
 *   durationSecs?: int|null,
 *   endedAt?: \DateTimeInterface|null,
 *   participantID?: string|null,
 *   recordType?: string|null,
 *   roomID?: string|null,
 *   sessionID?: string|null,
 *   sizeMB?: float|null,
 *   startedAt?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   type?: value-of<Type>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A unique identifier for the room recording.
     */
    #[Optional]
    public ?string $id;

    /**
     * Shows the codec used for the room recording.
     */
    #[Optional]
    public ?string $codec;

    /**
     * ISO 8601 timestamp when the room recording has completed.
     */
    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /**
     * ISO 8601 timestamp when the room recording was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Url to download the recording.
     */
    #[Optional('download_url')]
    public ?string $downloadURL;

    /**
     * Shows the room recording duration in seconds.
     */
    #[Optional('duration_secs')]
    public ?int $durationSecs;

    /**
     * ISO 8601 timestamp when the room recording has ended.
     */
    #[Optional('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * Identify the room participant associated with the room recording.
     */
    #[Optional('participant_id')]
    public ?string $participantID;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identify the room associated with the room recording.
     */
    #[Optional('room_id')]
    public ?string $roomID;

    /**
     * Identify the room session associated with the room recording.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    /**
     * Shows the room recording size in MB.
     */
    #[Optional('size_mb')]
    public ?float $sizeMB;

    /**
     * ISO 8601 timestamp when the room recording has stated.
     */
    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * Shows the room recording status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Shows the room recording type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * ISO 8601 timestamp when the room recording was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
        ?\DateTimeInterface $completedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $downloadURL = null,
        ?int $durationSecs = null,
        ?\DateTimeInterface $endedAt = null,
        ?string $participantID = null,
        ?string $recordType = null,
        ?string $roomID = null,
        ?string $sessionID = null,
        ?float $sizeMB = null,
        ?\DateTimeInterface $startedAt = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $codec && $obj['codec'] = $codec;
        null !== $completedAt && $obj['completedAt'] = $completedAt;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $downloadURL && $obj['downloadURL'] = $downloadURL;
        null !== $durationSecs && $obj['durationSecs'] = $durationSecs;
        null !== $endedAt && $obj['endedAt'] = $endedAt;
        null !== $participantID && $obj['participantID'] = $participantID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $roomID && $obj['roomID'] = $roomID;
        null !== $sessionID && $obj['sessionID'] = $sessionID;
        null !== $sizeMB && $obj['sizeMB'] = $sizeMB;
        null !== $startedAt && $obj['startedAt'] = $startedAt;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * A unique identifier for the room recording.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Shows the codec used for the room recording.
     */
    public function withCodec(string $codec): self
    {
        $obj = clone $this;
        $obj['codec'] = $codec;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording has completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Url to download the recording.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $obj = clone $this;
        $obj['downloadURL'] = $downloadURL;

        return $obj;
    }

    /**
     * Shows the room recording duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj['durationSecs'] = $durationSecs;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj['endedAt'] = $endedAt;

        return $obj;
    }

    /**
     * Identify the room participant associated with the room recording.
     */
    public function withParticipantID(string $participantID): self
    {
        $obj = clone $this;
        $obj['participantID'] = $participantID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identify the room associated with the room recording.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj['roomID'] = $roomID;

        return $obj;
    }

    /**
     * Identify the room session associated with the room recording.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }

    /**
     * Shows the room recording size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $obj = clone $this;
        $obj['sizeMB'] = $sizeMB;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room recording has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
