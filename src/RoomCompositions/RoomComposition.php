<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomComposition\Format;
use Telnyx\RoomCompositions\RoomComposition\Status;

/**
 * @phpstan-type RoomCompositionShape = array{
 *   id?: string|null,
 *   completedAt?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   downloadURL?: string|null,
 *   durationSecs?: int|null,
 *   endedAt?: \DateTimeInterface|null,
 *   format?: value-of<Format>|null,
 *   recordType?: string|null,
 *   roomID?: string|null,
 *   sessionID?: string|null,
 *   sizeMB?: float|null,
 *   startedAt?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   videoLayout?: array<string,VideoRegion>|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class RoomComposition implements BaseModel
{
    /** @use SdkModel<RoomCompositionShape> */
    use SdkModel;

    /**
     * A unique identifier for the room composition.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 timestamp when the room composition has completed.
     */
    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Url to download the composition.
     */
    #[Optional('download_url')]
    public ?string $downloadURL;

    /**
     * Shows the room composition duration in seconds.
     */
    #[Optional('duration_secs')]
    public ?int $durationSecs;

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    #[Optional('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * Shows format of the room composition.
     *
     * @var value-of<Format>|null $format
     */
    #[Optional(enum: Format::class)]
    public ?string $format;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Identify the room associated with the room composition.
     */
    #[Optional('room_id')]
    public ?string $roomID;

    /**
     * Identify the room session associated with the room composition.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    /**
     * Shows the room composition size in MB.
     */
    #[Optional('size_mb')]
    public ?float $sizeMB;

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * Shows the room composition status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 timestamp when the room composition was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Identify the user associated with the room composition.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Describes the video layout of the room composition in terms of regions. Limited to 2 regions.
     *
     * @var array<string,VideoRegion>|null $videoLayout
     */
    #[Optional('video_layout', map: VideoRegion::class)]
    public ?array $videoLayout;

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_failover_url', nullable: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_url')]
    public ?string $webhookEventURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional('webhook_timeout_secs', nullable: true)]
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
     * @param Format|value-of<Format> $format
     * @param Status|value-of<Status> $status
     * @param array<string,VideoRegion|array{
     *   height?: int|null,
     *   maxColumns?: int|null,
     *   maxRows?: int|null,
     *   videoSources?: list<string>|null,
     *   width?: int|null,
     *   xPos?: int|null,
     *   yPos?: int|null,
     *   zPos?: int|null,
     * }> $videoLayout
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $completedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $downloadURL = null,
        ?int $durationSecs = null,
        ?\DateTimeInterface $endedAt = null,
        Format|string|null $format = null,
        ?string $recordType = null,
        ?string $roomID = null,
        ?string $sessionID = null,
        ?float $sizeMB = null,
        ?\DateTimeInterface $startedAt = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
        ?array $videoLayout = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $completedAt && $obj['completedAt'] = $completedAt;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $downloadURL && $obj['downloadURL'] = $downloadURL;
        null !== $durationSecs && $obj['durationSecs'] = $durationSecs;
        null !== $endedAt && $obj['endedAt'] = $endedAt;
        null !== $format && $obj['format'] = $format;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $roomID && $obj['roomID'] = $roomID;
        null !== $sessionID && $obj['sessionID'] = $sessionID;
        null !== $sizeMB && $obj['sizeMB'] = $sizeMB;
        null !== $startedAt && $obj['startedAt'] = $startedAt;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $userID && $obj['userID'] = $userID;
        null !== $videoLayout && $obj['videoLayout'] = $videoLayout;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

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
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Url to download the composition.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $obj = clone $this;
        $obj['downloadURL'] = $downloadURL;

        return $obj;
    }

    /**
     * Shows the room composition duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj['durationSecs'] = $durationSecs;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj['endedAt'] = $endedAt;

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
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identify the room associated with the room composition.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj['roomID'] = $roomID;

        return $obj;
    }

    /**
     * Identify the room session associated with the room composition.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }

    /**
     * Shows the room composition size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $obj = clone $this;
        $obj['sizeMB'] = $sizeMB;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identify the user associated with the room composition.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Describes the video layout of the room composition in terms of regions. Limited to 2 regions.
     *
     * @param array<string,VideoRegion|array{
     *   height?: int|null,
     *   maxColumns?: int|null,
     *   maxRows?: int|null,
     *   videoSources?: list<string>|null,
     *   width?: int|null,
     *   xPos?: int|null,
     *   yPos?: int|null,
     *   zPos?: int|null,
     * }> $videoLayout
     */
    public function withVideoLayout(array $videoLayout): self
    {
        $obj = clone $this;
        $obj['videoLayout'] = $videoLayout;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhookEventURL'] = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
