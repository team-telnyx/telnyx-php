<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\WebhookAPIVersion;

/**
 * Update a Mobile Voice Connection.
 *
 * @see Telnyx\Services\MobileVoiceConnectionsService::update()
 *
 * @phpstan-type MobileVoiceConnectionUpdateParamsShape = array{
 *   active?: bool,
 *   connectionName?: string,
 *   inbound?: Inbound|array{channelLimit?: int|null},
 *   outbound?: Outbound|array{
 *     channelLimit?: int|null, outboundVoiceProfileID?: string|null
 *   },
 *   tags?: list<string>,
 *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int,
 * }
 */
final class MobileVoiceConnectionUpdateParams implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $active;

    #[Optional('connection_name')]
    public ?string $connectionName;

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /** @var value-of<WebhookAPIVersion>|null $webhookAPIVersion */
    #[Optional('webhook_api_version', enum: WebhookAPIVersion::class)]
    public ?string $webhookAPIVersion;

    #[Optional('webhook_event_failover_url', nullable: true)]
    public ?string $webhookEventFailoverURL;

    #[Optional('webhook_event_url', nullable: true)]
    public ?string $webhookEventURL;

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
     * @param Inbound|array{channelLimit?: int|null} $inbound
     * @param Outbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        ?bool $active = null,
        ?string $connectionName = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $tags && $self['tags'] = $tags;
        null !== $webhookAPIVersion && $self['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withConnectionName(string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * @param Inbound|array{channelLimit?: int|null} $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * @param Outbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public function withWebhookAPIVersion(
        WebhookAPIVersion|string $webhookAPIVersion
    ): self {
        $self = clone $this;
        $self['webhookAPIVersion'] = $webhookAPIVersion;

        return $self;
    }

    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $self = clone $this;
        $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $self;
    }

    public function withWebhookEventURL(?string $webhookEventURL): self
    {
        $self = clone $this;
        $self['webhookEventURL'] = $webhookEventURL;

        return $self;
    }

    public function withWebhookTimeoutSecs(int $webhookTimeoutSecs): self
    {
        $self = clone $this;
        $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }
}
