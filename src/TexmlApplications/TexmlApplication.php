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
 * @phpstan-type texml_application = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
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
    /** @use SdkModel<texml_application> */
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
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Api('anchorsite_override', enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsiteOverride;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     *
     * @var value-of<DtmfType>|null $dtmfType
     */
    #[Api('dtmf_type', enum: DtmfType::class, optional: true)]
    public ?string $dtmfType;

    /**
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    #[Api('first_command_timeout', optional: true)]
    public ?bool $firstCommandTimeout;

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    #[Api('first_command_timeout_secs', optional: true)]
    public ?int $firstCommandTimeoutSecs;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Api('friendly_name', optional: true)]
    public ?string $friendlyName;

    #[Api(optional: true)]
    public ?Inbound $inbound;

    #[Api(optional: true)]
    public ?Outbound $outbound;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    #[Api('status_callback', optional: true)]
    public ?string $statusCallback;

    /**
     * HTTP request method Telnyx should use when requesting the status_callback URL.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Api(
        'status_callback_method',
        enum: StatusCallbackMethod::class,
        optional: true
    )]
    public ?string $statusCallbackMethod;

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
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    #[Api('voice_fallback_url', optional: true)]
    public ?string $voiceFallbackURL;

    /**
     * HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @var value-of<VoiceMethod>|null $voiceMethod
     */
    #[Api('voice_method', enum: VoiceMethod::class, optional: true)]
    public ?string $voiceMethod;

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    #[Api('voice_url', optional: true)]
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
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     * @param list<string> $tags
     * @param VoiceMethod|value-of<VoiceMethod> $voiceMethod
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $createdAt = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $firstCommandTimeout = null,
        ?int $firstCommandTimeoutSecs = null,
        ?string $friendlyName = null,
        ?Inbound $inbound = null,
        ?Outbound $outbound = null,
        ?string $recordType = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?array $tags = null,
        ?string $updatedAt = null,
        ?string $voiceFallbackURL = null,
        VoiceMethod|string|null $voiceMethod = null,
        ?string $voiceURL = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $anchorsiteOverride && $obj->anchorsiteOverride = $anchorsiteOverride instanceof AnchorsiteOverride ? $anchorsiteOverride->value : $anchorsiteOverride;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $dtmfType && $obj->dtmfType = $dtmfType instanceof DtmfType ? $dtmfType->value : $dtmfType;
        null !== $firstCommandTimeout && $obj->firstCommandTimeout = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $obj->firstCommandTimeoutSecs = $firstCommandTimeoutSecs;
        null !== $friendlyName && $obj->friendlyName = $friendlyName;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $statusCallback && $obj->statusCallback = $statusCallback;
        null !== $statusCallbackMethod && $obj->statusCallbackMethod = $statusCallbackMethod instanceof StatusCallbackMethod ? $statusCallbackMethod->value : $statusCallbackMethod;
        null !== $tags && $obj->tags = $tags;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $voiceFallbackURL && $obj->voiceFallbackURL = $voiceFallbackURL;
        null !== $voiceMethod && $obj->voiceMethod = $voiceMethod instanceof VoiceMethod ? $voiceMethod->value : $voiceMethod;
        null !== $voiceURL && $obj->voiceURL = $voiceURL;

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
        $obj->anchorsiteOverride = $anchorsiteOverride instanceof AnchorsiteOverride ? $anchorsiteOverride->value : $anchorsiteOverride;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->dtmfType = $dtmfType instanceof DtmfType ? $dtmfType->value : $dtmfType;

        return $obj;
    }

    /**
     * Specifies whether calls to phone numbers associated with this connection should hangup after timing out.
     */
    public function withFirstCommandTimeout(bool $firstCommandTimeout): self
    {
        $obj = clone $this;
        $obj->firstCommandTimeout = $firstCommandTimeout;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a dial command.
     */
    public function withFirstCommandTimeoutSecs(
        int $firstCommandTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj->firstCommandTimeoutSecs = $firstCommandTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj->friendlyName = $friendlyName;

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
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * URL for Telnyx to send requests to containing information about call progress events.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj->statusCallback = $statusCallback;

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
        $obj->statusCallbackMethod = $statusCallbackMethod instanceof StatusCallbackMethod ? $statusCallbackMethod->value : $statusCallbackMethod;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url.
     */
    public function withVoiceFallbackURL(string $voiceFallbackURL): self
    {
        $obj = clone $this;
        $obj->voiceFallbackURL = $voiceFallbackURL;

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
        $obj->voiceMethod = $voiceMethod instanceof VoiceMethod ? $voiceMethod->value : $voiceMethod;

        return $obj;
    }

    /**
     * URL to which Telnyx will deliver your XML Translator webhooks.
     */
    public function withVoiceURL(string $voiceURL): self
    {
        $obj = clone $this;
        $obj->voiceURL = $voiceURL;

        return $obj;
    }
}
