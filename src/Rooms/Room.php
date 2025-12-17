<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RoomSessionShape from \Telnyx\Rooms\RoomSession
 *
 * @phpstan-type RoomShape = array{
 *   id?: string|null,
 *   activeSessionID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enableRecording?: bool|null,
 *   maxParticipants?: int|null,
 *   recordType?: string|null,
 *   sessions?: list<RoomSessionShape>|null,
 *   uniqueName?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class Room implements BaseModel
{
    /** @use SdkModel<RoomShape> */
    use SdkModel;

    /**
     * A unique identifier for the room.
     */
    #[Optional]
    public ?string $id;

    /**
     * The identifier of the active room session if any.
     */
    #[Optional('active_session_id')]
    public ?string $activeSessionID;

    /**
     * ISO 8601 timestamp when the room was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Enable or disable recording for that room.
     */
    #[Optional('enable_recording')]
    public ?bool $enableRecording;

    /**
     * Maximum participants allowed in the room.
     */
    #[Optional('max_participants')]
    public ?int $maxParticipants;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<RoomSession>|null $sessions */
    #[Optional(list: RoomSession::class)]
    public ?array $sessions;

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    #[Optional('unique_name')]
    public ?string $uniqueName;

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_failover_url')]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_url')]
    public ?string $webhookEventURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional('webhook_timeout_secs')]
    public ?int $webhookTimeoutSecs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RoomSessionShape> $sessions
     */
    public static function with(
        ?string $id = null,
        ?string $activeSessionID = null,
        ?\DateTimeInterface $createdAt = null,
        ?bool $enableRecording = null,
        ?int $maxParticipants = null,
        ?string $recordType = null,
        ?array $sessions = null,
        ?string $uniqueName = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $activeSessionID && $self['activeSessionID'] = $activeSessionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enableRecording && $self['enableRecording'] = $enableRecording;
        null !== $maxParticipants && $self['maxParticipants'] = $maxParticipants;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sessions && $self['sessions'] = $sessions;
        null !== $uniqueName && $self['uniqueName'] = $uniqueName;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * A unique identifier for the room.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The identifier of the active room session if any.
     */
    public function withActiveSessionID(string $activeSessionID): self
    {
        $self = clone $this;
        $self['activeSessionID'] = $activeSessionID;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Enable or disable recording for that room.
     */
    public function withEnableRecording(bool $enableRecording): self
    {
        $self = clone $this;
        $self['enableRecording'] = $enableRecording;

        return $self;
    }

    /**
     * Maximum participants allowed in the room.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $self = clone $this;
        $self['maxParticipants'] = $maxParticipants;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<RoomSessionShape> $sessions
     */
    public function withSessions(array $sessions): self
    {
        $self = clone $this;
        $self['sessions'] = $sessions;

        return $self;
    }

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $self = clone $this;
        $self['uniqueName'] = $uniqueName;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        string $webhookEventFailoverURL
    ): self {
        $self = clone $this;
        $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $self;
    }

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $self = clone $this;
        $self['webhookEventURL'] = $webhookEventURL;

        return $self;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(int $webhookTimeoutSecs): self
    {
        $self = clone $this;
        $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }
}
