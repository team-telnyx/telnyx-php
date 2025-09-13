<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomComposition\Format;
use Telnyx\RoomCompositions\RoomComposition\Status;

/**
 * @phpstan-type room_composition = array{
 *   id?: string,
 *   completedAt?: \DateTimeInterface,
 *   createdAt?: \DateTimeInterface,
 *   downloadURL?: string,
 *   durationSecs?: int,
 *   endedAt?: \DateTimeInterface,
 *   format?: value-of<Format>,
 *   recordType?: string,
 *   roomID?: string,
 *   sessionID?: string,
 *   sizeMB?: float,
 *   startedAt?: \DateTimeInterface,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 *   userID?: string,
 *   videoLayout?: array<string, VideoRegion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class RoomComposition implements BaseModel
{
    /** @use SdkModel<room_composition> */
    use SdkModel;

    /**
     * A unique identifier for the room composition.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 timestamp when the room composition has completed.
     */
    #[Api('completed_at', optional: true)]
    public ?\DateTimeInterface $completedAt;

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Url to download the composition.
     */
    #[Api('download_url', optional: true)]
    public ?string $downloadURL;

    /**
     * Shows the room composition duration in seconds.
     */
    #[Api('duration_secs', optional: true)]
    public ?int $durationSecs;

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    #[Api('ended_at', optional: true)]
    public ?\DateTimeInterface $endedAt;

    /**
     * Shows format of the room composition.
     *
     * @var value-of<Format>|null $format
     */
    #[Api(enum: Format::class, optional: true)]
    public ?string $format;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Identify the room associated with the room composition.
     */
    #[Api('room_id', optional: true)]
    public ?string $roomID;

    /**
     * Identify the room session associated with the room composition.
     */
    #[Api('session_id', optional: true)]
    public ?string $sessionID;

    /**
     * Shows the room composition size in MB.
     */
    #[Api('size_mb', optional: true)]
    public ?float $sizeMB;

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    #[Api('started_at', optional: true)]
    public ?\DateTimeInterface $startedAt;

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
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Identify the user associated with the room composition.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    /**
     * Describes the video layout of the room composition in terms of regions. Limited to 2 regions.
     *
     * @var array<string, VideoRegion>|null $videoLayout
     */
    #[Api('video_layout', map: VideoRegion::class, optional: true)]
    public ?array $videoLayout;

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_failover_url', nullable: true, optional: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
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
     * @param Format|value-of<Format> $format
     * @param Status|value-of<Status> $status
     * @param array<string, VideoRegion> $videoLayout
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

        null !== $id && $obj->id = $id;
        null !== $completedAt && $obj->completedAt = $completedAt;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $downloadURL && $obj->downloadURL = $downloadURL;
        null !== $durationSecs && $obj->durationSecs = $durationSecs;
        null !== $endedAt && $obj->endedAt = $endedAt;
        null !== $format && $obj->format = $format instanceof Format ? $format->value : $format;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $roomID && $obj->roomID = $roomID;
        null !== $sessionID && $obj->sessionID = $sessionID;
        null !== $sizeMB && $obj->sizeMB = $sizeMB;
        null !== $startedAt && $obj->startedAt = $startedAt;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userID && $obj->userID = $userID;
        null !== $videoLayout && $obj->videoLayout = $videoLayout;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj->webhookEventURL = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A unique identifier for the room composition.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Url to download the composition.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $obj = clone $this;
        $obj->downloadURL = $downloadURL;

        return $obj;
    }

    /**
     * Shows the room composition duration in seconds.
     */
    public function withDurationSecs(int $durationSecs): self
    {
        $obj = clone $this;
        $obj->durationSecs = $durationSecs;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has ended.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->endedAt = $endedAt;

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
        $obj->format = $format instanceof Format ? $format->value : $format;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Identify the room associated with the room composition.
     */
    public function withRoomID(string $roomID): self
    {
        $obj = clone $this;
        $obj->roomID = $roomID;

        return $obj;
    }

    /**
     * Identify the room session associated with the room composition.
     */
    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }

    /**
     * Shows the room composition size in MB.
     */
    public function withSizeMB(float $sizeMB): self
    {
        $obj = clone $this;
        $obj->sizeMB = $sizeMB;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition has stated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the room composition was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identify the user associated with the room composition.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    /**
     * Describes the video layout of the room composition in terms of regions. Limited to 2 regions.
     *
     * @param array<string, VideoRegion> $videoLayout
     */
    public function withVideoLayout(array $videoLayout): self
    {
        $obj = clone $this;
        $obj->videoLayout = $videoLayout;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhookEventFailoverURL = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
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
