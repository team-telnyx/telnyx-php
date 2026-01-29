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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $context && $self['context'] = $context;
        null !== $joinedAt && $self['joinedAt'] = $joinedAt;
        null !== $leftAt && $self['leftAt'] = $leftAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A unique identifier for the room participant.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Context provided to the given participant through the client SDK.
     */
    public function withContext(string $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the participant joined the session.
     */
    public function withJoinedAt(\DateTimeInterface $joinedAt): self
    {
        $self = clone $this;
        $self['joinedAt'] = $joinedAt;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the participant left the session.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $self = clone $this;
        $self['leftAt'] = $leftAt;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identify the room session that participant is part of.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the participant was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
