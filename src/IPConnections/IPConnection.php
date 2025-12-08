<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\InboundIP\AniNumberFormat;
use Telnyx\IPConnections\InboundIP\DefaultRoutingMethod;
use Telnyx\IPConnections\InboundIP\DnisNumberFormat;
use Telnyx\IPConnections\InboundIP\SipRegion;
use Telnyx\IPConnections\InboundIP\SipSubdomainReceiveSettings;
use Telnyx\IPConnections\IPConnection\TransportProtocol;
use Telnyx\IPConnections\IPConnection\WebhookAPIVersion;
use Telnyx\IPConnections\OutboundIP\AniOverrideType;
use Telnyx\IPConnections\OutboundIP\IPAuthenticationMethod;
use Telnyx\IPConnections\OutboundIP\T38ReinviteSource;

/**
 * @phpstan-type IPConnectionShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
 *   call_cost_in_webhooks?: bool|null,
 *   connection_name?: string|null,
 *   created_at?: string|null,
 *   default_on_hold_comfort_noise_enabled?: bool|null,
 *   dtmf_type?: value-of<DtmfType>|null,
 *   encode_contact_header_enabled?: bool|null,
 *   encrypted_media?: value-of<EncryptedMedia>|null,
 *   inbound?: InboundIP|null,
 *   onnet_t38_passthrough_enabled?: bool|null,
 *   outbound?: OutboundIP|null,
 *   record_type?: string|null,
 *   rtcp_settings?: ConnectionRtcpSettings|null,
 *   tags?: list<string>|null,
 *   transport_protocol?: value-of<TransportProtocol>|null,
 *   updated_at?: string|null,
 *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class IPConnection implements BaseModel
{
    /** @use SdkModel<IPConnectionShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Defaults to true.
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
     * Specifies if call cost webhooks should be sent for this connection.
     */
    #[Optional]
    public ?bool $call_cost_in_webhooks;

    #[Optional]
    public ?string $connection_name;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    #[Optional]
    public ?bool $default_on_hold_comfort_noise_enabled;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmf_type
     */
    #[Optional(enum: DtmfType::class)]
    public ?string $dtmf_type;

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    #[Optional]
    public ?bool $encode_contact_header_enabled;

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @var value-of<EncryptedMedia>|null $encrypted_media
     */
    #[Optional(enum: EncryptedMedia::class, nullable: true)]
    public ?string $encrypted_media;

    #[Optional]
    public ?InboundIP $inbound;

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    #[Optional]
    public ?bool $onnet_t38_passthrough_enabled;

    #[Optional]
    public ?OutboundIP $outbound;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    #[Optional]
    public ?ConnectionRtcpSettings $rtcp_settings;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     *
     * @var value-of<TransportProtocol>|null $transport_protocol
     */
    #[Optional(enum: TransportProtocol::class)]
    public ?string $transport_protocol;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    #[Optional(enum: WebhookAPIVersion::class)]
    public ?string $webhook_api_version;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional(nullable: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Optional]
    public ?string $webhook_event_url;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional(nullable: true)]
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
     * @param InboundIP|array{
     *   ani_number_format?: value-of<AniNumberFormat>|null,
     *   channel_limit?: int|null,
     *   codecs?: list<string>|null,
     *   default_primary_ip_id?: string|null,
     *   default_routing_method?: value-of<DefaultRoutingMethod>|null,
     *   default_secondary_ip_id?: string|null,
     *   default_tertiary_ip_id?: string|null,
     *   dnis_number_format?: value-of<DnisNumberFormat>|null,
     *   generate_ringback_tone?: bool|null,
     *   isup_headers_enabled?: bool|null,
     *   prack_enabled?: bool|null,
     *   shaken_stir_enabled?: bool|null,
     *   sip_compact_headers_enabled?: bool|null,
     *   sip_region?: value-of<SipRegion>|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     *   timeout_1xx_secs?: int|null,
     *   timeout_2xx_secs?: int|null,
     * } $inbound
     * @param OutboundIP|array{
     *   ani_override?: string|null,
     *   ani_override_type?: value-of<AniOverrideType>|null,
     *   call_parking_enabled?: bool|null,
     *   channel_limit?: int|null,
     *   generate_ringback_tone?: bool|null,
     *   instant_ringback_enabled?: bool|null,
     *   ip_authentication_method?: value-of<IPAuthenticationMethod>|null,
     *   ip_authentication_token?: string|null,
     *   localization?: string|null,
     *   outbound_voice_profile_id?: string|null,
     *   t38_reinvite_source?: value-of<T38ReinviteSource>|null,
     *   tech_prefix?: string|null,
     * } $outbound
     * @param ConnectionRtcpSettings|array{
     *   capture_enabled?: bool|null,
     *   port?: value-of<Port>|null,
     *   report_frequency_secs?: int|null,
     * } $rtcp_settings
     * @param list<string> $tags
     * @param TransportProtocol|value-of<TransportProtocol> $transport_protocol
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhook_api_version
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?bool $call_cost_in_webhooks = null,
        ?string $connection_name = null,
        ?string $created_at = null,
        ?bool $default_on_hold_comfort_noise_enabled = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $encode_contact_header_enabled = null,
        EncryptedMedia|string|null $encrypted_media = null,
        InboundIP|array|null $inbound = null,
        ?bool $onnet_t38_passthrough_enabled = null,
        OutboundIP|array|null $outbound = null,
        ?string $record_type = null,
        ConnectionRtcpSettings|array|null $rtcp_settings = null,
        ?array $tags = null,
        TransportProtocol|string|null $transport_protocol = null,
        ?string $updated_at = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $call_cost_in_webhooks && $obj['call_cost_in_webhooks'] = $call_cost_in_webhooks;
        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $default_on_hold_comfort_noise_enabled && $obj['default_on_hold_comfort_noise_enabled'] = $default_on_hold_comfort_noise_enabled;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $encode_contact_header_enabled && $obj['encode_contact_header_enabled'] = $encode_contact_header_enabled;
        null !== $encrypted_media && $obj['encrypted_media'] = $encrypted_media;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $onnet_t38_passthrough_enabled && $obj['onnet_t38_passthrough_enabled'] = $onnet_t38_passthrough_enabled;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $rtcp_settings && $obj['rtcp_settings'] = $rtcp_settings;
        null !== $tags && $obj['tags'] = $tags;
        null !== $transport_protocol && $obj['transport_protocol'] = $transport_protocol;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Defaults to true.
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
     * Specifies if call cost webhooks should be sent for this connection.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $obj = clone $this;
        $obj['call_cost_in_webhooks'] = $callCostInWebhooks;

        return $obj;
    }

    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    public function withDefaultOnHoldComfortNoiseEnabled(
        bool $defaultOnHoldComfortNoiseEnabled
    ): self {
        $obj = clone $this;
        $obj['default_on_hold_comfort_noise_enabled'] = $defaultOnHoldComfortNoiseEnabled;

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
        $obj['encode_contact_header_enabled'] = $encodeContactHeaderEnabled;

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

    /**
     * @param InboundIP|array{
     *   ani_number_format?: value-of<AniNumberFormat>|null,
     *   channel_limit?: int|null,
     *   codecs?: list<string>|null,
     *   default_primary_ip_id?: string|null,
     *   default_routing_method?: value-of<DefaultRoutingMethod>|null,
     *   default_secondary_ip_id?: string|null,
     *   default_tertiary_ip_id?: string|null,
     *   dnis_number_format?: value-of<DnisNumberFormat>|null,
     *   generate_ringback_tone?: bool|null,
     *   isup_headers_enabled?: bool|null,
     *   prack_enabled?: bool|null,
     *   shaken_stir_enabled?: bool|null,
     *   sip_compact_headers_enabled?: bool|null,
     *   sip_region?: value-of<SipRegion>|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     *   timeout_1xx_secs?: int|null,
     *   timeout_2xx_secs?: int|null,
     * } $inbound
     */
    public function withInbound(InboundIP|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $obj = clone $this;
        $obj['onnet_t38_passthrough_enabled'] = $onnetT38PassthroughEnabled;

        return $obj;
    }

    /**
     * @param OutboundIP|array{
     *   ani_override?: string|null,
     *   ani_override_type?: value-of<AniOverrideType>|null,
     *   call_parking_enabled?: bool|null,
     *   channel_limit?: int|null,
     *   generate_ringback_tone?: bool|null,
     *   instant_ringback_enabled?: bool|null,
     *   ip_authentication_method?: value-of<IPAuthenticationMethod>|null,
     *   ip_authentication_token?: string|null,
     *   localization?: string|null,
     *   outbound_voice_profile_id?: string|null,
     *   t38_reinvite_source?: value-of<T38ReinviteSource>|null,
     *   tech_prefix?: string|null,
     * } $outbound
     */
    public function withOutbound(OutboundIP|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param ConnectionRtcpSettings|array{
     *   capture_enabled?: bool|null,
     *   port?: value-of<Port>|null,
     *   report_frequency_secs?: int|null,
     * } $rtcpSettings
     */
    public function withRtcpSettings(
        ConnectionRtcpSettings|array $rtcpSettings
    ): self {
        $obj = clone $this;
        $obj['rtcp_settings'] = $rtcpSettings;

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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

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
        $obj['webhook_event_failover_url'] = $webhookEventFailoverURL;

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
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhook_timeout_secs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
