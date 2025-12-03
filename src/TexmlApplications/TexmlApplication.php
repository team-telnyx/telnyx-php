<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\TexmlApplications\TexmlApplication\Inbound;
use Telnyx\TexmlApplications\TexmlApplication\Outbound;
use Telnyx\TexmlApplications\TexmlApplication\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplication\VoiceMethod;

/**
 * @phpstan-type TexmlApplicationShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
 *   call_cost_in_webhooks?: bool|null,
 *   created_at?: string|null,
 *   dtmf_type?: value-of<DtmfType>|null,
 *   first_command_timeout?: bool|null,
 *   first_command_timeout_secs?: int|null,
 *   friendly_name?: string|null,
 *   inbound?: Inbound|null,
 *   outbound?: Outbound|null,
 *   record_type?: string|null,
 *   status_callback?: string|null,
 *   status_callback_method?: value-of<StatusCallbackMethod>|null,
 *   tags?: list<string>|null,
 *   updated_at?: string|null,
 *   voice_fallback_url?: string|null,
 *   voice_method?: value-of<VoiceMethod>|null,
 *   voice_url?: string|null,
 * }
 */
final class TexmlApplication implements BaseModel
{
    /** @use SdkModel<TexmlApplicationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies whether the connection can be used.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsite_override
     */
    #[Api(enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsite_override;

    /**
     * Specifies if call cost webhooks should be sent for this TeXML Application.
     */
    #[Api(optional: true)]
    public ?bool $call_cost_in_webhooks;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmf_type
     */
    #[Api(enum: DtmfType::class, optional: true)]
    public ?string $dtmf_type;

    /**
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    #[Api(optional: true)]
    public ?bool $first_command_timeout;

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    #[Api(optional: true)]
    public ?int $first_command_timeout_secs;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Api(optional: true)]
    public ?string $friendly_name;

    #[Api(optional: true)]
    public ?Inbound $inbound;

    #[Api(optional: true)]
    public ?Outbound $outbound;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    #[Api(optional: true)]
    public ?string $status_callback;

    /**
     * HTTP request method Telnyx should use when requesting the status_callback URL.
     *
     * @var value-of<StatusCallbackMethod>|null $status_callback_method
     */
    #[Api(enum: StatusCallbackMethod::class, optional: true)]
    public ?string $status_callback_method;

    /**
     * Tags associated with the Texml Application.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    #[Api(optional: true)]
    public ?string $voice_fallback_url;

    /**
     * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @var value-of<VoiceMethod>|null $voice_method
     */
    #[Api(enum: VoiceMethod::class, optional: true)]
    public ?string $voice_method;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    #[Api(optional: true)]
    public ?string $voice_url;

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
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $status_callback_method
     * @param list<string> $tags
     * @param VoiceMethod|value-of<VoiceMethod> $voice_method
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?bool $call_cost_in_webhooks = null,
        ?string $created_at = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $first_command_timeout = null,
        ?int $first_command_timeout_secs = null,
        ?string $friendly_name = null,
        ?Inbound $inbound = null,
        ?Outbound $outbound = null,
        ?string $record_type = null,
        ?string $status_callback = null,
        StatusCallbackMethod|string|null $status_callback_method = null,
        ?array $tags = null,
        ?string $updated_at = null,
        ?string $voice_fallback_url = null,
        VoiceMethod|string|null $voice_method = null,
        ?string $voice_url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $call_cost_in_webhooks && $obj->call_cost_in_webhooks = $call_cost_in_webhooks;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $first_command_timeout && $obj->first_command_timeout = $first_command_timeout;
        null !== $first_command_timeout_secs && $obj->first_command_timeout_secs = $first_command_timeout_secs;
        null !== $friendly_name && $obj->friendly_name = $friendly_name;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $status_callback && $obj->status_callback = $status_callback;
        null !== $status_callback_method && $obj['status_callback_method'] = $status_callback_method;
        null !== $tags && $obj->tags = $tags;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $voice_fallback_url && $obj->voice_fallback_url = $voice_fallback_url;
        null !== $voice_method && $obj['voice_method'] = $voice_method;
        null !== $voice_url && $obj->voice_url = $voice_url;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies whether the connection can be used.
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
        $obj['anchorsite_override'] = $anchorsiteOverride;

        return $obj;
    }

    /**
     * Specifies if call cost webhooks should be sent for this TeXML Application.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $obj = clone $this;
        $obj->call_cost_in_webhooks = $callCostInWebhooks;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
        $obj->first_command_timeout = $firstCommandTimeout;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    public function withFirstCommandTimeoutSecs(
        int $firstCommandTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj->first_command_timeout_secs = $firstCommandTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj->friendly_name = $friendlyName;

        return $obj;
    }

    public function withInbound(Inbound $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

        return $obj;
    }

    public function withOutbound(Outbound $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj->status_callback = $statusCallback;

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
        $obj->tags = $tags;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    public function withVoiceFallbackURL(string $voiceFallbackURL): self
    {
        $obj = clone $this;
        $obj->voice_fallback_url = $voiceFallbackURL;

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

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    public function withVoiceURL(string $voiceURL): self
    {
        $obj = clone $this;
        $obj->voice_url = $voiceURL;

        return $obj;
    }
}
