<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Api;
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
 *   connection_name?: string,
 *   inbound?: Inbound|array{channel_limit?: int|null},
 *   outbound?: Outbound|array{
 *     channel_limit?: int|null, outbound_voice_profile_id?: string|null
 *   },
 *   tags?: list<string>,
 *   webhook_api_version?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int,
 * }
 */
final class MobileVoiceConnectionUpdateParams implements BaseModel
{
    /** @use SdkModel<MobileVoiceConnectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $active;

    #[Api(optional: true)]
    public ?string $connection_name;

    #[Api(optional: true)]
    public ?Inbound $inbound;

    #[Api(optional: true)]
    public ?Outbound $outbound;

    /** @var list<string>|null $tags */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /** @var value-of<WebhookAPIVersion>|null $webhook_api_version */
    #[Api(enum: WebhookAPIVersion::class, optional: true)]
    public ?string $webhook_api_version;

    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_url;

    #[Api(optional: true)]
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
     * @param Inbound|array{channel_limit?: int|null} $inbound
     * @param Outbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhook_api_version
     */
    public static function with(
        ?bool $active = null,
        ?string $connection_name = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $active && $obj['active'] = $active;
        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $tags && $obj['tags'] = $tags;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * @param Inbound|array{channel_limit?: int|null} $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * @param Outbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public function withWebhookAPIVersion(
        WebhookAPIVersion|string $webhookAPIVersion
    ): self {
        $obj = clone $this;
        $obj['webhook_api_version'] = $webhookAPIVersion;

        return $obj;
    }

    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhook_event_failover_url'] = $webhookEventFailoverURL;

        return $obj;
    }

    public function withWebhookEventURL(?string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhook_event_url'] = $webhookEventURL;

        return $obj;
    }

    public function withWebhookTimeoutSecs(int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhook_timeout_secs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
