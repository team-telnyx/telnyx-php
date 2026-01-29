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
 * @phpstan-import-type OutboundShape from \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Inbound
 *
 * @phpstan-type ExternalConnectionUpdateParamsShape = array{
 *   outbound: Outbound|OutboundShape,
 *   active?: bool|null,
 *   inbound?: null|Inbound|InboundShape,
 *   tags?: list<string>|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
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
     * @param Outbound|OutboundShape $outbound
     * @param Inbound|InboundShape|null $inbound
     * @param list<string>|null $tags
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
        $self = new self;

        $self['outbound'] = $outbound;

        null !== $active && $self['active'] = $active;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $tags && $self['tags'] = $tags;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * @param Outbound|OutboundShape $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * Specifies whether the connection can be used.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * @param Inbound|InboundShape $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * Tags associated with the connection.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $self = clone $this;
        $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $self;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
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
