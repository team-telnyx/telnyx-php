<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Inbound;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound;

/**
 * Creates a new External Connection based on the parameters sent in the request. The external_sip_connection and outbound voice profile id are required. Once created, you can assign phone numbers to your application using the `/phone_numbers` endpoint.
 *
 * @see Telnyx\ExternalConnections->create
 *
 * @phpstan-type ExternalConnectionCreateParamsShape = array{
 *   externalSipConnection: ExternalSipConnection|value-of<ExternalSipConnection>,
 *   outbound: Outbound,
 *   active?: bool,
 *   inbound?: Inbound,
 *   tags?: list<string>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class ExternalConnectionCreateParams implements BaseModel
{
    /** @use SdkModel<ExternalConnectionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The service that will be consuming this connection.
     *
     * @var value-of<ExternalSipConnection> $externalSipConnection
     */
    #[Api('external_sip_connection', enum: ExternalSipConnection::class)]
    public string $externalSipConnection;

    #[Api]
    public Outbound $outbound;

    /**
     * Specifies whether the connection can be used.
     */
    #[Api(optional: true)]
    public ?bool $active;

    #[Api(optional: true)]
    public ?Inbound $inbound;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_failover_url', nullable: true, optional: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_url', optional: true)]
    public ?string $webhookEventURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Api('webhook_timeout_secs', nullable: true, optional: true)]
    public ?int $webhookTimeoutSecs;

    /**
     * `new ExternalConnectionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalConnectionCreateParams::with(externalSipConnection: ..., outbound: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalConnectionCreateParams)
     *   ->withExternalSipConnection(...)
     *   ->withOutbound(...)
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
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection
     * @param list<string> $tags
     */
    public static function with(
        Outbound $outbound,
        ExternalSipConnection|string $externalSipConnection = 'zoom',
        ?bool $active = null,
        ?Inbound $inbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        $obj['externalSipConnection'] = $externalSipConnection;
        $obj->outbound = $outbound;

        null !== $active && $obj->active = $active;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $tags && $obj->tags = $tags;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj->webhookEventURL = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * The service that will be consuming this connection.
     *
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection
     */
    public function withExternalSipConnection(
        ExternalSipConnection|string $externalSipConnection
    ): self {
        $obj = clone $this;
        $obj['externalSipConnection'] = $externalSipConnection;

        return $obj;
    }

    public function withOutbound(Outbound $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    /**
     * Specifies whether the connection can be used.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    public function withInbound(Inbound $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

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
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhookEventFailoverURL = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
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
