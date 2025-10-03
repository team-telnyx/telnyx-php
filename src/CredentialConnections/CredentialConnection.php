<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnection\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnection\WebhookAPIVersion;

/**
 * @phpstan-type credential_connection = array{
 *   id?: string,
 *   active?: bool,
 *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
 *   connectionName?: string,
 *   createdAt?: string,
 *   defaultOnHoldComfortNoiseEnabled?: bool,
 *   dtmfType?: value-of<DtmfType>,
 *   encodeContactHeaderEnabled?: bool,
 *   encryptedMedia?: value-of<EncryptedMedia>|null,
 *   inbound?: CredentialInbound,
 *   onnetT38PassthroughEnabled?: bool,
 *   outbound?: CredentialOutbound,
 *   password?: string,
 *   recordType?: string,
 *   rtcpSettings?: ConnectionRtcpSettings,
 *   sipUriCallingPreference?: value-of<SipUriCallingPreference>,
 *   tags?: list<string>,
 *   updatedAt?: string,
 *   userName?: string,
 *   webhookAPIVersion?: value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class CredentialConnection implements BaseModel
{
    /** @use SdkModel<credential_connection> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

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

    #[Api('connection_name', optional: true)]
    public ?string $connectionName;

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

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
    public ?CredentialInbound $inbound;

    /**
     * Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     */
    #[Api('onnet_t38_passthrough_enabled', optional: true)]
    public ?bool $onnetT38PassthroughEnabled;

    #[Api(optional: true)]
    public ?CredentialOutbound $outbound;

    /**
     * The password to be used as part of the credentials. Must be 8 to 128 characters long.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('rtcp_settings', optional: true)]
    public ?ConnectionRtcpSettings $rtcpSettings;

    /**
     * This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     *
     * @var value-of<SipUriCallingPreference>|null $sipUriCallingPreference
     */
    #[Api(
        'sip_uri_calling_preference',
        enum: SipUriCallingPreference::class,
        optional: true,
    )]
    public ?string $sipUriCallingPreference;

    /**
     * Tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters). At least one of the first 5 characters must be a letter.
     */
    #[Api('user_name', optional: true)]
    public ?string $userName;

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
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference> $sipUriCallingPreference
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $connectionName = null,
        ?string $createdAt = null,
        ?bool $defaultOnHoldComfortNoiseEnabled = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $encodeContactHeaderEnabled = null,
        EncryptedMedia|string|null $encryptedMedia = null,
        ?CredentialInbound $inbound = null,
        ?bool $onnetT38PassthroughEnabled = null,
        ?CredentialOutbound $outbound = null,
        ?string $password = null,
        ?string $recordType = null,
        ?ConnectionRtcpSettings $rtcpSettings = null,
        SipUriCallingPreference|string|null $sipUriCallingPreference = null,
        ?array $tags = null,
        ?string $updatedAt = null,
        ?string $userName = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $connectionName && $obj->connectionName = $connectionName;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $defaultOnHoldComfortNoiseEnabled && $obj->defaultOnHoldComfortNoiseEnabled = $defaultOnHoldComfortNoiseEnabled;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $encodeContactHeaderEnabled && $obj->encodeContactHeaderEnabled = $encodeContactHeaderEnabled;
        null !== $encryptedMedia && $obj['encryptedMedia'] = $encryptedMedia;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $onnetT38PassthroughEnabled && $obj->onnetT38PassthroughEnabled = $onnetT38PassthroughEnabled;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $password && $obj->password = $password;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $rtcpSettings && $obj->rtcpSettings = $rtcpSettings;
        null !== $sipUriCallingPreference && $obj['sipUriCallingPreference'] = $sipUriCallingPreference;
        null !== $tags && $obj->tags = $tags;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userName && $obj->userName = $userName;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj->webhookEventURL = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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

    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj->connectionName = $connectionName;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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

    public function withInbound(CredentialInbound $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

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

    public function withOutbound(CredentialOutbound $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    /**
     * The password to be used as part of the credentials. Must be 8 to 128 characters long.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withRtcpSettings(ConnectionRtcpSettings $rtcpSettings): self
    {
        $obj = clone $this;
        $obj->rtcpSettings = $rtcpSettings;

        return $obj;
    }

    /**
     * This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     *
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference> $sipUriCallingPreference
     */
    public function withSipUriCallingPreference(
        SipUriCallingPreference|string $sipUriCallingPreference
    ): self {
        $obj = clone $this;
        $obj['sipUriCallingPreference'] = $sipUriCallingPreference;

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
     * ISO-8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters). At least one of the first 5 characters must be a letter.
     */
    public function withUserName(string $userName): self
    {
        $obj = clone $this;
        $obj->userName = $userName;

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
