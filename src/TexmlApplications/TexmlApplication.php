<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\TexmlApplications\TexmlApplication\Inbound;
use Telnyx\TexmlApplications\TexmlApplication\Inbound\SipSubdomainReceiveSettings;
use Telnyx\TexmlApplications\TexmlApplication\Outbound;
use Telnyx\TexmlApplications\TexmlApplication\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplication\VoiceMethod;

/**
 * @phpstan-type TexmlApplicationShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
 *   callCostInWebhooks?: bool|null,
 *   createdAt?: string|null,
 *   dtmfType?: value-of<DtmfType>|null,
 *   firstCommandTimeout?: bool|null,
 *   firstCommandTimeoutSecs?: int|null,
 *   friendlyName?: string|null,
 *   inbound?: Inbound|null,
 *   outbound?: Outbound|null,
 *   recordType?: string|null,
 *   statusCallback?: string|null,
 *   statusCallbackMethod?: value-of<StatusCallbackMethod>|null,
 *   tags?: list<string>|null,
 *   updatedAt?: string|null,
 *   voiceFallbackURL?: string|null,
 *   voiceMethod?: value-of<VoiceMethod>|null,
 *   voiceURL?: string|null,
 * }
 */
final class TexmlApplication implements BaseModel
{
    /** @use SdkModel<TexmlApplicationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Specifies whether the connection can be used.
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
     * Specifies if call cost webhooks should be sent for this TeXML Application.
     */
    #[Optional('call_cost_in_webhooks')]
    public ?bool $callCostInWebhooks;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmfType
     */
    #[Optional('dtmf_type', enum: DtmfType::class)]
    public ?string $dtmfType;

    /**
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    #[Optional('first_command_timeout')]
    public ?bool $firstCommandTimeout;

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    #[Optional('first_command_timeout_secs')]
    public ?int $firstCommandTimeoutSecs;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Optional('friendly_name')]
    public ?string $friendlyName;

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    #[Optional('status_callback')]
    public ?string $statusCallback;

    /**
     * HTTP request method Telnyx should use when requesting the status_callback URL.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Optional('status_callback_method', enum: StatusCallbackMethod::class)]
    public ?string $statusCallbackMethod;

    /**
     * Tags associated with the Texml Application.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    #[Optional('voice_fallback_url')]
    public ?string $voiceFallbackURL;

    /**
     * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @var value-of<VoiceMethod>|null $voiceMethod
     */
    #[Optional('voice_method', enum: VoiceMethod::class)]
    public ?string $voiceMethod;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    #[Optional('voice_url')]
    public ?string $voiceURL;

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
     * @param Inbound|array{
     *   channelLimit?: int|null,
     *   shakenStirEnabled?: bool|null,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     * @param Outbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     * @param list<string> $tags
     * @param VoiceMethod|value-of<VoiceMethod> $voiceMethod
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?bool $callCostInWebhooks = null,
        ?string $createdAt = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $firstCommandTimeout = null,
        ?int $firstCommandTimeoutSecs = null,
        ?string $friendlyName = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?string $recordType = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?array $tags = null,
        ?string $updatedAt = null,
        ?string $voiceFallbackURL = null,
        VoiceMethod|string|null $voiceMethod = null,
        ?string $voiceURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $anchorsiteOverride && $self['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $callCostInWebhooks && $self['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dtmfType && $self['dtmfType'] = $dtmfType;
        null !== $firstCommandTimeout && $self['firstCommandTimeout'] = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $self['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;
        null !== $friendlyName && $self['friendlyName'] = $friendlyName;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $statusCallback && $self['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $self['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $tags && $self['tags'] = $tags;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $voiceFallbackURL && $self['voiceFallbackURL'] = $voiceFallbackURL;
        null !== $voiceMethod && $self['voiceMethod'] = $voiceMethod;
        null !== $voiceURL && $self['voiceURL'] = $voiceURL;

        return $self;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies whether the connection can be used.
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
     * Specifies if call cost webhooks should be sent for this TeXML Application.
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
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    public function withFirstCommandTimeout(bool $firstCommandTimeout): self
    {
        $self = clone $this;
        $self['firstCommandTimeout'] = $firstCommandTimeout;

        return $self;
    }

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    public function withFirstCommandTimeoutSecs(
        int $firstCommandTimeoutSecs
    ): self {
        $self = clone $this;
        $self['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;

        return $self;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $self = clone $this;
        $self['friendlyName'] = $friendlyName;

        return $self;
    }

    /**
     * @param Inbound|array{
     *   channelLimit?: int|null,
     *   shakenStirEnabled?: bool|null,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     */
    public function withInbound(Inbound|array $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * @param Outbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $self = clone $this;
        $self['outbound'] = $outbound;

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
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $self = clone $this;
        $self['statusCallback'] = $statusCallback;

        return $self;
    }

    /**
     * HTTP request method Telnyx should use when requesting the status_callback URL.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $self = clone $this;
        $self['statusCallbackMethod'] = $statusCallbackMethod;

        return $self;
    }

    /**
     * Tags associated with the Texml Application.
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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    public function withVoiceFallbackURL(string $voiceFallbackURL): self
    {
        $self = clone $this;
        $self['voiceFallbackURL'] = $voiceFallbackURL;

        return $self;
    }

    /**
     * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @param VoiceMethod|value-of<VoiceMethod> $voiceMethod
     */
    public function withVoiceMethod(VoiceMethod|string $voiceMethod): self
    {
        $self = clone $this;
        $self['voiceMethod'] = $voiceMethod;

        return $self;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    public function withVoiceURL(string $voiceURL): self
    {
        $self = clone $this;
        $self['voiceURL'] = $voiceURL;

        return $self;
    }
}
