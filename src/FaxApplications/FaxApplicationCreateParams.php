<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound;

/**
 * Creates a new Fax Application based on the parameters sent in the request. The application name and webhook URL are required. Once created, you can assign phone numbers to your application using the `/phone_numbers` endpoint.
 *
 * @see Telnyx\Services\FaxApplicationsService::create()
 *
 * @phpstan-import-type InboundShape from \Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound
 *
 * @phpstan-type FaxApplicationCreateParamsShape = array{
 *   applicationName: string,
 *   webhookEventURL: string,
 *   active?: bool|null,
 *   anchorsiteOverride?: null|AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   inbound?: InboundShape|null,
 *   outbound?: OutboundShape|null,
 *   tags?: list<string>|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class FaxApplicationCreateParams implements BaseModel
{
    /** @use SdkModel<FaxApplicationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Required('application_name')]
    public string $applicationName;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Required('webhook_event_url')]
    public string $webhookEventURL;

    /**
     * Specifies whether the connection can be used.
     */
    #[Optional]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Optional('anchorsite_override', enum: AnchorsiteOverride::class)]
    public ?string $anchorsiteOverride;

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * Tags associated with the Fax Application.
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
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional('webhook_timeout_secs', nullable: true)]
    public ?int $webhookTimeoutSecs;

    /**
     * `new FaxApplicationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FaxApplicationCreateParams::with(applicationName: ..., webhookEventURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FaxApplicationCreateParams)
     *   ->withApplicationName(...)
     *   ->withWebhookEventURL(...)
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride
     * @param InboundShape $inbound
     * @param OutboundShape $outbound
     * @param list<string> $tags
     */
    public static function with(
        string $applicationName,
        string $webhookEventURL,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $self = new self;

        $self['applicationName'] = $applicationName;
        $self['webhookEventURL'] = $webhookEventURL;

        null !== $active && $self['active'] = $active;
        null !== $anchorsiteOverride && $self['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $tags && $self['tags'] = $tags;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $self = clone $this;
        $self['applicationName'] = $applicationName;

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
     * Specifies whether the connection can be used.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride
     */
    public function withAnchorsiteOverride(
        AnchorsiteOverride|string $anchorsiteOverride
    ): self {
        $self = clone $this;
        $self['anchorsiteOverride'] = $anchorsiteOverride;

        return $self;
    }

    /**
     * @param InboundShape $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * @param OutboundShape $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * Tags associated with the Fax Application.
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
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $self = clone $this;
        $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }
}
