<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously create a room composition.
 *
 * @see Telnyx\Services\RoomCompositionsService::create()
 *
 * @phpstan-import-type VideoRegionShape from \Telnyx\RoomCompositions\VideoRegion
 *
 * @phpstan-type RoomCompositionCreateParamsShape = array{
 *   format?: string|null,
 *   resolution?: string|null,
 *   sessionID?: string|null,
 *   videoLayout?: array<string,VideoRegionShape>|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
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
    #[Optional]
    public ?string $format;

    /**
     * The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720.
     */
    #[Optional]
    public ?string $resolution;

    /**
     * id of the room session associated with the room composition.
     */
    #[Optional('session_id')]
    public ?string $sessionID;

    /**
     * Describes the video layout of the room composition in terms of regions.
     *
     * @var array<string,VideoRegion>|null $videoLayout
     */
    #[Optional('video_layout', map: VideoRegion::class)]
    public ?array $videoLayout;

    /**
     * The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_failover_url')]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
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
     * @param array<string,VideoRegionShape> $videoLayout
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
        $self = new self;

        null !== $format && $self['format'] = $format;
        null !== $resolution && $self['resolution'] = $resolution;
        null !== $sessionID && $self['sessionID'] = $sessionID;
        null !== $videoLayout && $self['videoLayout'] = $videoLayout;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * The desired format of the room composition.
     */
    public function withFormat(string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720.
     */
    public function withResolution(string $resolution): self
    {
        $self = clone $this;
        $self['resolution'] = $resolution;

        return $self;
    }

    /**
     * id of the room session associated with the room composition.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Describes the video layout of the room composition in terms of regions.
     *
     * @param array<string,VideoRegionShape> $videoLayout
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
        string $webhookEventFailoverURL
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
    public function withWebhookTimeoutSecs(int $webhookTimeoutSecs): self
    {
        $self = clone $this;
        $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }
}
