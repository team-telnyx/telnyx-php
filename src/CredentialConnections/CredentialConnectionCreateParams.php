<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\WebhookAPIVersion;
use Telnyx\CredentialConnections\CredentialInbound\AniNumberFormat;
use Telnyx\CredentialConnections\CredentialInbound\DnisNumberFormat;
use Telnyx\CredentialConnections\CredentialOutbound\AniOverrideType;
use Telnyx\CredentialConnections\CredentialOutbound\T38ReinviteSource;

/**
 * Creates a credential connection.
 *
 * @see Telnyx\Services\CredentialConnectionsService::create()
 *
 * @phpstan-type CredentialConnectionCreateParamsShape = array{
 *   connectionName: string,
 *   password: string,
 *   userName: string,
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   androidPushCredentialID?: string|null,
 *   callCostInWebhooks?: bool,
 *   defaultOnHoldComfortNoiseEnabled?: bool,
 *   dtmfType?: DtmfType|value-of<DtmfType>,
 *   encodeContactHeaderEnabled?: bool,
 *   encryptedMedia?: null|EncryptedMedia|value-of<EncryptedMedia>,
 *   inbound?: CredentialInbound|array{
 *     aniNumberFormat?: value-of<AniNumberFormat>|null,
 *     channelLimit?: int|null,
 *     codecs?: list<string>|null,
 *     dnisNumberFormat?: value-of<DnisNumberFormat>|null,
 *     generateRingbackTone?: bool|null,
 *     isupHeadersEnabled?: bool|null,
 *     prackEnabled?: bool|null,
 *     shakenStirEnabled?: bool|null,
 *     sipCompactHeadersEnabled?: bool|null,
 *     timeout1xxSecs?: int|null,
 *     timeout2xxSecs?: int|null,
 *   },
 *   iosPushCredentialID?: string|null,
 *   onnetT38PassthroughEnabled?: bool,
 *   outbound?: CredentialOutbound|array{
 *     aniOverride?: string|null,
 *     aniOverrideType?: value-of<AniOverrideType>|null,
 *     callParkingEnabled?: bool|null,
 *     channelLimit?: int|null,
 *     generateRingbackTone?: bool|null,
 *     instantRingbackEnabled?: bool|null,
 *     localization?: string|null,
 *     outboundVoiceProfileID?: string|null,
 *     t38ReinviteSource?: value-of<T38ReinviteSource>|null,
 *   },
 *   rtcpSettings?: ConnectionRtcpSettings|array{
 *     captureEnabled?: bool|null,
 *     port?: value-of<Port>|null,
 *     reportFrequencySecs?: int|null,
 *   },
 *   sipUriCallingPreference?: SipUriCallingPreference|value-of<SipUriCallingPreference>,
 *   tags?: list<string>,
 *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class CredentialConnectionCreateParams implements BaseModel
{
    /** @use SdkModel<CredentialConnectionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the connection.
     */
    #[Required('connection_name')]
    public string $connectionName;

    /**
     * The password to be used as part of the credentials. Must be 8 to 128 characters long.
     */
    #[Required]
    public string $password;

    /**
     * The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
     */
    #[Required('user_name')]
    public string $userName;

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
    public ?CredentialInbound $inbound;

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
    public ?CredentialOutbound $outbound;

    #[Optional('rtcp_settings')]
    public ?ConnectionRtcpSettings $rtcpSettings;

    /**
     * This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     *
     * @var value-of<SipUriCallingPreference>|null $sipUriCallingPreference
     */
    #[Optional(
        'sip_uri_calling_preference',
        enum: SipUriCallingPreference::class
    )]
    public ?string $sipUriCallingPreference;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Determines which webhook format will be used, Telnyx API v1, v2 or texml. Note - texml can only be set when the outbound object parameter call_parking_enabled is included and set to true.
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
     * `new CredentialConnectionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CredentialConnectionCreateParams::with(
     *   connectionName: ..., password: ..., userName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CredentialConnectionCreateParams)
     *   ->withConnectionName(...)
     *   ->withPassword(...)
     *   ->withUserName(...)
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
     * @param CredentialInbound|array{
     *   aniNumberFormat?: value-of<AniNumberFormat>|null,
     *   channelLimit?: int|null,
     *   codecs?: list<string>|null,
     *   dnisNumberFormat?: value-of<DnisNumberFormat>|null,
     *   generateRingbackTone?: bool|null,
     *   isupHeadersEnabled?: bool|null,
     *   prackEnabled?: bool|null,
     *   shakenStirEnabled?: bool|null,
     *   sipCompactHeadersEnabled?: bool|null,
     *   timeout1xxSecs?: int|null,
     *   timeout2xxSecs?: int|null,
     * } $inbound
     * @param CredentialOutbound|array{
     *   aniOverride?: string|null,
     *   aniOverrideType?: value-of<AniOverrideType>|null,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int|null,
     *   generateRingbackTone?: bool|null,
     *   instantRingbackEnabled?: bool|null,
     *   localization?: string|null,
     *   outboundVoiceProfileID?: string|null,
     *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
     * } $outbound
     * @param ConnectionRtcpSettings|array{
     *   captureEnabled?: bool|null,
     *   port?: value-of<Port>|null,
     *   reportFrequencySecs?: int|null,
     * } $rtcpSettings
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference> $sipUriCallingPreference
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        string $connectionName,
        string $password,
        string $userName,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $androidPushCredentialID = null,
        ?bool $callCostInWebhooks = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        CredentialInbound|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        ?bool $onnetT38PassthroughEnabled = null,
        CredentialOutbound|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        SipUriCallingPreference|string|null $sipUriCallingPreference = null,
        ?array $tags = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $self = new self;

        $self['connectionName'] = $connectionName;
        $self['password'] = $password;
        $self['userName'] = $userName;

        null !== $active && $self['active'] = $active;
        null !== $anchorsiteOverride && $self['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $androidPushCredentialID && $self['androidPushCredentialID'] = $androidPushCredentialID;
        null !== $callCostInWebhooks && $self['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $defaultOnHoldComfortNoiseEnabled && $self['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $self['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $self['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $self['encryptedMedia'] = $encryptedMedia;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $iosPushCredentialID && $self['iosPushCredentialID'] = $iosPushCredentialID;
        null !== $onnetT38PassthroughEnabled && $self['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $rtcpSettings && $self['rtcpSettings'] = $rtcpSettings;
        null !== $sipUriCallingPreference && $self['sipUriCallingPreference'] = $sipUriCallingPreference;
        null !== $tags && $self['tags'] = $tags;
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
     * The password to be used as part of the credentials. Must be 8 to 128 characters long.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
     */
    public function withUserName(string $userName): self
    {
        $self = clone $this;
        $self['userName'] = $userName;

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
     * The uuid of the push credential for Android.
     */
    public function withAndroidPushCredentialID(
        ?string $androidPushCredentialID
    ): self {
        $self = clone $this;
        $self['androidPushCredentialID'] = $androidPushCredentialID;

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
     * @param CredentialInbound|array{
     *   aniNumberFormat?: value-of<AniNumberFormat>|null,
     *   channelLimit?: int|null,
     *   codecs?: list<string>|null,
     *   dnisNumberFormat?: value-of<DnisNumberFormat>|null,
     *   generateRingbackTone?: bool|null,
     *   isupHeadersEnabled?: bool|null,
     *   prackEnabled?: bool|null,
     *   shakenStirEnabled?: bool|null,
     *   sipCompactHeadersEnabled?: bool|null,
     *   timeout1xxSecs?: int|null,
     *   timeout2xxSecs?: int|null,
     * } $inbound
     */
    public function withInbound(CredentialInbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * The uuid of the push credential for Ios.
     */
    public function withIosPushCredentialID(?string $iosPushCredentialID): self
    {
        $self = clone $this;
        $self['iosPushCredentialID'] = $iosPushCredentialID;

        return $self;
    }

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    public function withOnnetT38PassthroughEnabled(
        bool $onnetT38PassthroughEnabled
    ): self {
        $self = clone $this;
        $self['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;

        return $self;
    }

    /**
     * @param CredentialOutbound|array{
     *   aniOverride?: string|null,
     *   aniOverrideType?: value-of<AniOverrideType>|null,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int|null,
     *   generateRingbackTone?: bool|null,
     *   instantRingbackEnabled?: bool|null,
     *   localization?: string|null,
     *   outboundVoiceProfileID?: string|null,
     *   t38ReinviteSource?: value-of<T38ReinviteSource>|null,
     * } $outbound
     */
    public function withOutbound(CredentialOutbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

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
     * This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     *
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference> $sipUriCallingPreference
     */
    public function withSipUriCallingPreference(
        SipUriCallingPreference|string $sipUriCallingPreference
    ): self {
        $self = clone $this;
        $self['sipUriCallingPreference'] = $sipUriCallingPreference;

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
     * Determines which webhook format will be used, Telnyx API v1, v2 or texml. Note - texml can only be set when the outbound object parameter call_parking_enabled is included and set to true.
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
