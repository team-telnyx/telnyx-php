<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RoomShape = array{
 *   id?: string|null,
 *   active_session_id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   enable_recording?: bool|null,
 *   max_participants?: int|null,
 *   record_type?: string|null,
 *   sessions?: list<RoomSession>|null,
 *   unique_name?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class Room implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RoomShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A unique identifier for the room.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The identifier of the active room session if any.
     */
    #[Api(optional: true)]
    public ?string $active_session_id;

    /**
     * ISO 8601 timestamp when the room was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Enable or disable recording for that room.
     */
    #[Api(optional: true)]
    public ?bool $enable_recording;

    /**
     * Maximum participants allowed in the room.
     */
    #[Api(optional: true)]
    public ?int $max_participants;

    #[Api(optional: true)]
    public ?string $record_type;

    /** @var list<RoomSession>|null $sessions */
    #[Api(list: RoomSession::class, optional: true)]
    public ?array $sessions;

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    #[Api(optional: true)]
    public ?string $unique_name;

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    #[Api(optional: true)]
    public ?string $webhook_event_url;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $webhook_timeout_secs;

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
        ?string $active_session_id = null,
        ?\DateTimeInterface $created_at = null,
        ?bool $enable_recording = null,
        ?int $max_participants = null,
        ?string $record_type = null,
        ?array $sessions = null,
        ?string $unique_name = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active_session_id && $obj->active_session_id = $active_session_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $enable_recording && $obj->enable_recording = $enable_recording;
        null !== $max_participants && $obj->max_participants = $max_participants;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $sessions && $obj->sessions = $sessions;
        null !== $unique_name && $obj->unique_name = $unique_name;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $webhook_event_failover_url && $obj->webhook_event_failover_url = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj->webhook_event_url = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj->webhook_timeout_secs = $webhook_timeout_secs;

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
        $obj->active_session_id = $activeSessionID;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Enable or disable recording for that room.
     */
    public function withEnableRecording(bool $enableRecording): self
    {
        $obj = clone $this;
        $obj->enable_recording = $enableRecording;

        return $obj;
    }

    /**
     * Maximum participants allowed in the room.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj->max_participants = $maxParticipants;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

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
        $obj->unique_name = $uniqueName;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhook_event_failover_url = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj->webhook_event_url = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhook_timeout_secs = $webhookTimeoutSecs;

        return $obj;
    }
}
