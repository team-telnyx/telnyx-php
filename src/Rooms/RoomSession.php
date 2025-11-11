<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomParticipant;

/**
 * @phpstan-type RoomSessionShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   created_at?: \DateTimeInterface|null,
 *   ended_at?: \DateTimeInterface|null,
 *   participants?: list<RoomParticipant>|null,
 *   record_type?: string|null,
 *   room_id?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class RoomSession implements BaseModel
{
    /** @use SdkModel<RoomSessionShape> */
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $ended_at;

    /** @var list<RoomParticipant>|null $participants */
    #[Api(list: RoomParticipant::class, optional: true)]
    public ?array $participants;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Identify the room hosting that room session.
     */
    #[Api(optional: true)]
    public ?string $room_id;

    /**
     * ISO 8601 timestamp when the room session was updated.
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
     * @param list<RoomParticipant> $participants
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $ended_at = null,
        ?array $participants = null,
        ?string $record_type = null,
        ?string $room_id = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $ended_at && $obj->ended_at = $ended_at;
        null !== $participants && $obj->participants = $participants;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $room_id && $obj->room_id = $room_id;
        null !== $updated_at && $obj->updated_at = $updated_at;

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
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->ended_at = $endedAt;

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
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * Identify the room hosting that room session.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj->room_id = $roomID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room session was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
