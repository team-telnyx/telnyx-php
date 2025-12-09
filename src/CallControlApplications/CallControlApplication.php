<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplication\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplication\DtmfType;
use Telnyx\CallControlApplications\CallControlApplication\RecordType;
use Telnyx\CallControlApplications\CallControlApplication\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationInbound\SipSubdomainReceiveSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallControlApplicationShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
 *   applicationName?: string|null,
 *   callCostInWebhooks?: bool|null,
 *   createdAt?: string|null,
 *   dtmfType?: value-of<DtmfType>|null,
 *   firstCommandTimeout?: bool|null,
 *   firstCommandTimeoutSecs?: int|null,
 *   inbound?: CallControlApplicationInbound|null,
 *   outbound?: CallControlApplicationOutbound|null,
 *   recordType?: value-of<RecordType>|null,
 *   redactDtmfDebugLogging?: bool|null,
 *   tags?: list<string>|null,
 *   updatedAt?: string|null,
 *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string|null,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class CallControlApplication implements BaseModel
{
    /** @use SdkModel<CallControlApplicationShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

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
     * A user-assigned name to help manage the application.
     */
    #[Optional('application_name')]
    public ?string $applicationName;

    /**
     * Specifies if call cost webhooks should be sent for this Call Control Application.
     */
    #[Optional('call_cost_in_webhooks')]
    public ?bool $callCostInWebhooks;

    /**
     * ISO 8601 formatted date of when the resource was created.
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

    #[Optional]
    public ?CallControlApplicationInbound $inbound;

    #[Optional]
    public ?CallControlApplicationOutbound $outbound;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    #[Optional('redact_dtmf_debug_logging')]
    public ?bool $redactDtmfDebugLogging;

    /**
     * Tags assigned to the Call Control Application.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhookAPIVersion
     */
    #[Optional('webhook_api_version', enum: WebhookAPIVersion::class)]
    public ?string $webhookAPIVersion;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as `https`.
     */
    #[Optional('webhook_event_failover_url', nullable: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as `https`.
     */
    #[Optional('webhook_event_url')]
    public ?string $webhookEventURL;

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
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsiteOverride = null,
        ?string $applicationName = null,
        ?bool $callCostInWebhooks = null,
        ?string $createdAt = null,
        DtmfType|string|null $dtmfType = null,
        ?bool $firstCommandTimeout = null,
        ?int $firstCommandTimeoutSecs = null,
        CallControlApplicationInbound|array|null $inbound = null,
        CallControlApplicationOutbound|array|null $outbound = null,
        RecordType|string|null $recordType = null,
        ?bool $redactDtmfDebugLogging = null,
        ?array $tags = null,
        ?string $updatedAt = null,
        WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $anchorsiteOverride && $obj['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $applicationName && $obj['applicationName'] = $applicationName;
        null !== $callCostInWebhooks && $obj['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $dtmfType && $obj['dtmfType'] = $dtmfType;
        null !== $firstCommandTimeout && $obj['firstCommandTimeout'] = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $obj['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $redactDtmfDebugLogging && $obj['redactDtmfDebugLogging'] = $redactDtmfDebugLogging;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $webhookAPIVersion && $obj['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj['applicationName'] = $applicationName;

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
     * ISO 8601 formatted date of when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
     * Tags assigned to the Call Control Application.
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
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

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
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as `https`.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as `https`.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhookEventURL'] = $webhookEventURL;

        return $obj;
    }

    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
