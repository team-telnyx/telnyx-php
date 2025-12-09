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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $downloadURL && $self['downloadURL'] = $downloadURL;
        null !== $durationSecs && $self['durationSecs'] = $durationSecs;
        null !== $endedAt && $self['endedAt'] = $endedAt;
        null !== $format && $self['format'] = $format;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $roomID && $self['roomID'] = $roomID;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $sizeMB && $self['sizeMB'] = $sizeMB;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;
        null !== $videoLayout && $self['videoLayout'] = $videoLayout;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * A unique identifier for the room composition.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room composition has completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Url to download the composition.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $self = clone $this;
        $self['downloadURL'] = $downloadURL;

        return $self;
    }

    /**
     * Shows the room composition duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $self = clone $this;
        $self['durationSecs'] = $durationSecs;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * Shows format of the room composition.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identify the room associated with the room composition.
     */
    public function withRoomID(string $roomID): self
    {
        $self = clone $this;
        $self['roomID'] = $roomID;

        return $self;
    }

    /**
     * Identify the room session associated with the room composition.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Shows the room composition size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $self = clone $this;
        $self['sizeMB'] = $sizeMB;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Shows the room composition status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the room composition was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identify the user associated with the room composition.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
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
        $self = clone $this;
        $self['videoLayout'] = $videoLayout;

        return $self;
    }

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $self = clone $this;
        $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $self;
    }

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
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
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $self = clone $this;
        $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }
}
