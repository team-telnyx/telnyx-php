<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\ConnectionNoiseSuppressionDetails;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnection\NoiseSuppression;
use Telnyx\CredentialConnections\CredentialConnection\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnection\WebhookAPIVersion;

/**
 * @phpstan-import-type CredentialInboundShape from \Telnyx\CredentialConnections\CredentialInbound
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type CredentialOutboundShape from \Telnyx\CredentialConnections\CredentialOutbound
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 *
 * @phpstan-type CredentialConnectionShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsiteOverride?: null|AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   callCostInWebhooks?: bool|null,
 *   connectionName?: string|null,
 *   createdAt?: string|null,
 *   defaultOnHoldComfortNoiseEnabled?: bool|null,
 *   dtmfType?: null|DtmfType|value-of<DtmfType>,
 *   encodeContactHeaderEnabled?: bool|null,
 *   encryptedMedia?: null|EncryptedMedia|value-of<EncryptedMedia>,
 *   inbound?: null|CredentialInbound|CredentialInboundShape,
 *   noiseSuppression?: null|NoiseSuppression|value-of<NoiseSuppression>,
 *   noiseSuppressionDetails?: null|ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape,
 *   onnetT38PassthroughEnabled?: bool|null,
 *   outbound?: null|CredentialOutbound|CredentialOutboundShape,
 *   password?: string|null,
 *   recordType?: string|null,
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
final class CredentialConnection implements BaseModel
{
    /** @use SdkModel<CredentialConnectionShape> */
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

    #[Optional]
    public ?CredentialInbound $inbound;

    /**
     * Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     *
     * @var value-of<NoiseSuppression>|null $noiseSuppression
     */
    #[Optional('noise_suppression', enum: NoiseSuppression::class)]
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
    public ?CredentialOutbound $outbound;

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
     * @param DtmfType|value-of<DtmfType>|null $dtmfType
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia
     * @param CredentialInbound|CredentialInboundShape|null $inbound
     * @param NoiseSuppression|value-of<NoiseSuppression>|null $noiseSuppression
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape|null $noiseSuppressionDetails
     * @param CredentialOutbound|CredentialOutboundShape|null $outbound
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape|null $rtcpSettings
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference>|null $sipUriCallingPreference
     * @param list<string>|null $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion>|null $webhookAPIVersion
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?bool $callCostInWebhooks = null,
        ?string $connectionName = null,
        ?string $createdAt = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        CredentialInbound|array|null $inbound = null,
        NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        ?bool $onnetT38PassthroughEnabled = null,
        CredentialOutbound|array|null $outbound = null,
        ?string $password = null,
        ?string $recordType = null,
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
        null !== $callCostInWebhooks && $self['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $defaultOnHoldComfortNoiseEnabled && $self['defaultOnHoldComfortNoiseEnabled'] = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $self['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $self['encodeContactHeaderEnabled'] = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $self['encryptedMedia'] = $encryptedMedia;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $noiseSuppression && $self['noiseSuppression'] = $noiseSuppression;
        null !== $noiseSuppressionDetails && $self['noiseSuppressionDetails'] = $noiseSuppressionDetails;
        null !== $onnetT38PassthroughEnabled && $self['onnetT38PassthroughEnabled'] = $onnetT38PassthroughEnabled;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $password && $self['password'] = $password;
        null !== $recordType && $self['recordType'] = $recordType;
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
     * @param CredentialInbound|CredentialInboundShape $inbound
     */
    public function withInbound(CredentialInbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     *
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression
     */
    public function withNoiseSuppression(
        NoiseSuppression|string $noiseSuppression
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
     * @param CredentialOutbound|CredentialOutboundShape $outbound
     */
    public function withOutbound(CredentialOutbound|array $outbound): self
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
