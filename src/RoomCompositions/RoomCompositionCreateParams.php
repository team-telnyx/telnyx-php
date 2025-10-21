<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously create a room composition.
 *
 * @see Telnyx\RoomCompositions->create
 *
 * @phpstan-type room_composition_create_params = array{
 *   format?: string|null,
 *   resolution?: string|null,
 *   sessionID?: string|null,
 *   videoLayout?: array<string, VideoRegion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class RoomCompositionCreateParams implements BaseModel
{
    /** @use SdkModel<room_composition_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The desired format of the room composition.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $format;

    /**
     * The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $resolution;

    /**
     * id of the room session associated with the room composition.
     */
    #[Api('session_id', nullable: true, optional: true)]
    public ?string $sessionID;

    /**
     * Describes the video layout of the room composition in terms of regions.
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
     * @param array<string, VideoRegion> $videoLayout
     */
    public static function with(
        ?string $format = null,
        ?string $resolution = null,
        ?string $sessionID = null,
        ?array $videoLayout = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        null !== $format && $obj->format = $format;
        null !== $resolution && $obj->resolution = $resolution;
        null !== $sessionID && $obj->sessionID = $sessionID;
        null !== $videoLayout && $obj->videoLayout = $videoLayout;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj->webhookEventURL = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * The desired format of the room composition.
     */
    public function withFormat(?string $format): self
    {
        $obj = clone $this;
        $obj->format = $format;

        return $obj;
    }

    /**
     * The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720.
     */
    public function withResolution(?string $resolution): self
    {
        $obj = clone $this;
        $obj->resolution = $resolution;

        return $obj;
    }

    /**
     * id of the room session associated with the room composition.
     */
    public function withSessionID(?string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }

    /**
     * Describes the video layout of the room composition in terms of regions.
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
