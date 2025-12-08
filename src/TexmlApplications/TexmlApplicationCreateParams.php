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
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;

/**
 * Creates a TeXML Application.
 *
 * @see Telnyx\Services\TexmlApplicationsService::create()
 *
 * @phpstan-type TexmlApplicationCreateParamsShape = array{
 *   friendly_name: string,
 *   voice_url: string,
 *   active?: bool,
 *   anchorsite_override?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   call_cost_in_webhooks?: bool,
 *   dtmf_type?: DtmfType|value-of<DtmfType>,
 *   first_command_timeout?: bool,
 *   first_command_timeout_secs?: int,
 *   inbound?: Inbound|array{
 *     channel_limit?: int|null,
 *     shaken_stir_enabled?: bool|null,
 *     sip_subdomain?: string|null,
 *     sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
 *   },
 *   outbound?: Outbound|array{
 *     channel_limit?: int|null, outbound_voice_profile_id?: string|null
 *   },
 *   status_callback?: string,
 *   status_callback_method?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   tags?: list<string>,
 *   voice_fallback_url?: string,
 *   voice_method?: VoiceMethod|value-of<VoiceMethod>,
 * }
 */
final class TexmlApplicationCreateParams implements BaseModel
{
    /** @use SdkModel<TexmlApplicationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Required]
    public string $friendly_name;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    #[Required]
    public string $voice_url;

    /**
     * Specifies whether the connection can be used.
     */
    #[Optional]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsite_override
     */
    #[Optional(enum: AnchorsiteOverride::class)]
    public ?string $anchorsite_override;

    /**
     * Specifies if call cost webhooks should be sent for this TeXML Application.
     */
    #[Optional]
    public ?bool $call_cost_in_webhooks;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmf_type
     */
    #[Optional(enum: DtmfType::class)]
    public ?string $dtmf_type;

    /**
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    #[Optional]
    public ?bool $first_command_timeout;

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    #[Optional]
    public ?int $first_command_timeout_secs;

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    #[Optional]
    public ?string $status_callback;

    /**
     * HTTP request method Telnyx should use when requesting the status_callback URL.
     *
     * @var value-of<StatusCallbackMethod>|null $status_callback_method
     */
    #[Optional(enum: StatusCallbackMethod::class)]
    public ?string $status_callback_method;

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
    #[Optional]
    public ?string $voice_fallback_url;

    /**
     * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @var value-of<VoiceMethod>|null $voice_method
     */
    #[Optional(enum: VoiceMethod::class)]
    public ?string $voice_method;

    /**
     * `new TexmlApplicationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TexmlApplicationCreateParams::with(friendly_name: ..., voice_url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TexmlApplicationCreateParams)->withFriendlyName(...)->withVoiceURL(...)
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsite_override
     * @param DtmfType|value-of<DtmfType> $dtmf_type
     * @param Inbound|array{
     *   channel_limit?: int|null,
     *   shaken_stir_enabled?: bool|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     * @param Outbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $status_callback_method
     * @param list<string> $tags
     * @param VoiceMethod|value-of<VoiceMethod> $voice_method
     */
    public static function with(
        string $friendly_name,
        string $voice_url,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?bool $call_cost_in_webhooks = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $first_command_timeout = null,
        ?int $first_command_timeout_secs = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?string $status_callback = null,
        StatusCallbackMethod|string|null $status_callback_method = null,
        ?array $tags = null,
        ?string $voice_fallback_url = null,
        VoiceMethod|string|null $voice_method = null,
    ): self {
        $obj = new self;

        $obj['friendly_name'] = $friendly_name;
        $obj['voice_url'] = $voice_url;

        null !== $active && $obj['active'] = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $call_cost_in_webhooks && $obj['call_cost_in_webhooks'] = $call_cost_in_webhooks;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $first_command_timeout && $obj['first_command_timeout'] = $first_command_timeout;
        null !== $first_command_timeout_secs && $obj['first_command_timeout_secs'] = $first_command_timeout_secs;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $status_callback && $obj['status_callback'] = $status_callback;
        null !== $status_callback_method && $obj['status_callback_method'] = $status_callback_method;
        null !== $tags && $obj['tags'] = $tags;
        null !== $voice_fallback_url && $obj['voice_fallback_url'] = $voice_fallback_url;
        null !== $voice_method && $obj['voice_method'] = $voice_method;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj['friendly_name'] = $friendlyName;

        return $obj;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    public function withVoiceURL(string $voiceURL): self
    {
        $obj = clone $this;
        $obj['voice_url'] = $voiceURL;

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
        $obj['anchorsite_override'] = $anchorsiteOverride;

        return $obj;
    }

    /**
     * Specifies if call cost webhooks should be sent for this TeXML Application.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $obj = clone $this;
        $obj['call_cost_in_webhooks'] = $callCostInWebhooks;

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
        $obj['dtmf_type'] = $dtmfType;

        return $obj;
    }

    /**
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    public function withFirstCommandTimeout(bool $firstCommandTimeout): self
    {
        $obj = clone $this;
        $obj['first_command_timeout'] = $firstCommandTimeout;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    public function withFirstCommandTimeoutSecs(
        int $firstCommandTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj['first_command_timeout_secs'] = $firstCommandTimeoutSecs;

        return $obj;
    }

    /**
     * @param Inbound|array{
     *   channel_limit?: int|null,
     *   shaken_stir_enabled?: bool|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
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
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
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
        $obj['status_callback'] = $statusCallback;

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
        $obj['status_callback_method'] = $statusCallbackMethod;

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
        $obj['voice_fallback_url'] = $voiceFallbackURL;

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
        $obj['voice_method'] = $voiceMethod;

        return $obj;
    }
}
