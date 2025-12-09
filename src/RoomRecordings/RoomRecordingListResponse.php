<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Status;
use Telnyx\RoomRecordings\RoomRecordingListResponse\Type;

/**
 * @phpstan-type RoomRecordingListResponseShape = array{
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
final class RoomRecordingListResponse implements BaseModel
{
    /** @use SdkModel<RoomRecordingListResponseShape> */
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $codec && $self['codec'] = $codec;
        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $downloadURL && $self['downloadURL'] = $downloadURL;
        null !== $durationSecs && $self['durationSecs'] = $durationSecs;
        null !== $endedAt && $self['endedAt'] = $endedAt;
        null !== $participantID && $self['participantID'] = $participantID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $roomID && $self['roomID'] = $roomID;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $sizeMB && $self['sizeMB'] = $sizeMB;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A unique identifier for the room recording.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Shows the codec used for the room recording.
     */
    public function withCodec(string $codec): self
    {
        $self = clone $this;
        $self['codec'] = $codec;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room recording has completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room recording was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Url to download the recording.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $self = clone $this;
        $self['downloadURL'] = $downloadURL;

        return $self;
    }

    /**
     * Shows the room recording duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $self = clone $this;
        $self['durationSecs'] = $durationSecs;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room recording has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * Identify the room participant associated with the room recording.
     */
    public function withParticipantID(string $participantID): self
    {
        $self = clone $this;
        $self['participantID'] = $participantID;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identify the room associated with the room recording.
     */
    public function withRoomID(string $roomID): self
    {
        $self = clone $this;
        $self['roomID'] = $roomID;

        return $self;
    }

    /**
     * Identify the room session associated with the room recording.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Shows the room recording size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $self = clone $this;
        $self['sizeMB'] = $sizeMB;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room recording has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Shows the room recording status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Shows the room recording type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room recording was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
