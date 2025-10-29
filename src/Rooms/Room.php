<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RoomShape = array{
 *   id?: string,
 *   activeSessionID?: string,
 *   createdAt?: \DateTimeInterface,
 *   enableRecording?: bool,
 *   maxParticipants?: int,
 *   recordType?: string,
 *   sessions?: list<RoomSession>,
 *   uniqueName?: string,
 *   updatedAt?: \DateTimeInterface,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
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
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The identifier of the active room session if any.
     */
    #[Api('active_session_id', optional: true)]
    public ?string $activeSessionID;

    /**
     * ISO 8601 timestamp when the room was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Enable or disable recording for that room.
     */
    #[Api('enable_recording', optional: true)]
    public ?bool $enableRecording;

    /**
     * Maximum participants allowed in the room.
     */
    #[Api('max_participants', optional: true)]
    public ?int $maxParticipants;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /** @var list<RoomSession>|null $sessions */
    #[Api(list: RoomSession::class, optional: true)]
    public ?array $sessions;

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    #[Api('unique_name', optional: true)]
    public ?string $uniqueName;

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_failover_url', nullable: true, optional: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_url', optional: true)]
    public ?string $webhookEventURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Api('webhook_timeout_secs', nullable: true, optional: true)]
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
     * @param list<RoomSession> $sessions
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activeSessionID && $obj->activeSessionID = $activeSessionID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $enableRecording && $obj->enableRecording = $enableRecording;
        null !== $maxParticipants && $obj->maxParticipants = $maxParticipants;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $sessions && $obj->sessions = $sessions;
        null !== $uniqueName && $obj->uniqueName = $uniqueName;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj->webhookEventURL = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A unique identifier for the room.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The identifier of the active room session if any.
     */
    public function withActiveSessionID(string $activeSessionID): self
    {
        $obj = clone $this;
        $obj->activeSessionID = $activeSessionID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Enable or disable recording for that room.
     */
    public function withEnableRecording(bool $enableRecording): self
    {
        $obj = clone $this;
        $obj->enableRecording = $enableRecording;

        return $obj;
    }

    /**
     * Maximum participants allowed in the room.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj->maxParticipants = $maxParticipants;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param list<RoomSession> $sessions
     */
    public function withSessions(array $sessions): self
    {
        $obj = clone $this;
        $obj->sessions = $sessions;

        return $obj;
    }

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $obj = clone $this;
        $obj->uniqueName = $uniqueName;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhookEventFailoverURL = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj->webhookEventURL = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }
}
