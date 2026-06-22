<?php

declare(strict_types=1);

namespace Telnyx\UacConnections;

use Telnyx\ConnectionJitterBuffer;
use Telnyx\ConnectionNoiseSuppressionDetails;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionNoiseSuppression;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\Fqdns\Fqdn;
use Telnyx\UacConnections\UacConnection\Authentication;
use Telnyx\UacConnections\UacConnection\FqdnOutboundAuthentication;
use Telnyx\UacConnections\UacConnection\SipUriCallingPreference;
use Telnyx\UacConnections\UacConnection\WebhookAPIVersion;

/**
 * A UAC (User Agent Client) Connection registers Telnyx to your PBX — the opposite of a standard SIP trunk, where the PBX registers to Telnyx. Use UAC when your PBX doesn’t support outbound SIP registration or you need Telnyx to maintain the registration.
 *
 * @phpstan-import-type UacExternalSettingsShape from \Telnyx\UacConnections\UacExternalSettings
 * @phpstan-import-type FqdnShape from \Telnyx\Fqdns\Fqdn
 * @phpstan-import-type UacInboundShape from \Telnyx\UacConnections\UacInbound
 * @phpstan-import-type UacInternalSettingsShape from \Telnyx\UacConnections\UacInternalSettings
 * @phpstan-import-type ConnectionJitterBufferShape from \Telnyx\ConnectionJitterBuffer
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type UacOutboundShape from \Telnyx\UacConnections\UacOutbound
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 *
 * @phpstan-type UacConnectionShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsiteOverride?: null|AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   androidPushCredentialID?: string|null,
 *   authentication?: null|Authentication|value-of<Authentication>,
 *   callCostInWebhooks?: bool|null,
 *   connectionName?: string|null,
 *   createdAt?: string|null,
 *   defaultOnHoldComfortNoiseEnabled?: bool|null,
 *   dtmfType?: null|DtmfType|value-of<DtmfType>,
 *   encodeContactHeaderEnabled?: bool|null,
 *   encryptedMedia?: null|EncryptedMedia|value-of<EncryptedMedia>,
 *   externalUacSettings?: null|UacExternalSettings|UacExternalSettingsShape,
 *   fqdn?: string|null,
 *   fqdnOutboundAuthentication?: null|FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication>,
 *   fqdns?: list<Fqdn|FqdnShape>|null,
 *   inbound?: null|UacInbound|UacInboundShape,
 *   internalUacSettings?: null|UacInternalSettings|UacInternalSettingsShape,
 *   iosPushCredentialID?: string|null,
 *   jitterBuffer?: null|ConnectionJitterBuffer|ConnectionJitterBufferShape,
 *   noiseSuppression?: null|ConnectionNoiseSuppression|value-of<ConnectionNoiseSuppression>,
 *   noiseSuppressionDetails?: null|ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape,
 *   onnetT38PassthroughEnabled?: bool|null,
 *   outbound?: null|UacOutbound|UacOutboundShape,
 *   password?: string|null,
 *   recordType?: string|null,
 *   registrationStatus?: string|null,
 *   registrationStatusUpdatedAt?: string|null,
 *   rtcpSettings?: null|ConnectionRtcpSettings|ConnectionRtcpSettingsShape,
 *   sipUriCallingPreference?: null|SipUriCallingPreference|value-of<SipUriCallingPreference>,
 *   tags?: list<string>|null,
 *   updatedAt?: string|null,
 *   userName?: string|null,
 *   webhookAPIVersion?: null|WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class UacConnection implements BaseModel
{
    /** @use SdkModel<UacConnectionShape> */
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
     * The authentication strategy used by this connection.
     *
     * @var value-of<Authentication>|null $authentication
     */
    #[Optional(enum: Authentication::class)]
    public ?string $authentication;

    /**
     * Specifies if call cost webhooks should be sent for this connection.
     */
    #[Optional('call_cost_in_webhooks')]
    public ?bool $callCostInWebhooks;

    #[Optional('connection_name')]
    public ?string $connectionName;

    /**
     * ISO-8601 formatted date indicating when the resource was created.
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
     * External SIP peer settings used by Telnyx when registering to your PBX and routing outbound calls.
     */
    #[Optional('external_uac_settings')]
    public ?UacExternalSettings $externalUacSettings;

    /**
     * The Telnyx-managed FQDN generated for the UAC connection.
     */
    #[Optional]
    public ?string $fqdn;

    /**
     * The fixed outbound authentication mode used by UAC FQDN records.
     *
     * @var value-of<FqdnOutboundAuthentication>|null $fqdnOutboundAuthentication
     */
    #[Optional(
        'fqdn_outbound_authentication',
        enum: FqdnOutboundAuthentication::class
    )]
    public ?string $fqdnOutboundAuthentication;

    /**
     * FQDN records managed automatically by the UAC connection lifecycle.
     *
     * @var list<Fqdn>|null $fqdns
     */
    #[Optional(list: Fqdn::class)]
    public ?array $fqdns;

    #[Optional]
    public ?UacInbound $inbound;

    /**
     * Internal Telnyx-side settings for a UAC connection.
     */
    #[Optional('internal_uac_settings')]
    public ?UacInternalSettings $internalUacSettings;

    /**
     * The uuid of the push credential for Ios.
     */
    #[Optional('ios_push_credential_id', nullable: true)]
    public ?string $iosPushCredentialID;

    /**
     * Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     */
    #[Optional('jitter_buffer')]
    public ?ConnectionJitterBuffer $jitterBuffer;

    /**
     * Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     *
     * @var value-of<ConnectionNoiseSuppression>|null $noiseSuppression
     */
    #[Optional('noise_suppression', enum: ConnectionNoiseSuppression::class)]
    public ?string $noiseSuppression;

    /**
     * Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     */
    #[Optional('noise_suppression_details')]
    public ?ConnectionNoiseSuppressionDetails $noiseSuppressionDetails;

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    #[Optional('onnet_t38_passthrough_enabled')]
    public ?bool $onnetT38PassthroughEnabled;

    #[Optional]
    public ?UacOutbound $outbound;

    /**
     * The password to be used as part of the credentials. Must be 8 to 128 characters long.
     */
    #[Optional]
    public ?string $password;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The most recently known SIP registration status for this UAC connection.
     */
    #[Optional('registration_status', nullable: true)]
    public ?string $registrationStatus;

    /**
     * ISO 8601 formatted date indicating when the registration status was last updated.
     */
    #[Optional('registration_status_updated_at', nullable: true)]
    public ?string $registrationStatusUpdatedAt;

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
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters). At least one of the first 5 characters must be a letter.
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride>|null $anchorsiteOverride
     * @param Authentication|value-of<Authentication>|null $authentication
     * @param DtmfType|value-of<DtmfType>|null $dtmfType
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     * @param UacExternalSettings|UacExternalSettingsShape|null $externalUacSettings
     * @param FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication>|null $fqdnOutboundAuthentication
     * @param list<Fqdn|FqdnShape>|null $fqdns
     * @param UacInbound|UacInboundShape|null $inbound
     * @param UacInternalSettings|UacInternalSettingsShape|null $internalUacSettings
     * @param ConnectionJitterBuffer|ConnectionJitterBufferShape|null $jitterBuffer
     * @param ConnectionNoiseSuppression|value-of<ConnectionNoiseSuppression>|null $noiseSuppression
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape|null $noiseSuppressionDetails
     * @param UacOutbound|UacOutboundShape|null $outbound
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape|null $rtcpSettings
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference>|null $sipUriCallingPreference
     * @param list<string>|null $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion>|null $webhookAPIVersion
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $androidPushCredentialID = null,
        Authentication|string|null $authentication = null,
        ?bool $callCostInWebhooks = null,
        ?string $connectionName = null,
        ?string $createdAt = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        UacExternalSettings|array|null $externalUacSettings = null,
        ?string $fqdn = null,
        FqdnOutboundAuthentication|string|null $fqdnOutboundAuthentication = null,
        ?array $fqdns = null,
        UacInbound|array|null $inbound = null,
        UacInternalSettings|array|null $internalUacSettings = null,
        ?string $iosPushCredentialID = null,
        ConnectionJitterBuffer|array|null $jitterBuffer = null,
        ConnectionNoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        ?bool $onnetT38PassthroughEnabled = null,
        UacOutbound|array|null $outbound = null,
        ?string $password = null,
        ?string $recordType = null,
        ?string $registrationStatus = null,
        ?string $registrationStatusUpdatedAt = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        SipUriCallingPreference|string|null $sipUriCallingPreference = null,
        ?array $tags = null,
        ?string $updatedAt = null,
        ?string $userName = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $anchorsiteOverride && $self['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $androidPushCredentialID && $self['androidPushCredentialID'] = $androidPushCredentialID;
        null !== $authentication && $self['authentication'] = $authentication;
        null !== $callCostInWebhooks && $self['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $defaultOnHoldComfortNoiseEnabled && $self['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $self['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $self['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $self['encryptedMedia'] = $encryptedMedia;
        null !== $externalUacSettings && $self['externalUacSettings'] = $externalUacSettings;
        null !== $fqdn && $self['fqdn'] = $fqdn;
        null !== $fqdnOutboundAuthentication && $self['fqdnOutboundAuthentication'] = $fqdnOutboundAuthentication;
        null !== $fqdns && $self['fqdns'] = $fqdns;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $internalUacSettings && $self['internalUacSettings'] = $internalUacSettings;
        null !== $iosPushCredentialID && $self['iosPushCredentialID'] = $iosPushCredentialID;
        null !== $jitterBuffer && $self['jitterBuffer'] = $jitterBuffer;
        null !== $noiseSuppression && $self['noiseSuppression'] = $noiseSuppression;
        null !== $noiseSuppressionDetails && $self['noiseSuppressionDetails'] = $noiseSuppressionDetails;
        null !== $onnetT38PassthroughEnabled && $self['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $password && $self['password'] = $password;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $registrationStatus && $self['registrationStatus'] = $registrationStatus;
        null !== $registrationStatusUpdatedAt && $self['registrationStatusUpdatedAt'] = $registrationStatusUpdatedAt;
        null !== $rtcpSettings && $self['rtcpSettings'] = $rtcpSettings;
        null !== $sipUriCallingPreference && $self['sipUriCallingPreference'] = $sipUriCallingPreference;
        null !== $tags && $self['tags'] = $tags;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userName && $self['userName'] = $userName;
        null !== $webhookAPIVersion && $self['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

    /**
     * Identifies the type of resource.
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
     * The authentication strategy used by this connection.
     *
     * @param Authentication|value-of<Authentication> $authentication
     */
    public function withAuthentication(
        Authentication|string $authentication
    ): self {
        $self = clone $this;
        $self['authentication'] = $authentication;

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

    public function withConnectionName(string $connectionName): self
    {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was created.
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
     * External SIP peer settings used by Telnyx when registering to your PBX and routing outbound calls.
     *
     * @param UacExternalSettings|UacExternalSettingsShape $externalUacSettings
     */
    public function withExternalUacSettings(
        UacExternalSettings|array $externalUacSettings
    ): self {
        $self = clone $this;
        $self['externalUacSettings'] = $externalUacSettings;

        return $self;
    }

    /**
     * The Telnyx-managed FQDN generated for the UAC connection.
     */
    public function withFqdn(string $fqdn): self
    {
        $self = clone $this;
        $self['fqdn'] = $fqdn;

        return $self;
    }

    /**
     * The fixed outbound authentication mode used by UAC FQDN records.
     *
     * @param FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication> $fqdnOutboundAuthentication
     */
    public function withFqdnOutboundAuthentication(
        FqdnOutboundAuthentication|string $fqdnOutboundAuthentication
    ): self {
        $self = clone $this;
        $self['fqdnOutboundAuthentication'] = $fqdnOutboundAuthentication;

        return $self;
    }

    /**
     * FQDN records managed automatically by the UAC connection lifecycle.
     *
     * @param list<Fqdn|FqdnShape> $fqdns
     */
    public function withFqdns(array $fqdns): self
    {
        $self = clone $this;
        $self['fqdns'] = $fqdns;

        return $self;
    }

    /**
     * @param UacInbound|UacInboundShape $inbound
     */
    public function withInbound(UacInbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * Internal Telnyx-side settings for a UAC connection.
     *
     * @param UacInternalSettings|UacInternalSettingsShape $internalUacSettings
     */
    public function withInternalUacSettings(
        UacInternalSettings|array $internalUacSettings
    ): self {
        $self = clone $this;
        $self['internalUacSettings'] = $internalUacSettings;

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
     * Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     *
     * @param ConnectionJitterBuffer|ConnectionJitterBufferShape $jitterBuffer
     */
    public function withJitterBuffer(
        ConnectionJitterBuffer|array $jitterBuffer
    ): self {
        $self = clone $this;
        $self['jitterBuffer'] = $jitterBuffer;

        return $self;
    }

    /**
     * Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     *
     * @param ConnectionNoiseSuppression|value-of<ConnectionNoiseSuppression> $noiseSuppression
     */
    public function withNoiseSuppression(
        ConnectionNoiseSuppression|string $noiseSuppression
    ): self {
        $self = clone $this;
        $self['noiseSuppression'] = $noiseSuppression;

        return $self;
    }

    /**
     * Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     *
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails
     */
    public function withNoiseSuppressionDetails(
        ConnectionNoiseSuppressionDetails|array $noiseSuppressionDetails
    ): self {
        $self = clone $this;
        $self['noiseSuppressionDetails'] = $noiseSuppressionDetails;

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
     * @param UacOutbound|UacOutboundShape $outbound
     */
    public function withOutbound(UacOutbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

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
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The most recently known SIP registration status for this UAC connection.
     */
    public function withRegistrationStatus(?string $registrationStatus): self
    {
        $self = clone $this;
        $self['registrationStatus'] = $registrationStatus;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the registration status was last updated.
     */
    public function withRegistrationStatusUpdatedAt(
        ?string $registrationStatusUpdatedAt
    ): self {
        $self = clone $this;
        $self['registrationStatusUpdatedAt'] = $registrationStatusUpdatedAt;

        return $self;
    }

    /**
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape $rtcpSettings
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
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters). At least one of the first 5 characters must be a letter.
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
