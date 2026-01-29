<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplication\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplication\DtmfType;
use Telnyx\CallControlApplications\CallControlApplication\RecordType;
use Telnyx\CallControlApplications\CallControlApplication\WebhookAPIVersion;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallControlApplicationInboundShape from \Telnyx\CallControlApplications\CallControlApplicationInbound
 * @phpstan-import-type CallControlApplicationOutboundShape from \Telnyx\CallControlApplications\CallControlApplicationOutbound
 *
 * @phpstan-type CallControlApplicationShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsiteOverride?: null|AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   applicationName?: string|null,
 *   callCostInWebhooks?: bool|null,
 *   createdAt?: string|null,
 *   dtmfType?: null|DtmfType|value-of<DtmfType>,
 *   firstCommandTimeout?: bool|null,
 *   firstCommandTimeoutSecs?: int|null,
 *   inbound?: null|CallControlApplicationInbound|CallControlApplicationInboundShape,
 *   outbound?: null|CallControlApplicationOutbound|CallControlApplicationOutboundShape,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   redactDtmfDebugLogging?: bool|null,
 *   tags?: list<string>|null,
 *   updatedAt?: string|null,
 *   webhookAPIVersion?: null|WebhookAPIVersion|value-of<WebhookAPIVersion>,
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride>|null $anchorsiteOverride
     * @param DtmfType|value-of<DtmfType>|null $dtmfType
     * @param CallControlApplicationInbound|CallControlApplicationInboundShape|null $inbound
     * @param CallControlApplicationOutbound|CallControlApplicationOutboundShape|null $outbound
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param list<string>|null $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion>|null $webhookAPIVersion
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $anchorsiteOverride && $self['anchorsiteOverride'] = $anchorsiteOverride;
        null !== $applicationName && $self['applicationName'] = $applicationName;
        null !== $callCostInWebhooks && $self['callCostInWebhooks'] = $callCostInWebhooks;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dtmfType && $self['dtmfType'] = $dtmfType;
        null !== $firstCommandTimeout && $self['firstCommandTimeout'] = $firstCommandTimeout;
        null !== $firstCommandTimeoutSecs && $self['firstCommandTimeoutSecs'] = $firstCommandTimeoutSecs;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $outbound && $self['outbound'] = $outbound;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $redactDtmfDebugLogging && $self['redactDtmfDebugLogging'] = $redactDtmfDebugLogging;
        null !== $tags && $self['tags'] = $tags;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookAPIVersion && $self['webhookAPIVersion'] = $webhookAPIVersion;
        null !== $webhookEventFailoverURL && $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $self['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }

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
     * <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
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
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $self = clone $this;
        $self['applicationName'] = $applicationName;

        return $self;
    }

    /**
     * Specifies if call cost webhooks should be sent for this Call Control Application.
     */
    public function withCallCostInWebhooks(bool $callCostInWebhooks): self
    {
        $self = clone $this;
        $self['callCostInWebhooks'] = $callCostInWebhooks;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the resource was created.
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
     * @param CallControlApplicationInbound|CallControlApplicationInboundShape $inbound
     */
    public function withInbound(
        CallControlApplicationInbound|array $inbound
    ): self {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * @param CallControlApplicationOutbound|CallControlApplicationOutboundShape $outbound
     */
    public function withOutbound(
        CallControlApplicationOutbound|array $outbound
    ): self {
        $self = clone $this;
        $self['outbound'] = $outbound;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    public function withRedactDtmfDebugLogging(
        bool $redactDtmfDebugLogging
    ): self {
        $self = clone $this;
        $self['redactDtmfDebugLogging'] = $redactDtmfDebugLogging;

        return $self;
    }

    /**
     * Tags assigned to the Call Control Application.
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
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

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
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as `https`.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $self = clone $this;
        $self['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $self;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as `https`.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $self = clone $this;
        $self['webhookEventURL'] = $webhookEventURL;

        return $self;
    }

    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $self = clone $this;
        $self['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $self;
    }
}
