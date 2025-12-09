<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   connectionName: string,
 *   id?: string|null,
 *   active?: bool|null,
 *   adjustDtmfTimestamp?: bool|null,
 *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
 *   callCostEnabled?: bool|null,
 *   callCostInWebhooks?: bool|null,
 *   createdAt?: string|null,
 *   defaultOnHoldComfortNoiseEnabled?: bool|null,
 *   dtmfType?: value-of<DtmfType>|null,
 *   encodeContactHeaderEnabled?: bool|null,
 *   encryptedMedia?: value-of<EncryptedMedia>|null,
 *   ignoreDtmfDuration?: bool|null,
 *   ignoreMarkBit?: bool|null,
 *   inbound?: InboundFqdn|null,
 *   microsoftTeamsSbc?: bool|null,
 *   noiseSuppression?: bool|null,
 *   onnetT38PassthroughEnabled?: bool|null,
 *   outbound?: OutboundFqdn|null,
 *   password?: string|null,
 *   recordType?: string|null,
 *   rtcpSettings?: ConnectionRtcpSettings|null,
 *   rtpPassCodecsOnStreamChange?: bool|null,
 *   sendNormalizedTimestamps?: bool|null,
 *   tags?: list<string>|null,
 *   thirdPartyControlEnabled?: bool|null,
 *   transportProtocol?: value-of<TransportProtocol>|null,
 *   txtName?: string|null,
 *   txtTtl?: int|null,
 *   txtValue?: string|null,
 *   updatedAt?: string|null,
 *   userName?: string|null,
 *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class FqdnConnection implements BaseModel
{
    /** @use SdkModel<FqdnConnectionShape> */
    use SdkModel;

    /**
     * A user-assigned name to help manage the connection.
     */
    #[Required('connection_name')]
    public string $connectionName;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Defaults to true.
     */
    #[Optional]
    public ?bool $active;

    /**
     * Indicates whether DTMF timestamp adjustment is enabled.
     */
    #[Optional('adjust_dtmf_timestamp')]
    public ?bool $adjustDtmfTimestamp;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Optional('anchorsite_override', enum: AnchorsiteOverride::class)]
    public ?string $anchorsiteOverride;

    /**
     * Indicates whether call cost calculation is enabled.
     */
    #[Optional('call_cost_enabled')]
    public ?bool $callCostEnabled;

    /**
     * Specifies if call cost webhooks should be sent for this connection.
     */
    #[Optional('call_cost_in_webhooks')]
    public ?bool $callCostInWebhooks;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

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

    /**
     * Indicates whether DTMF duration should be ignored.
     */
    #[Optional('ignore_dtmf_duration')]
    public ?bool $ignoreDtmfDuration;

    /**
     * Indicates whether the mark bit should be ignored.
     */
    #[Optional('ignore_mark_bit')]
    public ?bool $ignoreMarkBit;

    #[Optional]
    public ?InboundFqdn $inbound;

    /**
     * The connection is enabled for Microsoft Teams Direct Routing.
     */
    #[Optional('microsoft_teams_sbc')]
    public ?bool $microsoftTeamsSbc;

    /**
     * Indicates whether noise suppression is enabled.
     */
    #[Optional('noise_suppression')]
    public ?bool $noiseSuppression;

    /**
     * Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     */
    #[Optional('onnet_t38_passthrough_enabled')]
    public ?bool $onnetT38PassthroughEnabled;

    #[Optional]
    public ?OutboundFqdn $outbound;

    /**
     * The password for the FQDN connection.
     */
    #[Optional]
    public ?string $password;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('rtcp_settings')]
    public ?ConnectionRtcpSettings $rtcpSettings;

    /**
     * Defines if codecs should be passed on stream change.
     */
    #[Optional('rtp_pass_codecs_on_stream_change')]
    public ?bool $rtpPassCodecsOnStreamChange;

    /**
     * Indicates whether normalized timestamps should be sent.
     */
    #[Optional('send_normalized_timestamps')]
    public ?bool $sendNormalizedTimestamps;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Indicates whether third-party control is enabled.
     */
    #[Optional('third_party_control_enabled')]
    public ?bool $thirdPartyControlEnabled;

    /**
     * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     *
     * @var value-of<TransportProtocol>|null $transportProtocol
     */
    #[Optional('transport_protocol', enum: TransportProtocol::class)]
    public ?string $transportProtocol;

    /**
     * The name for the TXT record associated with the FQDN connection.
     */
    #[Optional('txt_name')]
    public ?string $txtName;

    /**
     * The time to live for the TXT record associated with the FQDN connection.
     */
    #[Optional('txt_ttl')]
    public ?int $txtTtl;

    /**
     * The value for the TXT record associated with the FQDN connection.
     */
    #[Optional('txt_value')]
    public ?string $txtValue;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * The username for the FQDN connection.
     */
    #[Optional('user_name')]
    public ?string $userName;

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

    /**
     * `new FqdnConnection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FqdnConnection::with(connectionName: ...)
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride
     * @param DtmfType|value-of<DtmfType> $dtmfType
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     * @param InboundFqdn|array{
     *   aniNumberFormat?: value-of<AniNumberFormat>|null,
     *   channelLimit?: int|null,
     *   codecs?: list<string>|null,
     *   defaultPrimaryFqdnID?: string|null,
     *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
     *   defaultSecondaryFqdnID?: string|null,
     *   defaultTertiaryFqdnID?: string|null,
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
     * @param OutboundFqdn|array{
     *   aniOverride?: string|null,
     *   aniOverrideType?: value-of<AniOverrideType>|null,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int|null,
     *   encryptedMedia?: value-of<EncryptedMedia>|null,
     *   generateRingbackTone?: bool|null,
     *   instantRingbackEnabled?: bool|null,
     *   ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
     *   ipAuthenticationToken?: string|null,
     *   localization?: string|null,
     *   outboundVoiceProfileID?: string|null,
     *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
     *   techPrefix?: string|null,
     *   timeout1xxSecs?: int|null,
     *   timeout2xxSecs?: int|null,
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
        string $connectionName,
        ?string $id = null,
        ?bool $active = null,
        ?bool $adjustDtmfTimestamp = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?bool $callCostEnabled = null,
        ?bool $callCostInWebhooks = null,
        ?string $createdAt = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        ?bool $ignoreDtmfDuration = null,
        ?bool $ignoreMarkBit = null,
        InboundFqdn|array|null $inbound = null,
        ?bool $microsoftTeamsSbc = null,
        ?bool $noiseSuppression = null,
        ?bool $onnetT38PassthroughEnabled = null,
        OutboundFqdn|array|null $outbound = null,
        ?string $password = null,
        ?string $recordType = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        ?bool $rtpPassCodecsOnStreamChange = null,
        ?bool $sendNormalizedTimestamps = null,
        ?array $tags = null,
        ?bool $thirdPartyControlEnabled = null,
        TransportProtocol|string|null $transportProtocol = null,
        ?string $txtName = null,
        ?int $txtTtl = null,
        ?string $txtValue = null,
        ?string $updatedAt = null,
        ?string $userName = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $self = new self;

        $self['connectionName'] = $connectionName;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $adjustDtmfTimestamp && $self['adjustDtmfTimestamp'] = $adjustDtmfTimestamp;
        null !== $anchorsiteOverride && $self['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $callCostEnabled && $self['callCostEnabled'] = $callCostEnabled;
        null !== $callCostInWebhooks && $self['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $defaultOnHoldComfortNoiseEnabled && $self['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $self['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $self['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $self['encryptedMedia'] = $encryptedMedia;
        null !== $ignoreDtmfDuration && $self['ignoreDtmfDuration'] = $ignoreDtmfDuration;
        null !== $ignoreMarkBit && $self['ignoreMarkBit'] = $ignoreMarkBit;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $microsoftTeamsSbc && $self['microsoftTeamsSbc'] = $microsoftTeamsSbc;
        null !== $noiseSuppression && $self['noiseSuppression'] = $noiseSuppression;
        null !== $onnetT38PassthroughEnabled && $self['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $password && $self['password'] = $password;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $rtcpSettings && $self['rtcpSettings'] = $rtcpSettings;
        null !== $rtpPassCodecsOnStreamChange && $self['rtpPassCodecsOnStreamChange'] = $rtpPassCodecsOnStreamChange;
        null !== $sendNormalizedTimestamps && $self['sendNormalizedTimestamps'] = $sendNormalizedTimestamps;
        null !== $tags && $self['tags'] = $tags;
        null !== $thirdPartyControlEnabled && $self['thirdPartyControlEnabled'] = $thirdPartyControlEnabled;
        null !== $transportProtocol && $self['transportProtocol'] = $transportProtocol;
        null !== $txtName && $self['txtName'] = $txtName;
        null !== $txtTtl && $self['txtTtl'] = $txtTtl;
        null !== $txtValue && $self['txtValue'] = $txtValue;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userName && $self['userName'] = $userName;
        null !== $webhookAPIVersion && $self['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * A user-assigned name to help manage the connection.
     */
    public function withConnectionName(string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Defaults to true.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * Indicates whether DTMF timestamp adjustment is enabled.
     */
    public function withAdjustDtmfTimestamp(bool $adjustDtmfTimestamp): self
    {
        $self = clone $this;
        $self['adjustDtmfTimestamp'] = $adjustDtmfTimestamp;

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
     * Indicates whether call cost calculation is enabled.
     */
    public function withCallCostEnabled(bool $callCostEnabled): self
    {
        $self = clone $this;
        $self['callCostEnabled'] = $callCostEnabled;

        return $self;
    }

    /**
     * Specifies if call cost webhooks should be sent for this connection.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $self = clone $this;
        $self['callCostInWebhooks'] = $callCostInWebhooks;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    public function withDefaultOnHoldComfortNoiseEnabled(
        bool $defaultOnHoldComfortNoiseEnabled
    ): self {
        $self = clone $this;
        $self['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;

        return $self;
    }

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @param DtmfType|value-of<DtmfType> $dtmfType
     */
    public function withDtmfType(DtmfType|string $dtmfType): self
    {
        $self = clone $this;
        $self['dtmfType'] = $dtmfType;

        return $self;
    }

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    public function withEncodeContactHeaderEnabled(
        bool $encodeContactHeaderEnabled
    ): self {
        $self = clone $this;
        $self['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;

        return $self;
    }

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     */
    public function withEncryptedMedia(
        EncryptedMedia|string|null $encryptedMedia
    ): self {
        $self = clone $this;
        $self['encryptedMedia'] = $encryptedMedia;

        return $self;
    }

    /**
     * Indicates whether DTMF duration should be ignored.
     */
    public function withIgnoreDtmfDuration(bool $ignoreDtmfDuration): self
    {
        $self = clone $this;
        $self['ignoreDtmfDuration'] = $ignoreDtmfDuration;

        return $self;
    }

    /**
     * Indicates whether the mark bit should be ignored.
     */
    public function withIgnoreMarkBit(bool $ignoreMarkBit): self
    {
        $self = clone $this;
        $self['ignoreMarkBit'] = $ignoreMarkBit;

        return $self;
    }

    /**
     * @param InboundFqdn|array{
     *   aniNumberFormat?: value-of<AniNumberFormat>|null,
     *   channelLimit?: int|null,
     *   codecs?: list<string>|null,
     *   defaultPrimaryFqdnID?: string|null,
     *   defaultRoutingMethod?: value-of<DefaultRoutingMethod>|null,
     *   defaultSecondaryFqdnID?: string|null,
     *   defaultTertiaryFqdnID?: string|null,
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
    public function withInbound(InboundFqdn|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * The connection is enabled for Microsoft Teams Direct Routing.
     */
    public function withMicrosoftTeamsSbc(bool $microsoftTeamsSbc): self
    {
        $self = clone $this;
        $self['microsoftTeamsSbc'] = $microsoftTeamsSbc;

        return $self;
    }

    /**
     * Indicates whether noise suppression is enabled.
     */
    public function withNoiseSuppression(bool $noiseSuppression): self
    {
        $self = clone $this;
        $self['noiseSuppression'] = $noiseSuppression;

        return $self;
    }

    /**
     * Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $self = clone $this;
        $self['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;

        return $self;
    }

    /**
     * @param OutboundFqdn|array{
     *   aniOverride?: string|null,
     *   aniOverrideType?: value-of<AniOverrideType>|null,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int|null,
     *   encryptedMedia?: value-of<EncryptedMedia>|null,
     *   generateRingbackTone?: bool|null,
     *   instantRingbackEnabled?: bool|null,
     *   ipAuthenticationMethod?: value-of<IPAuthenticationMethod>|null,
     *   ipAuthenticationToken?: string|null,
     *   localization?: string|null,
     *   outboundVoiceProfileID?: string|null,
     *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
     *   techPrefix?: string|null,
     *   timeout1xxSecs?: int|null,
     *   timeout2xxSecs?: int|null,
     * } $outbound
     */
    public function withOutbound(OutboundFqdn|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * The password for the FQDN connection.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
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
        $self = clone $this;
        $self['rtcpSettings'] = $rtcpSettings;

        return $self;
    }

    /**
     * Defines if codecs should be passed on stream change.
     */
    public function withRtpPassCodecsOnStreamChange(
        bool $rtpPassCodecsOnStreamChange
    ): self {
        $self = clone $this;
        $self['rtpPassCodecsOnStreamChange'] = $rtpPassCodecsOnStreamChange;

        return $self;
    }

    /**
     * Indicates whether normalized timestamps should be sent.
     */
    public function withSendNormalizedTimestamps(
        bool $sendNormalizedTimestamps
    ): self {
        $self = clone $this;
        $self['sendNormalizedTimestamps'] = $sendNormalizedTimestamps;

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
     * Indicates whether third-party control is enabled.
     */
    public function withThirdPartyControlEnabled(
        bool $thirdPartyControlEnabled
    ): self {
        $self = clone $this;
        $self['thirdPartyControlEnabled'] = $thirdPartyControlEnabled;

        return $self;
    }

    /**
     * One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     *
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol
     */
    public function withTransportProtocol(
        TransportProtocol|string $transportProtocol
    ): self {
        $self = clone $this;
        $self['transportProtocol'] = $transportProtocol;

        return $self;
    }

    /**
     * The name for the TXT record associated with the FQDN connection.
     */
    public function withTxtName(string $txtName): self
    {
        $self = clone $this;
        $self['txtName'] = $txtName;

        return $self;
    }

    /**
     * The time to live for the TXT record associated with the FQDN connection.
     */
    public function withTxtTtl(int $txtTtl): self
    {
        $self = clone $this;
        $self['txtTtl'] = $txtTtl;

        return $self;
    }

    /**
     * The value for the TXT record associated with the FQDN connection.
     */
    public function withTxtValue(string $txtValue): self
    {
        $self = clone $this;
        $self['txtValue'] = $txtValue;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The username for the FQDN connection.
     */
    public function withUserName(string $userName): self
    {
        $self = clone $this;
        $self['userName'] = $userName;

        return $self;
    }

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public function withWebhookAPIVersion(
        WebhookAPIVersion|string $webhookAPIVersion
    ): self {
        $self = clone $this;
        $self['webhookAPIVersion'] = $webhookAPIVersion;

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
