<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplicationCreateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationInbound\SipSubdomainReceiveSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a call control application.
 *
 * @see Telnyx\Services\CallControlApplicationsService::create()
 *
 * @phpstan-type CallControlApplicationCreateParamsShape = array{
 *   applicationName: string,
 *   webhookEventURL: string,
 *   active?: bool,
 *   anchorsiteOverride?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   callCostInWebhooks?: bool,
 *   dtmfType?: DtmfType|value-of<DtmfType>,
 *   firstCommandTimeout?: bool,
 *   firstCommandTimeoutSecs?: int,
 *   inbound?: CallControlApplicationInbound|array{
 *     channelLimit?: int|null,
 *     shakenStirEnabled?: bool|null,
 *     sipSubdomain?: string|null,
 *     sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
 *   },
 *   outbound?: CallControlApplicationOutbound|array{
 *     channelLimit?: int|null, outboundVoiceProfileID?: string|null
 *   },
 *   redactDtmfDebugLogging?: bool,
 *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhookEventFailoverURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class CallControlApplicationCreateParams implements BaseModel
{
    /** @use SdkModel<CallControlApplicationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Required('application_name')]
    public string $applicationName;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Required('webhook_event_url')]
    public string $webhookEventURL;

    /**
     * Specifies whether the connection can be used.
     */
    #[Optional]
    public ?bool $active;

    /**
     * <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsiteOverride
     */
    #[Optional('anchorsite_override', enum: AnchorsiteOverride::class)]
    public ?string $anchorsiteOverride;

    /**
     * Specifies if call cost webhooks should be sent for this Call Control Application.
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
    public ?CallControlApplicationInbound $inbound;

    #[Optional]
    public ?CallControlApplicationOutbound $outbound;

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    #[Optional('redact_dtmf_debug_logging')]
    public ?bool $redactDtmfDebugLogging;

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
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional('webhook_timeout_secs', nullable: true)]
    public ?int $webhookTimeoutSecs;

    /**
     * `new CallControlApplicationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallControlApplicationCreateParams::with(
     *   applicationName: ..., webhookEventURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallControlApplicationCreateParams)
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
     * @param CallControlApplicationInbound|array{
     *   channelLimit?: int|null,
     *   shakenStirEnabled?: bool|null,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     * @param CallControlApplicationOutbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        string $applicationName,
        string $webhookEventURL,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?bool $callCostInWebhooks = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $firstCommandTimeout = null,
        ?int $firstCommandTimeoutSecs = null,
        CallControlApplicationInbound|array|null $inbound = null,
        CallControlApplicationOutbound|array|null $outbound = null,
        ?bool $redactDtmfDebugLogging = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        $obj['applicationName'] = $applicationName;
        $obj['webhookEventURL'] = $webhookEventURL;

        null !== $active && $obj['active'] = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $callCostInWebhooks && $obj['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $firstCommandTimeout && $obj['firstCommandTimeout'] = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $obj['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $redactDtmfDebugLogging && $obj['redactDtmfDebugLogging'] = $redactDtmfDebugLogging;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj['applicationName'] = $applicationName;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhookEventURL'] = $webhookEventURL;

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
     * Specifies if call cost webhooks should be sent for this Call Control Application.
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
     * @param CallControlApplicationInbound|array{
     *   channelLimit?: int|null,
     *   shakenStirEnabled?: bool|null,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     */
    public function withInbound(
        CallControlApplicationInbound|array $inbound
    ): self {
        $obj = clone $this;
        $obj['inbound'] = $inbound;

        return $obj;
    }

    /**
     * @param CallControlApplicationOutbound|array{
     *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
     * } $outbound
     */
    public function withOutbound(
        CallControlApplicationOutbound|array $outbound
    ): self {
        $obj = clone $this;
        $obj['outbound'] = $outbound;

        return $obj;
    }

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    public function withRedactDtmfDebugLogging(
        bool $redactDtmfDebugLogging
    ): self {
        $obj = clone $this;
        $obj['redactDtmfDebugLogging'] = $redactDtmfDebugLogging;

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
        $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
