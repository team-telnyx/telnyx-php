<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-import-type RoomParticipantShape from \Telnyx\RoomParticipant
 *
 * @phpstan-type RoomSessionShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endedAt?: \DateTimeInterface|null,
 *   participants?: list<RoomParticipantShape>|null,
 *   recordType?: string|null,
 *   roomID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class RoomSession implements BaseModel
{
    /** @use SdkModel<RoomSessionShape> */
    use SdkModel;

    /**
     * A unique identifier for the room session.
     */
    #[Optional]
    public ?string $id;

    /**
     * Shows if the room session is active or not.
     */
    #[Optional]
    public ?bool $active;

    /**
     * ISO 8601 timestamp when the room session was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    #[Optional('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /** @var list<RoomParticipant>|null $participants */
    #[Optional(list: RoomParticipant::class)]
    public ?array $participants;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identify the room hosting that room session.
     */
    #[Optional('room_id')]
    public ?string $roomID;

    /**
     * ISO 8601 timestamp when the room session was updated.
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
     * @param list<RoomParticipantShape>|null $participants
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $endedAt = null,
        ?array $participants = null,
        ?string $recordType = null,
        ?string $roomID = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endedAt && $self['endedAt'] = $endedAt;
        null !== $participants && $self['participants'] = $participants;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $roomID && $self['roomID'] = $roomID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A unique identifier for the room session.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Shows if the room session is active or not.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room session was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * @param list<RoomParticipantShape> $participants
     */
    public function withParticipants(array $participants): self
    {
        $self = clone $this;
        $self['participants'] = $participants;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identify the room hosting that room session.
     */
    public function withRoomID(string $roomID): self
    {
        $self = clone $this;
        $self['roomID'] = $roomID;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room session was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
