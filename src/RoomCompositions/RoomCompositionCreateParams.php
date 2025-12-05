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
 * @see Telnyx\Services\RoomCompositionsService::create()
 *
 * @phpstan-type RoomCompositionCreateParamsShape = array{
 *   format?: string|null,
 *   resolution?: string|null,
 *   session_id?: string|null,
 *   video_layout?: array<string,VideoRegion|array{
 *     height?: int|null,
 *     max_columns?: int|null,
 *     max_rows?: int|null,
 *     video_sources?: list<string>|null,
 *     width?: int|null,
 *     x_pos?: int|null,
 *     y_pos?: int|null,
 *     z_pos?: int|null,
 *   }>,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class RoomCompositionCreateParams implements BaseModel
{
    /** @use SdkModel<RoomCompositionCreateParamsShape> */
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
    #[Api(nullable: true, optional: true)]
    public ?string $session_id;

    /**
     * Describes the video layout of the room composition in terms of regions.
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
        ?string $format = null,
        ?string $resolution = null,
        ?string $session_id = null,
        ?array $video_layout = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $format && $obj['format'] = $format;
        null !== $resolution && $obj['resolution'] = $resolution;
        null !== $session_id && $obj['session_id'] = $session_id;
        null !== $video_layout && $obj['video_layout'] = $video_layout;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * The desired format of the room composition.
     */
    public function withFormat(?string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }

    /**
     * The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720.
     */
    public function withResolution(?string $resolution): self
    {
        $obj = clone $this;
        $obj['resolution'] = $resolution;

        return $obj;
    }

    /**
     * id of the room session associated with the room composition.
     */
    public function withSessionID(?string $sessionID): self
    {
        $obj = clone $this;
        $obj['session_id'] = $sessionID;

        return $obj;
    }

    /**
     * Describes the video layout of the room composition in terms of regions.
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
