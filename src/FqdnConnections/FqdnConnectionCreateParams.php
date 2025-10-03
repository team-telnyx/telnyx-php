<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FqdnConnectionCreateParams); // set properties as needed
 * $client->fqdnConnections->create(...$params->toArray());
 * ```
 * Creates a FQDN connection.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->fqdnConnections->create(...$params->toArray());`
 *
 * @see Telnyx\FqdnConnections->create
 *
 * @phpstan-type fqdn_connection_create_params = array{
 *   connectionName: string,
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   androidPushCredentialID?: string|null,
 *   defaultOnHoldComfortNoiseEnabled?: bool,
 *   dtmfType?: DtmfType|value-of<DtmfType>,
 *   encodeContactHeaderEnabled?: bool,
 *   encryptedMedia?: null|EncryptedMedia|value-of<EncryptedMedia>,
 *   inbound?: InboundFqdn,
 *   iosPushCredentialID?: string|null,
 *   microsoftTeamsSbc?: bool,
 *   onnetT38PassthroughEnabled?: bool,
 *   outbound?: OutboundFqdn,
 *   rtcpSettings?: ConnectionRtcpSettings,
 *   tags?: list<string>,
 *   transportProtocol?: TransportProtocol|value-of<TransportProtocol>,
 *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class FqdnConnectionCreateParams implements BaseModel
{
    /** @use SdkModel<fqdn_connection_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the connection.
     */
    #[Api('connection_name')]
    public string $connectionName;

    /**
     * Defaults to true.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Api('anchorsite_override', enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsiteOverride;

    /**
     * The uuid of the push credential for Android.
     */
    #[Api('android_push_credential_id', nullable: true, optional: true)]
    public ?string $androidPushCredentialID;

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    #[Api('default_on_hold_comfort_noise_enabled', optional: true)]
    public ?bool $defaultOnHoldComfortNoiseEnabled;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmfType
     */
    #[Api('dtmf_type', enum: DtmfType::class, optional: true)]
    public ?string $dtmfType;

    /**
     * Encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios.
     */
    #[Api('encode_contact_header_enabled', optional: true)]
    public ?bool $encodeContactHeaderEnabled;

    /**
     * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     *
     * @var value-of<EncryptedMedia>|null $encryptedMedia
     */
    #[Api(
        'encrypted_media',
        enum: EncryptedMedia::class,
        nullable: true,
        optional: true,
    )]
    public ?string $encryptedMedia;

    #[Api(optional: true)]
    public ?InboundFqdn $inbound;

    /**
     * The uuid of the push credential for Ios.
     */
    #[Api('ios_push_credential_id', nullable: true, optional: true)]
    public ?string $iosPushCredentialID;

    /**
     * When enabled, the connection will be created for Microsoft Teams Direct Routing. A *.mstsbc.telnyx.tech FQDN will be created for the connection automatically.
     */
    #[Api('microsoft_teams_sbc', optional: true)]
    public ?bool $microsoftTeamsSbc;

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    #[Api('onnet_t38_passthrough_enabled', optional: true)]
    public ?bool $onnetT38PassthroughEnabled;

    #[Api(optional: true)]
    public ?OutboundFqdn $outbound;

    #[Api('rtcp_settings', optional: true)]
    public ?ConnectionRtcpSettings $rtcpSettings;

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
     * @var value-of<TransportProtocol>|null $transportProtocol
     */
    #[Api('transport_protocol', enum: TransportProtocol::class, optional: true)]
    public ?string $transportProtocol;

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhookAPIVersion
     */
    #[Api('webhook_api_version', enum: WebhookAPIVersion::class, optional: true)]
    public ?string $webhookAPIVersion;

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
     * `new FqdnConnectionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FqdnConnectionCreateParams::with(connectionName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FqdnConnectionCreateParams)->withConnectionName(...)
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
     * @param list<string> $tags
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        string $connectionName,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $androidPushCredentialID = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        ?InboundFqdn $inbound = null,
        ?string $iosPushCredentialID = null,
        ?bool $microsoftTeamsSbc = null,
        ?bool $onnetT38PassthroughEnabled = null,
        ?OutboundFqdn $outbound = null,
        ?ConnectionRtcpSettings $rtcpSettings = null,
        ?array $tags = null,
        TransportProtocol|string|null $transportProtocol = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        $obj->connectionName = $connectionName;

        null !== $active && $obj->active = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $androidPushCredentialID && $obj->androidPushCredentialID = $androidPushCredentialID;
        null !== $defaultOnHoldComfortNoiseEnabled && $obj->defaultOnHoldComfortNoiseEnabled = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $obj->encodeContactHeaderEnabled = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $obj['encryptedMedia'] = $encryptedMedia;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $iosPushCredentialID && $obj->iosPushCredentialID = $iosPushCredentialID;
        null !== $microsoftTeamsSbc && $obj->microsoftTeamsSbc = $microsoftTeamsSbc;
        null !== $onnetT38PassthroughEnabled && $obj->onnetT38PassthroughEnabled = $onnetT38PassthroughEnabled;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $rtcpSettings && $obj->rtcpSettings = $rtcpSettings;
        null !== $tags && $obj->tags = $tags;
        null !== $transportProtocol && $obj['transportProtocol'] = $transportProtocol;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj->webhookEventURL = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the connection.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj->connectionName = $connectionName;

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
        $obj->androidPushCredentialID = $androidPushCredentialID;

        return $obj;
    }

    /**
     * When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     */
    public function withDefaultOnHoldComfortNoiseEnabled(
        bool $defaultOnHoldComfortNoiseEnabled
    ): self {
        $obj = clone $this;
        $obj->defaultOnHoldComfortNoiseEnabled = $defaultOnHoldComfortNoiseEnabled;

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
        $obj->encodeContactHeaderEnabled = $encodeContactHeaderEnabled;

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

    public function withInbound(InboundFqdn $inbound): self
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
        $obj->iosPushCredentialID = $iosPushCredentialID;

        return $obj;
    }

    /**
     * When enabled, the connection will be created for Microsoft Teams Direct Routing. A *.mstsbc.telnyx.tech FQDN will be created for the connection automatically.
     */
    public function withMicrosoftTeamsSbc(bool $microsoftTeamsSbc): self
    {
        $obj = clone $this;
        $obj->microsoftTeamsSbc = $microsoftTeamsSbc;

        return $obj;
    }

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $obj = clone $this;
        $obj->onnetT38PassthroughEnabled = $onnetT38PassthroughEnabled;

        return $obj;
    }

    public function withOutbound(OutboundFqdn $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    public function withRtcpSettings(ConnectionRtcpSettings $rtcpSettings): self
    {
        $obj = clone $this;
        $obj->rtcpSettings = $rtcpSettings;

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
