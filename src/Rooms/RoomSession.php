<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type RoomSessionShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endedAt?: \DateTimeInterface|null,
 *   participants?: list<RoomParticipant>|null,
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
     * @param list<RoomParticipant|array{
     *   id?: string|null,
     *   context?: string|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   sessionID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $participants
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $endedAt && $obj['endedAt'] = $endedAt;
        null !== $participants && $obj['participants'] = $participants;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $roomID && $obj['roomID'] = $roomID;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * A unique identifier for the room session.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Shows if the room session is active or not.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj['endedAt'] = $endedAt;

        return $obj;
    }

    /**
     * @param list<RoomParticipant|array{
     *   id?: string|null,
     *   context?: string|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   sessionID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $participants
     */
    public function withParticipants(array $participants): self
    {
        $obj = clone $this;
        $obj['participants'] = $participants;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identify the room hosting that room session.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj['roomID'] = $roomID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
