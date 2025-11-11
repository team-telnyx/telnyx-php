<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplication\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplication\DtmfType;
use Telnyx\CallControlApplications\CallControlApplication\RecordType;
use Telnyx\CallControlApplications\CallControlApplication\WebhookAPIVersion;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallControlApplicationShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
 *   application_name?: string|null,
 *   created_at?: string|null,
 *   dtmf_type?: value-of<DtmfType>|null,
 *   first_command_timeout?: bool|null,
 *   first_command_timeout_secs?: int|null,
 *   inbound?: CallControlApplicationInbound|null,
 *   outbound?: CallControlApplicationOutbound|null,
 *   record_type?: value-of<RecordType>|null,
 *   redact_dtmf_debug_logging?: bool|null,
 *   tags?: list<string>|null,
 *   updated_at?: string|null,
 *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class CallControlApplication implements BaseModel
{
    /** @use SdkModel<CallControlApplicationShape> */
    use SdkModel;

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
     * A user-assigned name to help manage the application.
     */
    #[Api(optional: true)]
    public ?string $application_name;

    /**
     * ISO 8601 formatted date of when the resource was created.
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

    #[Api(optional: true)]
    public ?CallControlApplicationInbound $inbound;

    #[Api(optional: true)]
    public ?CallControlApplicationOutbound $outbound;

    /** @var value-of<RecordType>|null $record_type */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    #[Api(optional: true)]
    public ?bool $redact_dtmf_debug_logging;

    /**
     * Tags assigned to the Call Control Application.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    #[Api(enum: WebhookAPIVersion::class, optional: true)]
    public ?string $webhook_api_version;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as `https`.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as `https`.
     */
    #[Api(optional: true)]
    public ?string $webhook_event_url;

    #[Api(nullable: true, optional: true)]
    public ?int $webhook_timeout_secs;

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
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhook_api_version
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?string $application_name = null,
        ?string $created_at = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $first_command_timeout = null,
        ?int $first_command_timeout_secs = null,
        ?CallControlApplicationInbound $inbound = null,
        ?CallControlApplicationOutbound $outbound = null,
        RecordType|string|null $record_type = null,
        ?bool $redact_dtmf_debug_logging = null,
        ?array $tags = null,
        ?string $updated_at = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $application_name && $obj->application_name = $application_name;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $first_command_timeout && $obj->first_command_timeout = $first_command_timeout;
        null !== $first_command_timeout_secs && $obj->first_command_timeout_secs = $first_command_timeout_secs;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $redact_dtmf_debug_logging && $obj->redact_dtmf_debug_logging = $redact_dtmf_debug_logging;
        null !== $tags && $obj->tags = $tags;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj->webhook_event_failover_url = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj->webhook_event_url = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj->webhook_timeout_secs = $webhook_timeout_secs;

        return $obj;
    }

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
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj->application_name = $applicationName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the resource was created.
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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * When enabled, DTMF digits entered by users will be redacted in debug logs to protect PII data entered through IVR interactions.
     */
    public function withRedactDtmfDebugLogging(
        bool $redactDtmfDebugLogging
    ): self {
        $obj = clone $this;
        $obj->redact_dtmf_debug_logging = $redactDtmfDebugLogging;

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
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

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
        $obj['webhook_api_version'] = $webhookAPIVersion;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as `https`.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj->webhook_event_failover_url = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as `https`.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj->webhook_event_url = $webhookEventURL;

        return $obj;
    }

    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhook_timeout_secs = $webhookTimeoutSecs;

        return $obj;
    }
}
