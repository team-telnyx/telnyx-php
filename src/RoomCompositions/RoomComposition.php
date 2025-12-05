<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomComposition\Format;
use Telnyx\RoomCompositions\RoomComposition\Status;

/**
 * @phpstan-type RoomCompositionShape = array{
 *   id?: string|null,
 *   completed_at?: \DateTimeInterface|null,
 *   created_at?: \DateTimeInterface|null,
 *   download_url?: string|null,
 *   duration_secs?: int|null,
 *   ended_at?: \DateTimeInterface|null,
 *   format?: value-of<Format>|null,
 *   record_type?: string|null,
 *   room_id?: string|null,
 *   session_id?: string|null,
 *   size_mb?: float|null,
 *   started_at?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
 *   video_layout?: array<string,VideoRegion>|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class RoomComposition implements BaseModel
{
    /** @use SdkModel<RoomCompositionShape> */
    use SdkModel;

    /**
     * A unique identifier for the room composition.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 timestamp when the room composition has completed.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $completed_at;

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Url to download the composition.
     */
    #[Api(optional: true)]
    public ?string $download_url;

    /**
     * Shows the room composition duration in seconds.
     */
    #[Api(optional: true)]
    public ?int $duration_secs;

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $ended_at;

    /**
     * Shows format of the room composition.
     *
     * @var value-of<Format>|null $format
     */
    #[Api(enum: Format::class, optional: true)]
    public ?string $format;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * Identify the room associated with the room composition.
     */
    #[Api(optional: true)]
    public ?string $room_id;

    /**
     * Identify the room session associated with the room composition.
     */
    #[Api(optional: true)]
    public ?string $session_id;

    /**
     * Shows the room composition size in MB.
     */
    #[Api(optional: true)]
    public ?float $size_mb;

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $started_at;

    /**
     * Shows the room composition status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 timestamp when the room composition was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * Identify the user associated with the room composition.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    /**
     * Describes the video layout of the room composition in terms of regions. Limited to 2 regions.
     *
     * @var array<string,VideoRegion>|null $video_layout
     */
    #[Api(map: VideoRegion::class, optional: true)]
    public ?array $video_layout;

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
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
     * @param Format|value-of<Format> $format
     * @param Status|value-of<Status> $status
     * @param array<string,VideoRegion|array{
     *   height?: int|null,
     *   max_columns?: int|null,
     *   max_rows?: int|null,
     *   video_sources?: list<string>|null,
     *   width?: int|null,
     *   x_pos?: int|null,
     *   y_pos?: int|null,
     *   z_pos?: int|null,
     * }> $video_layout
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $completed_at = null,
        ?\DateTimeInterface $created_at = null,
        ?string $download_url = null,
        ?int $duration_secs = null,
        ?\DateTimeInterface $ended_at = null,
        Format|string|null $format = null,
        ?string $record_type = null,
        ?string $room_id = null,
        ?string $session_id = null,
        ?float $size_mb = null,
        ?\DateTimeInterface $started_at = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $user_id = null,
        ?array $video_layout = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $completed_at && $obj['completed_at'] = $completed_at;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $download_url && $obj['download_url'] = $download_url;
        null !== $duration_secs && $obj['duration_secs'] = $duration_secs;
        null !== $ended_at && $obj['ended_at'] = $ended_at;
        null !== $format && $obj['format'] = $format;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $room_id && $obj['room_id'] = $room_id;
        null !== $session_id && $obj['session_id'] = $session_id;
        null !== $size_mb && $obj['size_mb'] = $size_mb;
        null !== $started_at && $obj['started_at'] = $started_at;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $video_layout && $obj['video_layout'] = $video_layout;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * A unique identifier for the room composition.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completed_at'] = $completedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Url to download the composition.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $obj = clone $this;
        $obj['download_url'] = $downloadURL;

        return $obj;
    }

    /**
     * Shows the room composition duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj['duration_secs'] = $durationSecs;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj['ended_at'] = $endedAt;

        return $obj;
    }

    /**
     * Shows format of the room composition.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Identify the room associated with the room composition.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj['room_id'] = $roomID;

        return $obj;
    }

    /**
     * Identify the room session associated with the room composition.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['session_id'] = $sessionID;

        return $obj;
    }

    /**
     * Shows the room composition size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $obj = clone $this;
        $obj['size_mb'] = $sizeMB;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['started_at'] = $startedAt;

        return $obj;
    }

    /**
     * Shows the room composition status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Identify the user associated with the room composition.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    /**
     * Describes the video layout of the room composition in terms of regions. Limited to 2 regions.
     *
     * @param array<string,VideoRegion|array{
     *   height?: int|null,
     *   max_columns?: int|null,
     *   max_rows?: int|null,
     *   video_sources?: list<string>|null,
     *   width?: int|null,
     *   x_pos?: int|null,
     *   y_pos?: int|null,
     *   z_pos?: int|null,
     * }> $videoLayout
     */
    public function withVideoLayout(array $videoLayout): self
    {
        $obj = clone $this;
        $obj['video_layout'] = $videoLayout;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhook_event_failover_url'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhook_event_url'] = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhook_timeout_secs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
