<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoomParticipantShape = array{
 *   id?: string|null,
 *   context?: string|null,
 *   joinedAt?: \DateTimeInterface|null,
 *   leftAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   sessionID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class RoomParticipant implements BaseModel
{
    /** @use SdkModel<RoomParticipantShape> */
    use SdkModel;

    /**
     * A unique identifier for the room participant.
     */
    #[Optional]
    public ?string $id;

    /**
     * Context provided to the given participant through the client SDK.
     */
    #[Optional]
    public ?string $context;

    /**
     * ISO 8601 timestamp when the participant joined the session.
     */
    #[Optional('joined_at')]
    public ?\DateTimeInterface $joinedAt;

    /**
     * ISO 8601 timestamp when the participant left the session.
     */
    #[Optional('left_at')]
    public ?\DateTimeInterface $leftAt;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identify the room session that participant is part of.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    /**
     * ISO 8601 timestamp when the participant was updated.
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
     */
    public static function with(
        ?string $id = null,
        ?string $context = null,
        ?\DateTimeInterface $joinedAt = null,
        ?\DateTimeInterface $leftAt = null,
        ?string $recordType = null,
        ?string $sessionID = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $context && $obj['context'] = $context;
        null !== $joinedAt && $obj['joinedAt'] = $joinedAt;
        null !== $leftAt && $obj['leftAt'] = $leftAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $sessionID && $obj['sessionID'] = $sessionID;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * A unique identifier for the room participant.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Context provided to the given participant through the client SDK.
     */
    public function withContext(string $context): self
    {
        $obj = clone $this;
        $obj['context'] = $context;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the participant joined the session.
     */
    public function withJoinedAt(\DateTimeInterface $joinedAt): self
    {
        $obj = clone $this;
        $obj['joinedAt'] = $joinedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the participant left the session.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $obj = clone $this;
        $obj['leftAt'] = $leftAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identify the room session that participant is part of.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the participant was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
