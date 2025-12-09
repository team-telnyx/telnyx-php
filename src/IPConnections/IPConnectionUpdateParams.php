<?php

declare(strict_types=1);

namespace Telnyx\IPConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
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
use Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion;
use Telnyx\IPConnections\OutboundIP\AniOverrideType;
use Telnyx\IPConnections\OutboundIP\IPAuthenticationMethod;
use Telnyx\IPConnections\OutboundIP\T38ReinviteSource;

/**
 * Updates settings of an existing IP connection.
 *
 * @see Telnyx\Services\IPConnectionsService::update()
 *
 * @phpstan-type IPConnectionUpdateParamsShape = array{
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   androidPushCredentialID?: string|null,
 *   callCostInWebhooks?: bool,
 *   connectionName?: string,
 *   defaultOnHoldComfortNoiseEnabled?: bool,
 *   dtmfType?: DtmfType|value-of<DtmfType>,
 *   encodeContactHeaderEnabled?: bool,
 *   encryptedMedia?: null|EncryptedMedia|value-of<EncryptedMedia>,
 *   inbound?: InboundIP|array{
 *     aniNumberFormat?: value-of<AniNumberFormat>|null,
 *     channelLimit?: int|null,
 *     codecs?: list<string>|null,
 *     defaultPrimaryIPID?: string|null,
 *     defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
 *     defaultSecondaryIPID?: string|null,
 *     defaultTertiaryIPID?: string|null,
 *     dnisNumberFormat?: value-of<DnisNumberFormat>|null,
 *     generateRingbackTone?: bool|null,
 *     isupHeadersEnabled?: bool|null,
 *     prackEnabled?: bool|null,
 *     shakenStirEnabled?: bool|null,
 *     sipCompactHeadersEnabled?: bool|null,
 *     sipRegion?: value-of<SipRegion>|null,
 *     sipSubdomain?: string|null,
 *     sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
 *     timeout1xxSecs?: int|null,
 *     timeout2xxSecs?: int|null,
 *   },
 *   iosPushCredentialID?: string|null,
 *   onnetT38PassthroughEnabled?: bool,
 *   outbound?: OutboundIP|array{
 *     aniOverride?: string|null,
 *     aniOverrideType?: value-of<AniOverrideType>|null,
 *     callParkingEnabled?: bool|null,
 *     channelLimit?: int|null,
 *     generateRingbackTone?: bool|null,
 *     instantRingbackEnabled?: bool|null,
 *     ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
 *     ipAuthenticationToken?: string|null,
 *     localization?: string|null,
 *     outboundVoiceProfileID?: string|null,
 *     t38ReinviteSource?: value-of<T38ReinviteSource>|null,
 *     techPrefix?: string|null,
 *   },
 *   rtcpSettings?: ConnectionRtcpSettings|array{
 *     captureEnabled?: bool|null,
 *     port?: value-of<Port>|null,
 *     reportFrequencySecs?: int|null,
 *   },
 *   tags?: list<string>,
 *   transportProtocol?: TransportProtocol|value-of<TransportProtocol>,
 *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
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
    #[Optional]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Optional('anchorsite_override', enum: AnchorsiteOverride::class)]
    public ?string $anchorsiteOverride;

    /**
     * The uuid of the push credential for Android.
     */
    #[Optional('android_push_credential_id', nullable: true)]
    public ?string $androidPushCredentialID;

    /**
     * Specifies if call cost webhooks should be sent for this connection.
     */
    #[Optional('call_cost_in_webhooks')]
    public ?bool $callCostInWebhooks;

    #[Optional('connection_name')]
    public ?string $connectionName;

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    #[Optional('default_on_hold_comfort_noise_enabled')]
    public ?bool $defaultOnHoldComfortNoiseEnabled;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmfType
     */
    #[Optional('dtmf_type', enum: DtmfType::class)]
    public ?string $dtmfType;

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    #[Optional('encode_contact_header_enabled')]
    public ?bool $encodeContactHeaderEnabled;

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @var value-of<EncryptedMedia>|null $encryptedMedia
     */
    #[Optional('encrypted_media', enum: EncryptedMedia::class, nullable: true)]
    public ?string $encryptedMedia;

    #[Optional]
    public ?InboundIP $inbound;

    /**
     * The uuid of the push credential for Ios.
     */
    #[Optional('ios_push_credential_id', nullable: true)]
    public ?string $iosPushCredentialID;

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    #[Optional('onnet_t38_passthrough_enabled')]
    public ?bool $onnetT38PassthroughEnabled;

    #[Optional]
    public ?OutboundIP $outbound;

    #[Optional('rtcp_settings')]
    public ?ConnectionRtcpSettings $rtcpSettings;

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
     * @var value-of<TransportProtocol>|null $transportProtocol
     */
    #[Optional('transport_protocol', enum: TransportProtocol::class)]
    public ?string $transportProtocol;

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhookAPIVersion
     */
    #[Optional('webhook_api_version', enum: WebhookAPIVersion::class)]
    public ?string $webhookAPIVersion;

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
     * @param DtmfType|value-of<DtmfType> $dtmfType
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     * @param InboundIP|array{
     *   aniNumberFormat?: value-of<AniNumberFormat>|null,
     *   channelLimit?: int|null,
     *   codecs?: list<string>|null,
     *   defaultPrimaryIPID?: string|null,
     *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
     *   defaultSecondaryIPID?: string|null,
     *   defaultTertiaryIPID?: string|null,
     *   dnisNumberFormat?: value-of<DnisNumberFormat>|null,
     *   generateRingbackTone?: bool|null,
     *   isupHeadersEnabled?: bool|null,
     *   prackEnabled?: bool|null,
     *   shakenStirEnabled?: bool|null,
     *   sipCompactHeadersEnabled?: bool|null,
     *   sipRegion?: value-of<SipRegion>|null,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
     *   timeout1xxSecs?: int|null,
     *   timeout2xxSecs?: int|null,
     * } $inbound
     * @param OutboundIP|array{
     *   aniOverride?: string|null,
     *   aniOverrideType?: value-of<AniOverrideType>|null,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int|null,
     *   generateRingbackTone?: bool|null,
     *   instantRingbackEnabled?: bool|null,
     *   ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
     *   ipAuthenticationToken?: string|null,
     *   localization?: string|null,
     *   outboundVoiceProfileID?: string|null,
     *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
     *   techPrefix?: string|null,
     * } $outbound
     * @param ConnectionRtcpSettings|array{
     *   captureEnabled?: bool|null,
     *   port?: value-of<Port>|null,
     *   reportFrequencySecs?: int|null,
     * } $rtcpSettings
     * @param list<string> $tags
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $androidPushCredentialID = null,
        ?bool $callCostInWebhooks = null,
        ?string $connectionName = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        InboundIP|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        ?bool $onnetT38PassthroughEnabled = null,
        OutboundIP|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        ?array $tags = null,
        TransportProtocol|string|null $transportProtocol = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        null !== $active && $obj['active'] = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $androidPushCredentialID && $obj['androidPushCredentialID'] = $androidPushCredentialID;
        null !== $callCostInWebhooks && $obj['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $connectionName && $obj['connectionName'] = $connectionName;
        null !== $defaultOnHoldComfortNoiseEnabled && $obj['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $obj['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $obj['encryptedMedia'] = $encryptedMedia;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $iosPushCredentialID && $obj['iosPushCredentialID'] = $iosPushCredentialID;
        null !== $onnetT38PassthroughEnabled && $obj['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $rtcpSettings && $obj['rtcpSettings'] = $rtcpSettings;
        null !== $tags && $obj['tags'] = $tags;
        null !== $transportProtocol && $obj['transportProtocol'] = $transportProtocol;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

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
        $obj['anchorsiteOverride'] = $anchorsiteOverride;

        return $obj;
    }

    /**
     * The uuid of the push credential for Android.
     */
    public function withAndroidPushCredentialID(
        ?string $androidPushCredentialID
    ): self {
        $obj = clone $this;
        $obj['androidPushCredentialID'] = $androidPushCredentialID;

        return $obj;
    }

    /**
     * Specifies if call cost webhooks should be sent for this connection.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $obj = clone $this;
        $obj['callCostInWebhooks'] = $callCostInWebhooks;

        return $obj;
    }

    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connectionName'] = $connectionName;

        return $obj;
    }

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    public function withDefaultOnHoldComfortNoiseEnabled(
        bool $defaultOnHoldComfortNoiseEnabled
    ): self {
        $obj = clone $this;
        $obj['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;

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
        $obj['dtmfType'] = $dtmfType;

        return $obj;
    }

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    public function withEncodeContactHeaderEnabled(
        bool $encodeContactHeaderEnabled
    ): self {
        $obj = clone $this;
        $obj['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;

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
        $obj['encryptedMedia'] = $encryptedMedia;

        return $obj;
    }

    /**
     * @param InboundIP|array{
     *   aniNumberFormat?: value-of<AniNumberFormat>|null,
     *   channelLimit?: int|null,
     *   codecs?: list<string>|null,
     *   defaultPrimaryIPID?: string|null,
     *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
     *   defaultSecondaryIPID?: string|null,
     *   defaultTertiaryIPID?: string|null,
     *   dnisNumberFormat?: value-of<DnisNumberFormat>|null,
     *   generateRingbackTone?: bool|null,
     *   isupHeadersEnabled?: bool|null,
     *   prackEnabled?: bool|null,
     *   shakenStirEnabled?: bool|null,
     *   sipCompactHeadersEnabled?: bool|null,
     *   sipRegion?: value-of<SipRegion>|null,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
     *   timeout1xxSecs?: int|null,
     *   timeout2xxSecs?: int|null,
     * } $inbound
     */
    public function withInbound(InboundIP|array $inbound): self
    {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * The uuid of the push credential for Ios.
     */
    public function withIosPushCredentialID(?string $iosPushCredentialID): self
    {
        $obj = clone $this;
        $obj['iosPushCredentialID'] = $iosPushCredentialID;

        return $obj;
    }

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $obj = clone $this;
        $obj['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;

        return $obj;
    }

    /**
     * @param OutboundIP|array{
     *   aniOverride?: string|null,
     *   aniOverrideType?: value-of<AniOverrideType>|null,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int|null,
     *   generateRingbackTone?: bool|null,
     *   instantRingbackEnabled?: bool|null,
     *   ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
     *   ipAuthenticationToken?: string|null,
     *   localization?: string|null,
     *   outboundVoiceProfileID?: string|null,
     *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
     *   techPrefix?: string|null,
     * } $outbound
     */
    public function withOutbound(OutboundIP|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * @param ConnectionRtcpSettings|array{
     *   captureEnabled?: bool|null,
     *   port?: value-of<Port>|null,
     *   reportFrequencySecs?: int|null,
     * } $rtcpSettings
     */
    public function withRtcpSettings(
        ConnectionRtcpSettings|array $rtcpSettings
    ): self {
        $obj = clone $this;
        $obj['rtcpSettings'] = $rtcpSettings;

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
        $obj['transportProtocol'] = $transportProtocol;

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
        $obj['webhookAPIVersion'] = $webhookAPIVersion;

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
