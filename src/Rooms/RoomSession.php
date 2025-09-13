<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type room_session = array{
 *   id?: string,
 *   active?: bool,
 *   createdAt?: \DateTimeInterface,
 *   endedAt?: \DateTimeInterface,
 *   participants?: list<RoomParticipant>,
 *   recordType?: string,
 *   roomID?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class RoomSession implements BaseModel
{
    /** @use SdkModel<room_session> */
    use SdkModel;

    /**
     * A unique identifier for the room session.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Shows if the room session is active or not.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * ISO 8601 timestamp when the room session was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    #[Api('ended_at', optional: true)]
    public ?\DateTimeInterface $endedAt;

    /** @var list<RoomParticipant>|null $participants */
    #[Api(list: RoomParticipant::class, optional: true)]
    public ?array $participants;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Identify the room hosting that room session.
     */
    #[Api('room_id', optional: true)]
    public ?string $roomID;

    /**
     * ISO 8601 timestamp when the room session was updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param list<RoomParticipant> $participants
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

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $endedAt && $obj->endedAt = $endedAt;
        null !== $participants && $obj->participants = $participants;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $roomID && $obj->roomID = $roomID;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * A unique identifier for the room session.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Shows if the room session is active or not.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->endedAt = $endedAt;

        return $obj;
    }

    /**
     * @param list<RoomParticipant> $participants
     */
    public function withParticipants(array $participants): self
    {
        $obj = clone $this;
        $obj->participants = $participants;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Identify the room hosting that room session.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj->roomID = $roomID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
