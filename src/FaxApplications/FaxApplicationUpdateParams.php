<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound;
use Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\FaxApplications\FaxApplicationUpdateParams\Outbound;

/**
 * Updates settings of an existing Fax Application based on the parameters of the request.
 *
 * @see Telnyx\Services\FaxApplicationsService::update()
 *
 * @phpstan-type FaxApplicationUpdateParamsShape = array{
 *   application_name: string,
 *   webhook_event_url: string,
 *   active?: bool,
 *   anchorsite_override?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   fax_email_recipient?: string|null,
 *   inbound?: Inbound|array{
 *     channel_limit?: int|null,
 *     sip_subdomain?: string|null,
 *     sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
 *   },
 *   outbound?: Outbound|array{
 *     channel_limit?: int|null, outbound_voice_profile_id?: string|null
 *   },
 *   tags?: list<string>,
 *   webhook_event_failover_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class FaxApplicationUpdateParams implements BaseModel
{
    /** @use SdkModel<FaxApplicationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Required]
    public string $application_name;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Required]
    public string $webhook_event_url;

    /**
     * Specifies whether the connection can be used.
     */
    #[Optional]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsite_override
     */
    #[Optional(enum: AnchorsiteOverride::class)]
    public ?string $anchorsite_override;

    /**
     * Specifies an email address where faxes sent to this application will be forwarded to (as pdf or tiff attachments).
     */
    #[Optional(nullable: true)]
    public ?string $fax_email_recipient;

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
    #[Optional(nullable: true)]
    public ?string $webhook_event_failover_url;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional(nullable: true)]
    public ?int $webhook_timeout_secs;

    /**
     * `new FaxApplicationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FaxApplicationUpdateParams::with(application_name: ..., webhook_event_url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FaxApplicationUpdateParams)
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsite_override
     * @param Inbound|array{
     *   channel_limit?: int|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     * @param Outbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     * @param list<string> $tags
     */
    public static function with(
        string $application_name,
        string $webhook_event_url,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?string $fax_email_recipient = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
        ?string $webhook_event_failover_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        $obj['application_name'] = $application_name;
        $obj['webhook_event_url'] = $webhook_event_url;

        null !== $active && $obj['active'] = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $fax_email_recipient && $obj['fax_email_recipient'] = $fax_email_recipient;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $tags && $obj['tags'] = $tags;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj['application_name'] = $applicationName;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhook_event_url'] = $webhookEventURL;

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
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride
     */
    public function withAnchorsiteOverride(
        AnchorsiteOverride|string $anchorsiteOverride
    ): self {
        $obj = clone $this;
        $obj['anchorsite_override'] = $anchorsiteOverride;

        return $obj;
    }

    /**
     * Specifies an email address where faxes sent to this application will be forwarded to (as pdf or tiff attachments).
     */
    public function withFaxEmailRecipient(?string $faxEmailRecipient): self
    {
        $obj = clone $this;
        $obj['fax_email_recipient'] = $faxEmailRecipient;

        return $obj;
    }

    /**
     * @param Inbound|array{
     *   channel_limit?: int|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
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
     * Tags associated with the Fax Application.
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
        $obj['webhook_event_failover_url'] = $webhookEventFailoverURL;

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
