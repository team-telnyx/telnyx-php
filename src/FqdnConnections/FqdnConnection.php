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
        $obj = new self;

        $obj['connectionName'] = $connectionName;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $adjustDtmfTimestamp && $obj['adjustDtmfTimestamp'] = $adjustDtmfTimestamp;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $callCostEnabled && $obj['callCostEnabled'] = $callCostEnabled;
        null !== $callCostInWebhooks && $obj['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $defaultOnHoldComfortNoiseEnabled && $obj['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $obj['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $obj['encryptedMedia'] = $encryptedMedia;
        null !== $ignoreDtmfDuration && $obj['ignoreDtmfDuration'] = $ignoreDtmfDuration;
        null !== $ignoreMarkBit && $obj['ignoreMarkBit'] = $ignoreMarkBit;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $microsoftTeamsSbc && $obj['microsoftTeamsSbc'] = $microsoftTeamsSbc;
        null !== $noiseSuppression && $obj['noiseSuppression'] = $noiseSuppression;
        null !== $onnetT38PassthroughEnabled && $obj['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $password && $obj['password'] = $password;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $rtcpSettings && $obj['rtcpSettings'] = $rtcpSettings;
        null !== $rtpPassCodecsOnStreamChange && $obj['rtpPassCodecsOnStreamChange'] = $rtpPassCodecsOnStreamChange;
        null !== $sendNormalizedTimestamps && $obj['sendNormalizedTimestamps'] = $sendNormalizedTimestamps;
        null !== $tags && $obj['tags'] = $tags;
        null !== $thirdPartyControlEnabled && $obj['thirdPartyControlEnabled'] = $thirdPartyControlEnabled;
        null !== $transportProtocol && $obj['transportProtocol'] = $transportProtocol;
        null !== $txtName && $obj['txtName'] = $txtName;
        null !== $txtTtl && $obj['txtTtl'] = $txtTtl;
        null !== $txtValue && $obj['txtValue'] = $txtValue;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $userName && $obj['userName'] = $userName;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the connection.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connectionName'] = $connectionName;

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
        $obj['adjustDtmfTimestamp'] = $adjustDtmfTimestamp;

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
     * Indicates whether call cost calculation is enabled.
     */
    public function withCallCostEnabled(bool $callCostEnabled): self
    {
        $obj = clone $this;
        $obj['callCostEnabled'] = $callCostEnabled;

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

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
     * Indicates whether DTMF duration should be ignored.
     */
    public function withIgnoreDtmfDuration(bool $ignoreDtmfDuration): self
    {
        $obj = clone $this;
        $obj['ignoreDtmfDuration'] = $ignoreDtmfDuration;

        return $obj;
    }

    /**
     * Indicates whether the mark bit should be ignored.
     */
    public function withIgnoreMarkBit(bool $ignoreMarkBit): self
    {
        $obj = clone $this;
        $obj['ignoreMarkBit'] = $ignoreMarkBit;

        return $obj;
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
        $obj['microsoftTeamsSbc'] = $microsoftTeamsSbc;

        return $obj;
    }

    /**
     * Indicates whether noise suppression is enabled.
     */
    public function withNoiseSuppression(bool $noiseSuppression): self
    {
        $obj = clone $this;
        $obj['noiseSuppression'] = $noiseSuppression;

        return $obj;
    }

    /**
     * Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $obj = clone $this;
        $obj['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;

        return $obj;
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
        $obj['recordType'] = $recordType;

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
     * Defines if codecs should be passed on stream change.
     */
    public function withRtpPassCodecsOnStreamChange(
        bool $rtpPassCodecsOnStreamChange
    ): self {
        $obj = clone $this;
        $obj['rtpPassCodecsOnStreamChange'] = $rtpPassCodecsOnStreamChange;

        return $obj;
    }

    /**
     * Indicates whether normalized timestamps should be sent.
     */
    public function withSendNormalizedTimestamps(
        bool $sendNormalizedTimestamps
    ): self {
        $obj = clone $this;
        $obj['sendNormalizedTimestamps'] = $sendNormalizedTimestamps;

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
        $obj['thirdPartyControlEnabled'] = $thirdPartyControlEnabled;

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
     * The name for the TXT record associated with the FQDN connection.
     */
    public function withTxtName(string $txtName): self
    {
        $obj = clone $this;
        $obj['txtName'] = $txtName;

        return $obj;
    }

    /**
     * The time to live for the TXT record associated with the FQDN connection.
     */
    public function withTxtTtl(int $txtTtl): self
    {
        $obj = clone $this;
        $obj['txtTtl'] = $txtTtl;

        return $obj;
    }

    /**
     * The value for the TXT record associated with the FQDN connection.
     */
    public function withTxtValue(string $txtValue): self
    {
        $obj = clone $this;
        $obj['txtValue'] = $txtValue;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The username for the FQDN connection.
     */
    public function withUserName(string $userName): self
    {
        $obj = clone $this;
        $obj['userName'] = $userName;

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
