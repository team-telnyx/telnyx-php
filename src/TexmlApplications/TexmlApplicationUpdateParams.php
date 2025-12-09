<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod;

/**
 * Updates settings of an existing TeXML Application.
 *
 * @see Telnyx\Services\TexmlApplicationsService::update()
 *
 * @phpstan-type TexmlApplicationUpdateParamsShape = array{
 *   friendlyName: string,
 *   voiceURL: string,
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   callCostInWebhooks?: bool,
 *   dtmfType?: DtmfType|value-of<DtmfType>,
 *   firstCommandTimeout?: bool,
 *   firstCommandTimeoutSecs?: int,
 *   inbound?: Inbound|array{
 *     channelLimit?: int|null,
 *     shakenStirEnabled?: bool|null,
 *     sipSubdomain?: string|null,
 *     sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
 *   },
 *   outbound?: Outbound|array{
 *     channelLimit?: int|null, outboundVoiceProfileID?: string|null
 *   },
 *   statusCallback?: string,
 *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   tags?: list<string>,
 *   voiceFallbackURL?: string,
 *   voiceMethod?: VoiceMethod|value-of<VoiceMethod>,
 * }
 */
final class TexmlApplicationUpdateParams implements BaseModel
{
    /** @use SdkModel<TexmlApplicationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Required('friendly_name')]
    public string $friendlyName;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    #[Required('voice_url')]
    public string $voiceURL;

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

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

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
     * `new TexmlApplicationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TexmlApplicationUpdateParams::with(friendlyName: ..., voiceURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TexmlApplicationUpdateParams)->withFriendlyName(...)->withVoiceURL(...)
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
        string $friendlyName,
        string $voiceURL,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?bool $callCostInWebhooks = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $firstCommandTimeout = null,
        ?int $firstCommandTimeoutSecs = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?array $tags = null,
        ?string $voiceFallbackURL = null,
        VoiceMethod|string|null $voiceMethod = null,
    ): self {
        $obj = new self;

        $obj['friendlyName'] = $friendlyName;
        $obj['voiceURL'] = $voiceURL;

        null !== $active && $obj['active'] = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $callCostInWebhooks && $obj['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $firstCommandTimeout && $obj['firstCommandTimeout'] = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $obj['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $statusCallback && $obj['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $tags && $obj['tags'] = $tags;
        null !== $voiceFallbackURL && $obj['voiceFallbackURL'] = $voiceFallbackURL;
        null !== $voiceMethod && $obj['voiceMethod'] = $voiceMethod;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj['friendlyName'] = $friendlyName;

        return $obj;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    public function withVoiceURL(string $voiceURL): self
    {
        $obj = clone $this;
        $obj['voiceURL'] = $voiceURL;

        return $obj;
    }

    /**
     * Specifies whether the connection can be used.
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
     * Specifies if call cost webhooks should be sent for this TeXML Application.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $obj = clone $this;
        $obj['callCostInWebhooks'] = $callCostInWebhooks;

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
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    public function withFirstCommandTimeout(bool $firstCommandTimeout): self
    {
        $obj = clone $this;
        $obj['firstCommandTimeout'] = $firstCommandTimeout;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    public function withFirstCommandTimeoutSecs(
        int $firstCommandTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;

        return $obj;
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
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * @param Outbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     */
    public function withOutbound(Outbound|array $outbound): self
    {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['statusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * HTTP request method Telnyx should use when requesting the status_callback URL.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['statusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * Tags associated with the Texml Application.
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
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    public function withVoiceFallbackURL(string $voiceFallbackURL): self
    {
        $obj = clone $this;
        $obj['voiceFallbackURL'] = $voiceFallbackURL;

        return $obj;
    }

    /**
     * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @param VoiceMethod|value-of<VoiceMethod> $voiceMethod
     */
    public function withVoiceMethod(VoiceMethod|string $voiceMethod): self
    {
        $obj = clone $this;
        $obj['voiceMethod'] = $voiceMethod;

        return $obj;
    }
}
