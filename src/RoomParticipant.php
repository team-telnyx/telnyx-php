<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoomParticipantShape = array{
 *   id?: string|null,
 *   context?: string|null,
 *   joined_at?: \DateTimeInterface|null,
 *   left_at?: \DateTimeInterface|null,
 *   record_type?: string|null,
 *   session_id?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class RoomParticipant implements BaseModel
{
    /** @use SdkModel<RoomParticipantShape> */
    use SdkModel;

    /**
     * A unique identifier for the room participant.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Context provided to the given participant through the client SDK.
     */
    #[Api(optional: true)]
    public ?string $context;

    /**
     * ISO 8601 timestamp when the participant joined the session.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $joined_at;

    /**
     * ISO 8601 timestamp when the participant left the session.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $left_at;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Identify the room session that participant is part of.
     */
    #[Api(optional: true)]
    public ?string $session_id;

    /**
     * ISO 8601 timestamp when the participant was updated.
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
     */
    public static function with(
        ?string $id = null,
        ?string $context = null,
        ?\DateTimeInterface $joined_at = null,
        ?\DateTimeInterface $left_at = null,
        ?string $record_type = null,
        ?string $session_id = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $context && $obj['context'] = $context;
        null !== $joined_at && $obj['joined_at'] = $joined_at;
        null !== $left_at && $obj['left_at'] = $left_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $session_id && $obj['session_id'] = $session_id;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['joined_at'] = $joinedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the participant left the session.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $obj = clone $this;
        $obj['left_at'] = $leftAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Identify the room session that participant is part of.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['session_id'] = $sessionID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the participant was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
