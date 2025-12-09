<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound;

/**
 * Updates settings of an existing External Connection based on the parameters of the request.
 *
 * @see Telnyx\Services\ExternalConnectionsService::update()
 *
 * @phpstan-type ExternalConnectionUpdateParamsShape = array{
 *   outbound: Outbound|array{
 *     outboundVoiceProfileID: string, channelLimit?: int|null
 *   },
 *   active?: bool,
 *   inbound?: Inbound|array{channelLimit?: int|null},
 *   tags?: list<string>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class ExternalConnectionUpdateParams implements BaseModel
{
    /** @use SdkModel<ExternalConnectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Outbound $outbound;

    /**
     * Specifies whether the connection can be used.
     */
    #[Optional]
    public ?bool $active;

    #[Optional]
    public ?Inbound $inbound;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_failover_url', nullable: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_url')]
    public ?string $webhookEventURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional('webhook_timeout_secs', nullable: true)]
    public ?int $webhookTimeoutSecs;

    /**
     * `new ExternalConnectionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalConnectionUpdateParams::with(outbound: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalConnectionUpdateParams)->withOutbound(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Outbound|array{
     *   outboundVoiceProfileID: string, channelLimit?: int|null
     * } $outbound
     * @param Inbound|array{channelLimit?: int|null} $inbound
     * @param list<string> $tags
     */
    public static function with(
        Outbound|array $outbound,
        ?bool $active = null,
        Inbound|array|null $inbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        $obj['outbound'] = $outbound;

        null !== $active && $obj['active'] = $active;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $tags && $obj['tags'] = $tags;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * @param Outbound|array{
     *   outboundVoiceProfileID: string, channelLimit?: int|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * Specifies whether the connection can be used.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    /**
     * @param Inbound|array{channelLimit?: int|null} $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * Tags associated with the connection.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
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
