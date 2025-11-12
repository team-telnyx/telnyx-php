<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion;

/**
 * Updates settings of an existing IP connection.
 *
 * @see Telnyx\Services\IPConnectionsService::update()
 *
 * @phpstan-type IPConnectionUpdateParamsShape = array{
 *   active?: bool,
 *   anchorsite_override?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   android_push_credential_id?: string|null,
 *   connection_name?: string,
 *   default_on_hold_comfort_noise_enabled?: bool,
 *   dtmf_type?: DtmfType|value-of<DtmfType>,
 *   encode_contact_header_enabled?: bool,
 *   encrypted_media?: null|EncryptedMedia|value-of<EncryptedMedia>,
 *   inbound?: InboundIP,
 *   ios_push_credential_id?: string|null,
 *   onnet_t38_passthrough_enabled?: bool,
 *   outbound?: OutboundIP,
 *   rtcp_settings?: ConnectionRtcpSettings,
 *   tags?: list<string>,
 *   transport_protocol?: TransportProtocol|value-of<TransportProtocol>,
 *   webhook_api_version?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class IPConnectionUpdateParams implements BaseModel
{
    /** @use SdkModel<IPConnectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Defaults to true.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsite_override
     */
    #[Api(enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsite_override;

    /**
     * The uuid of the push credential for Android.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $android_push_credential_id;

    #[Api(optional: true)]
    public ?string $connection_name;

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    #[Api(optional: true)]
    public ?bool $default_on_hold_comfort_noise_enabled;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmf_type
     */
    #[Api(enum: DtmfType::class, optional: true)]
    public ?string $dtmf_type;

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    #[Api(optional: true)]
    public ?bool $encode_contact_header_enabled;

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @var value-of<EncryptedMedia>|null $encrypted_media
     */
    #[Api(enum: EncryptedMedia::class, nullable: true, optional: true)]
    public ?string $encrypted_media;

    #[Api(optional: true)]
    public ?InboundIP $inbound;

    /**
     * The uuid of the push credential for Ios.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $ios_push_credential_id;

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    #[Api(optional: true)]
    public ?bool $onnet_t38_passthrough_enabled;

    #[Api(optional: true)]
    public ?OutboundIP $outbound;

    #[Api(optional: true)]
    public ?ConnectionRtcpSettings $rtcp_settings;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     *
     * @var value-of<TransportProtocol>|null $transport_protocol
     */
    #[Api(enum: TransportProtocol::class, optional: true)]
    public ?string $transport_protocol;

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    #[Api(enum: WebhookAPIVersion::class, optional: true)]
    public ?string $webhook_api_version;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsite_override
     * @param DtmfType|value-of<DtmfType> $dtmf_type
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encrypted_media
     * @param list<string> $tags
     * @param TransportProtocol|value-of<TransportProtocol> $transport_protocol
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhook_api_version
     */
    public static function with(
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?string $android_push_credential_id = null,
        ?string $connection_name = null,
        ?bool $default_on_hold_comfort_noise_enabled = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $encode_contact_header_enabled = null,
        EncryptedMedia|string|null $encrypted_media = null,
        ?InboundIP $inbound = null,
        ?string $ios_push_credential_id = null,
        ?bool $onnet_t38_passthrough_enabled = null,
        ?OutboundIP $outbound = null,
        ?ConnectionRtcpSettings $rtcp_settings = null,
        ?array $tags = null,
        TransportProtocol|string|null $transport_protocol = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $android_push_credential_id && $obj->android_push_credential_id = $android_push_credential_id;
        null !== $connection_name && $obj->connection_name = $connection_name;
        null !== $default_on_hold_comfort_noise_enabled && $obj->default_on_hold_comfort_noise_enabled = $default_on_hold_comfort_noise_enabled;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $encode_contact_header_enabled && $obj->encode_contact_header_enabled = $encode_contact_header_enabled;
        null !== $encrypted_media && $obj['encrypted_media'] = $encrypted_media;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $ios_push_credential_id && $obj->ios_push_credential_id = $ios_push_credential_id;
        null !== $onnet_t38_passthrough_enabled && $obj->onnet_t38_passthrough_enabled = $onnet_t38_passthrough_enabled;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $rtcp_settings && $obj->rtcp_settings = $rtcp_settings;
        null !== $tags && $obj->tags = $tags;
        null !== $transport_protocol && $obj['transport_protocol'] = $transport_protocol;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj->webhook_event_failover_url = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj->webhook_event_url = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj->webhook_timeout_secs = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * Defaults to true.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

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
     * The uuid of the push credential for Android.
     */
    public function withAndroidPushCredentialID(
        ?string $androidPushCredentialID
    ): self {
        $obj = clone $this;
        $obj->android_push_credential_id = $androidPushCredentialID;

        return $obj;
    }

    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj->connection_name = $connectionName;

        return $obj;
    }

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    public function withDefaultOnHoldComfortNoiseEnabled(
        bool $defaultOnHoldComfortNoiseEnabled
    ): self {
        $obj = clone $this;
        $obj->default_on_hold_comfort_noise_enabled = $defaultOnHoldComfortNoiseEnabled;

        return $obj;
    }

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @param DtmfType|value-of<DtmfType> $dtmfType
     */
    public function withDtmfType(DtmfType|string $dtmfType): self
    {
        $obj = clone $this;
        $obj['dtmf_type'] = $dtmfType;

        return $obj;
    }

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    public function withEncodeContactHeaderEnabled(
        bool $encodeContactHeaderEnabled
    ): self {
        $obj = clone $this;
        $obj->encode_contact_header_enabled = $encodeContactHeaderEnabled;

        return $obj;
    }

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     */
    public function withEncryptedMedia(
        EncryptedMedia|string|null $encryptedMedia
    ): self {
        $obj = clone $this;
        $obj['encrypted_media'] = $encryptedMedia;

        return $obj;
    }

    public function withInbound(InboundIP $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

        return $obj;
    }

    /**
     * The uuid of the push credential for Ios.
     */
    public function withIosPushCredentialID(?string $iosPushCredentialID): self
    {
        $obj = clone $this;
        $obj->ios_push_credential_id = $iosPushCredentialID;

        return $obj;
    }

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $obj = clone $this;
        $obj->onnet_t38_passthrough_enabled = $onnetT38PassthroughEnabled;

        return $obj;
    }

    public function withOutbound(OutboundIP $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    public function withRtcpSettings(ConnectionRtcpSettings $rtcpSettings): self
    {
        $obj = clone $this;
        $obj->rtcp_settings = $rtcpSettings;

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
     * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     *
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol
     */
    public function withTransportProtocol(
        TransportProtocol|string $transportProtocol
    ): self {
        $obj = clone $this;
        $obj['transport_protocol'] = $transportProtocol;

        return $obj;
    }

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public function withWebhookAPIVersion(
        WebhookAPIVersion|string $webhookAPIVersion
    ): self {
        $obj = clone $this;
        $obj['webhook_api_version'] = $webhookAPIVersion;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhook_event_failover_url = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj->webhook_event_url = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhook_timeout_secs = $webhookTimeoutSecs;

        return $obj;
    }
}
