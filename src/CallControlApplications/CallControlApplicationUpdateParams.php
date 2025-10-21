<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplicationUpdateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams\WebhookAPIVersion;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates settings of an existing call control application.
 *
 * @see Telnyx\CallControlApplications->update
 *
 * @phpstan-type call_control_application_update_params = array{
 *   applicationName: string,
 *   webhookEventURL: string,
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   dtmfType?: DtmfType|value-of<DtmfType>,
 *   firstCommandTimeout?: bool,
 *   firstCommandTimeoutSecs?: int,
 *   inbound?: CallControlApplicationInbound,
 *   outbound?: CallControlApplicationOutbound,
 *   redactDtmfDebugLogging?: bool,
 *   tags?: list<string>,
 *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class CallControlApplicationUpdateParams implements BaseModel
{
    /** @use SdkModel<call_control_application_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Api('application_name')]
    public string $applicationName;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Api('webhook_event_url')]
    public string $webhookEventURL;

    /**
     * Specifies whether the connection can be used.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Api('anchorsite_override', enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsiteOverride;

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

    #[Api(optional: true)]
    public ?CallControlApplicationInbound $inbound;

    #[Api(optional: true)]
    public ?CallControlApplicationOutbound $outbound;

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    #[Api('redact_dtmf_debug_logging', optional: true)]
    public ?bool $redactDtmfDebugLogging;

    /**
     * Tags assigned to the Call Control Application.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

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
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Api('webhook_timeout_secs', nullable: true, optional: true)]
    public ?int $webhookTimeoutSecs;

    /**
     * `new CallControlApplicationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallControlApplicationUpdateParams::with(
     *   applicationName: ..., webhookEventURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallControlApplicationUpdateParams)
     *   ->withApplicationName(...)
     *   ->withWebhookEventURL(...)
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
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        string $applicationName,
        string $webhookEventURL,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $firstCommandTimeout = null,
        ?int $firstCommandTimeoutSecs = null,
        ?CallControlApplicationInbound $inbound = null,
        ?CallControlApplicationOutbound $outbound = null,
        ?bool $redactDtmfDebugLogging = null,
        ?array $tags = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        $obj->applicationName = $applicationName;
        $obj->webhookEventURL = $webhookEventURL;

        null !== $active && $obj->active = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $firstCommandTimeout && $obj->firstCommandTimeout = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $obj->firstCommandTimeoutSecs = $firstCommandTimeoutSecs;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $redactDtmfDebugLogging && $obj->redactDtmfDebugLogging = $redactDtmfDebugLogging;
        null !== $tags && $obj->tags = $tags;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj->webhookEventFailoverURL = $webhookEventFailoverURL;
        null !== $webhookTimeoutSecs && $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj->applicationName = $applicationName;

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
     * Specifies whether the connection can be used.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
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

    public function withInbound(CallControlApplicationInbound $inbound): self
    {
        $obj = clone $this;
        $obj->inbound = $inbound;

        return $obj;
    }

    public function withOutbound(CallControlApplicationOutbound $outbound): self
    {
        $obj = clone $this;
        $obj->outbound = $outbound;

        return $obj;
    }

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    public function withRedactDtmfDebugLogging(
        bool $redactDtmfDebugLogging
    ): self {
        $obj = clone $this;
        $obj->redactDtmfDebugLogging = $redactDtmfDebugLogging;

        return $obj;
    }

    /**
     * Tags assigned to the Call Control Application.
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
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhookTimeoutSecs = $webhookTimeoutSecs;

        return $obj;
    }
}
