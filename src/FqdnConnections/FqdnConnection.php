<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\FqdnConnections\InboundFqdn\AniNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\DefaultRoutingMethod;
use Telnyx\FqdnConnections\InboundFqdn\DnisNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\SipRegion;
use Telnyx\FqdnConnections\InboundFqdn\SipSubdomainReceiveSettings;
use Telnyx\FqdnConnections\OutboundFqdn\AniOverrideType;
use Telnyx\FqdnConnections\OutboundFqdn\IPAuthenticationMethod;
use Telnyx\FqdnConnections\OutboundFqdn\T38ReinviteSource;

/**
 * @phpstan-type FqdnConnectionShape = array{
 *   connection_name: string,
 *   id?: string|null,
 *   active?: bool|null,
 *   adjust_dtmf_timestamp?: bool|null,
 *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
 *   call_cost_enabled?: bool|null,
 *   call_cost_in_webhooks?: bool|null,
 *   created_at?: string|null,
 *   default_on_hold_comfort_noise_enabled?: bool|null,
 *   dtmf_type?: value-of<DtmfType>|null,
 *   encode_contact_header_enabled?: bool|null,
 *   encrypted_media?: value-of<EncryptedMedia>|null,
 *   ignore_dtmf_duration?: bool|null,
 *   ignore_mark_bit?: bool|null,
 *   inbound?: InboundFqdn|null,
 *   microsoft_teams_sbc?: bool|null,
 *   noise_suppression?: bool|null,
 *   onnet_t38_passthrough_enabled?: bool|null,
 *   outbound?: OutboundFqdn|null,
 *   password?: string|null,
 *   record_type?: string|null,
 *   rtcp_settings?: ConnectionRtcpSettings|null,
 *   rtp_pass_codecs_on_stream_change?: bool|null,
 *   send_normalized_timestamps?: bool|null,
 *   tags?: list<string>|null,
 *   third_party_control_enabled?: bool|null,
 *   transport_protocol?: value-of<TransportProtocol>|null,
 *   txt_name?: string|null,
 *   txt_ttl?: int|null,
 *   txt_value?: string|null,
 *   updated_at?: string|null,
 *   user_name?: string|null,
 *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class FqdnConnection implements BaseModel
{
    /** @use SdkModel<FqdnConnectionShape> */
    use SdkModel;

    /**
     * A user-assigned name to help manage the connection.
     */
    #[Api]
    public string $connection_name;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Defaults to true.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * Indicates whether DTMF timestamp adjustment is enabled.
     */
    #[Api(optional: true)]
    public ?bool $adjust_dtmf_timestamp;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsite_override
     */
    #[Api(enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsite_override;

    /**
     * Indicates whether call cost calculation is enabled.
     */
    #[Api(optional: true)]
    public ?bool $call_cost_enabled;

    /**
     * Specifies if call cost webhooks should be sent for this connection.
     */
    #[Api(optional: true)]
    public ?bool $call_cost_in_webhooks;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

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

    /**
     * Indicates whether DTMF duration should be ignored.
     */
    #[Api(optional: true)]
    public ?bool $ignore_dtmf_duration;

    /**
     * Indicates whether the mark bit should be ignored.
     */
    #[Api(optional: true)]
    public ?bool $ignore_mark_bit;

    #[Api(optional: true)]
    public ?InboundFqdn $inbound;

    /**
     * The connection is enabled for Microsoft Teams Direct Routing.
     */
    #[Api(optional: true)]
    public ?bool $microsoft_teams_sbc;

    /**
     * Indicates whether noise suppression is enabled.
     */
    #[Api(optional: true)]
    public ?bool $noise_suppression;

    /**
     * Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     */
    #[Api(optional: true)]
    public ?bool $onnet_t38_passthrough_enabled;

    #[Api(optional: true)]
    public ?OutboundFqdn $outbound;

    /**
     * The password for the FQDN connection.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?ConnectionRtcpSettings $rtcp_settings;

    /**
     * Defines if codecs should be passed on stream change.
     */
    #[Api(optional: true)]
    public ?bool $rtp_pass_codecs_on_stream_change;

    /**
     * Indicates whether normalized timestamps should be sent.
     */
    #[Api(optional: true)]
    public ?bool $send_normalized_timestamps;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * Indicates whether third-party control is enabled.
     */
    #[Api(optional: true)]
    public ?bool $third_party_control_enabled;

    /**
     * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     *
     * @var value-of<TransportProtocol>|null $transport_protocol
     */
    #[Api(enum: TransportProtocol::class, optional: true)]
    public ?string $transport_protocol;

    /**
     * The name for the TXT record associated with the FQDN connection.
     */
    #[Api(optional: true)]
    public ?string $txt_name;

    /**
     * The time to live for the TXT record associated with the FQDN connection.
     */
    #[Api(optional: true)]
    public ?int $txt_ttl;

    /**
     * The value for the TXT record associated with the FQDN connection.
     */
    #[Api(optional: true)]
    public ?string $txt_value;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * The username for the FQDN connection.
     */
    #[Api(optional: true)]
    public ?string $user_name;

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

    /**
     * `new FqdnConnection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FqdnConnection::with(connection_name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FqdnConnection)->withConnectionName(...)
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
     * @param DtmfType|value-of<DtmfType> $dtmf_type
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encrypted_media
     * @param InboundFqdn|array{
     *   ani_number_format?: value-of<AniNumberFormat>|null,
     *   channel_limit?: int|null,
     *   codecs?: list<string>|null,
     *   default_primary_fqdn_id?: string|null,
     *   default_routing_method?: value-of<DefaultRoutingMethod>|null,
     *   default_secondary_fqdn_id?: string|null,
     *   default_tertiary_fqdn_id?: string|null,
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
     * @param OutboundFqdn|array{
     *   ani_override?: string|null,
     *   ani_override_type?: value-of<AniOverrideType>|null,
     *   call_parking_enabled?: bool|null,
     *   channel_limit?: int|null,
     *   encrypted_media?: value-of<EncryptedMedia>|null,
     *   generate_ringback_tone?: bool|null,
     *   instant_ringback_enabled?: bool|null,
     *   ip_authentication_method?: value-of<IPAuthenticationMethod>|null,
     *   ip_authentication_token?: string|null,
     *   localization?: string|null,
     *   outbound_voice_profile_id?: string|null,
     *   t38_reinvite_source?: value-of<T38ReinviteSource>|null,
     *   tech_prefix?: string|null,
     *   timeout_1xx_secs?: int|null,
     *   timeout_2xx_secs?: int|null,
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
        string $connection_name,
        ?string $id = null,
        ?bool $active = null,
        ?bool $adjust_dtmf_timestamp = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?bool $call_cost_enabled = null,
        ?bool $call_cost_in_webhooks = null,
        ?string $created_at = null,
        ?bool $default_on_hold_comfort_noise_enabled = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $encode_contact_header_enabled = null,
        EncryptedMedia|string|null $encrypted_media = null,
        ?bool $ignore_dtmf_duration = null,
        ?bool $ignore_mark_bit = null,
        InboundFqdn|array|null $inbound = null,
        ?bool $microsoft_teams_sbc = null,
        ?bool $noise_suppression = null,
        ?bool $onnet_t38_passthrough_enabled = null,
        OutboundFqdn|array|null $outbound = null,
        ?string $password = null,
        ?string $record_type = null,
        ConnectionRtcpSettings|array|null $rtcp_settings = null,
        ?bool $rtp_pass_codecs_on_stream_change = null,
        ?bool $send_normalized_timestamps = null,
        ?array $tags = null,
        ?bool $third_party_control_enabled = null,
        TransportProtocol|string|null $transport_protocol = null,
        ?string $txt_name = null,
        ?int $txt_ttl = null,
        ?string $txt_value = null,
        ?string $updated_at = null,
        ?string $user_name = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        $obj['connection_name'] = $connection_name;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $adjust_dtmf_timestamp && $obj['adjust_dtmf_timestamp'] = $adjust_dtmf_timestamp;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $call_cost_enabled && $obj['call_cost_enabled'] = $call_cost_enabled;
        null !== $call_cost_in_webhooks && $obj['call_cost_in_webhooks'] = $call_cost_in_webhooks;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $default_on_hold_comfort_noise_enabled && $obj['default_on_hold_comfort_noise_enabled'] = $default_on_hold_comfort_noise_enabled;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $encode_contact_header_enabled && $obj['encode_contact_header_enabled'] = $encode_contact_header_enabled;
        null !== $encrypted_media && $obj['encrypted_media'] = $encrypted_media;
        null !== $ignore_dtmf_duration && $obj['ignore_dtmf_duration'] = $ignore_dtmf_duration;
        null !== $ignore_mark_bit && $obj['ignore_mark_bit'] = $ignore_mark_bit;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $microsoft_teams_sbc && $obj['microsoft_teams_sbc'] = $microsoft_teams_sbc;
        null !== $noise_suppression && $obj['noise_suppression'] = $noise_suppression;
        null !== $onnet_t38_passthrough_enabled && $obj['onnet_t38_passthrough_enabled'] = $onnet_t38_passthrough_enabled;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $password && $obj['password'] = $password;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $rtcp_settings && $obj['rtcp_settings'] = $rtcp_settings;
        null !== $rtp_pass_codecs_on_stream_change && $obj['rtp_pass_codecs_on_stream_change'] = $rtp_pass_codecs_on_stream_change;
        null !== $send_normalized_timestamps && $obj['send_normalized_timestamps'] = $send_normalized_timestamps;
        null !== $tags && $obj['tags'] = $tags;
        null !== $third_party_control_enabled && $obj['third_party_control_enabled'] = $third_party_control_enabled;
        null !== $transport_protocol && $obj['transport_protocol'] = $transport_protocol;
        null !== $txt_name && $obj['txt_name'] = $txt_name;
        null !== $txt_ttl && $obj['txt_ttl'] = $txt_ttl;
        null !== $txt_value && $obj['txt_value'] = $txt_value;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_name && $obj['user_name'] = $user_name;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the connection.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * Identifies the resource.
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
     * Indicates whether DTMF timestamp adjustment is enabled.
     */
    public function withAdjustDtmfTimestamp(bool $adjustDtmfTimestamp): self
    {
        $obj = clone $this;
        $obj['adjust_dtmf_timestamp'] = $adjustDtmfTimestamp;

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
     * Indicates whether call cost calculation is enabled.
     */
    public function withCallCostEnabled(bool $callCostEnabled): self
    {
        $obj = clone $this;
        $obj['call_cost_enabled'] = $callCostEnabled;

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
     * Indicates whether DTMF duration should be ignored.
     */
    public function withIgnoreDtmfDuration(bool $ignoreDtmfDuration): self
    {
        $obj = clone $this;
        $obj['ignore_dtmf_duration'] = $ignoreDtmfDuration;

        return $obj;
    }

    /**
     * Indicates whether the mark bit should be ignored.
     */
    public function withIgnoreMarkBit(bool $ignoreMarkBit): self
    {
        $obj = clone $this;
        $obj['ignore_mark_bit'] = $ignoreMarkBit;

        return $obj;
    }

    /**
     * @param InboundFqdn|array{
     *   ani_number_format?: value-of<AniNumberFormat>|null,
     *   channel_limit?: int|null,
     *   codecs?: list<string>|null,
     *   default_primary_fqdn_id?: string|null,
     *   default_routing_method?: value-of<DefaultRoutingMethod>|null,
     *   default_secondary_fqdn_id?: string|null,
     *   default_tertiary_fqdn_id?: string|null,
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
    public function withInbound(InboundFqdn|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * The connection is enabled for Microsoft Teams Direct Routing.
     */
    public function withMicrosoftTeamsSbc(bool $microsoftTeamsSbc): self
    {
        $obj = clone $this;
        $obj['microsoft_teams_sbc'] = $microsoftTeamsSbc;

        return $obj;
    }

    /**
     * Indicates whether noise suppression is enabled.
     */
    public function withNoiseSuppression(bool $noiseSuppression): self
    {
        $obj = clone $this;
        $obj['noise_suppression'] = $noiseSuppression;

        return $obj;
    }

    /**
     * Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $obj = clone $this;
        $obj['onnet_t38_passthrough_enabled'] = $onnetT38PassthroughEnabled;

        return $obj;
    }

    /**
     * @param OutboundFqdn|array{
     *   ani_override?: string|null,
     *   ani_override_type?: value-of<AniOverrideType>|null,
     *   call_parking_enabled?: bool|null,
     *   channel_limit?: int|null,
     *   encrypted_media?: value-of<EncryptedMedia>|null,
     *   generate_ringback_tone?: bool|null,
     *   instant_ringback_enabled?: bool|null,
     *   ip_authentication_method?: value-of<IPAuthenticationMethod>|null,
     *   ip_authentication_token?: string|null,
     *   localization?: string|null,
     *   outbound_voice_profile_id?: string|null,
     *   t38_reinvite_source?: value-of<T38ReinviteSource>|null,
     *   tech_prefix?: string|null,
     *   timeout_1xx_secs?: int|null,
     *   timeout_2xx_secs?: int|null,
     * } $outbound
     */
    public function withOutbound(OutboundFqdn|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * The password for the FQDN connection.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj['password'] = $password;

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
     * Defines if codecs should be passed on stream change.
     */
    public function withRtpPassCodecsOnStreamChange(
        bool $rtpPassCodecsOnStreamChange
    ): self {
        $obj = clone $this;
        $obj['rtp_pass_codecs_on_stream_change'] = $rtpPassCodecsOnStreamChange;

        return $obj;
    }

    /**
     * Indicates whether normalized timestamps should be sent.
     */
    public function withSendNormalizedTimestamps(
        bool $sendNormalizedTimestamps
    ): self {
        $obj = clone $this;
        $obj['send_normalized_timestamps'] = $sendNormalizedTimestamps;

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
     * Indicates whether third-party control is enabled.
     */
    public function withThirdPartyControlEnabled(
        bool $thirdPartyControlEnabled
    ): self {
        $obj = clone $this;
        $obj['third_party_control_enabled'] = $thirdPartyControlEnabled;

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
     * The name for the TXT record associated with the FQDN connection.
     */
    public function withTxtName(string $txtName): self
    {
        $obj = clone $this;
        $obj['txt_name'] = $txtName;

        return $obj;
    }

    /**
     * The time to live for the TXT record associated with the FQDN connection.
     */
    public function withTxtTtl(int $txtTtl): self
    {
        $obj = clone $this;
        $obj['txt_ttl'] = $txtTtl;

        return $obj;
    }

    /**
     * The value for the TXT record associated with the FQDN connection.
     */
    public function withTxtValue(string $txtValue): self
    {
        $obj = clone $this;
        $obj['txt_value'] = $txtValue;

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
     * The username for the FQDN connection.
     */
    public function withUserName(string $userName): self
    {
        $obj = clone $this;
        $obj['user_name'] = $userName;

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
