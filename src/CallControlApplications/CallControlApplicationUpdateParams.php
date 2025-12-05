<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\CallControlApplications\CallControlApplicationInbound\SipSubdomainReceiveSettings;
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
 * @see Telnyx\Services\CallControlApplicationsService::update()
 *
 * @phpstan-type CallControlApplicationUpdateParamsShape = array{
 *   application_name: string,
 *   webhook_event_url: string,
 *   active?: bool,
 *   anchorsite_override?: AnchorsiteOverride|value-of<AnchorsiteOverride>,
 *   call_cost_in_webhooks?: bool,
 *   dtmf_type?: DtmfType|value-of<DtmfType>,
 *   first_command_timeout?: bool,
 *   first_command_timeout_secs?: int,
 *   inbound?: CallControlApplicationInbound|array{
 *     channel_limit?: int|null,
 *     shaken_stir_enabled?: bool|null,
 *     sip_subdomain?: string|null,
 *     sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
 *   },
 *   outbound?: CallControlApplicationOutbound|array{
 *     channel_limit?: int|null, outbound_voice_profile_id?: string|null
 *   },
 *   redact_dtmf_debug_logging?: bool,
 *   tags?: list<string>,
 *   webhook_api_version?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
 *   webhook_event_failover_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class CallControlApplicationUpdateParams implements BaseModel
{
    /** @use SdkModel<CallControlApplicationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user-assigned name to help manage the application.
     */
    #[Api]
    public string $application_name;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Api]
    public string $webhook_event_url;

    /**
     * Specifies whether the connection can be used.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     *
     * @var value-of<AnchorsiteOverride>|null $anchorsite_override
     */
    #[Api(enum: AnchorsiteOverride::class, optional: true)]
    public ?string $anchorsite_override;

    /**
     * Specifies if call cost webhooks should be sent for this Call Control Application.
     */
    #[Api(optional: true)]
    public ?bool $call_cost_in_webhooks;

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
     * Determines which webhook format will be used, Telnyx API v1 or v2.
     *
     * @var value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    #[Api(enum: WebhookAPIVersion::class, optional: true)]
    public ?string $webhook_api_version;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $webhook_timeout_secs;

    /**
     * `new CallControlApplicationUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallControlApplicationUpdateParams::with(
     *   application_name: ..., webhook_event_url: ...
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
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsite_override
     * @param DtmfType|value-of<DtmfType> $dtmf_type
     * @param CallControlApplicationInbound|array{
     *   channel_limit?: int|null,
     *   shaken_stir_enabled?: bool|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     * @param CallControlApplicationOutbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhook_api_version
     */
    public static function with(
        string $application_name,
        string $webhook_event_url,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?bool $call_cost_in_webhooks = null,
        DtmfType|string|null $dtmf_type = null,
        ?bool $first_command_timeout = null,
        ?int $first_command_timeout_secs = null,
        CallControlApplicationInbound|array|null $inbound = null,
        CallControlApplicationOutbound|array|null $outbound = null,
        ?bool $redact_dtmf_debug_logging = null,
        ?array $tags = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        $obj['application_name'] = $application_name;
        $obj['webhook_event_url'] = $webhook_event_url;

        null !== $active && $obj['active'] = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $call_cost_in_webhooks && $obj['call_cost_in_webhooks'] = $call_cost_in_webhooks;
        null !== $dtmf_type && $obj['dtmf_type'] = $dtmf_type;
        null !== $first_command_timeout && $obj['first_command_timeout'] = $first_command_timeout;
        null !== $first_command_timeout_secs && $obj['first_command_timeout_secs'] = $first_command_timeout_secs;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $redact_dtmf_debug_logging && $obj['redact_dtmf_debug_logging'] = $redact_dtmf_debug_logging;
        null !== $tags && $obj['tags'] = $tags;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * A user-assigned name to help manage the application.
     */
    public function withApplicationName(string $applicationName): self
    {
        $obj = clone $this;
        $obj['application_name'] = $applicationName;

        return $obj;
    }

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhook_event_url'] = $webhookEventURL;

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
        $obj['anchorsite_override'] = $anchorsiteOverride;

        return $obj;
    }

    /**
     * Specifies if call cost webhooks should be sent for this Call Control Application.
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
     * @param CallControlApplicationInbound|array{
     *   channel_limit?: int|null,
     *   shaken_stir_enabled?: bool|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
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
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
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
        $obj['redact_dtmf_debug_logging'] = $redactDtmfDebugLogging;

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
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhook_event_failover_url'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhook_timeout_secs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
