<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplication\Inbound;
use Telnyx\FaxApplications\FaxApplication\Inbound\SipSubdomainReceiveSettings;
use Telnyx\FaxApplications\FaxApplication\Outbound;

/**
 * @phpstan-type FaxApplicationShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   anchorsite_override?: value-of<AnchorsiteOverride>|null,
 *   application_name?: string|null,
 *   created_at?: string|null,
 *   inbound?: Inbound|null,
 *   outbound?: Outbound|null,
 *   record_type?: string|null,
 *   tags?: list<string>|null,
 *   updated_at?: string|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class FaxApplication implements BaseModel
{
    /** @use SdkModel<FaxApplicationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional]
    public ?string $id;

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
     * A user-assigned name to help manage the application.
     */
    #[Optional]
    public ?string $application_name;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Tags associated with the Fax Application.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

    /**
     * The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional(nullable: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    #[Optional]
    public ?string $webhook_event_url;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional(nullable: true)]
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
     * @param Inbound|array{
     *   channel_limit?: int|null,
     *   sip_subdomain?: string|null,
     *   sip_subdomain_receive_settings?: value-of<SipSubdomainReceiveSettings>|null,
     * } $inbound
     * @param Outbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     * @param list<string> $tags
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        AnchorsiteOverride|string|null $anchorsite_override = null,
        ?string $application_name = null,
        ?string $created_at = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?string $record_type = null,
        ?array $tags = null,
        ?string $updated_at = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $anchorsite_override && $obj['anchorsite_override'] = $anchorsite_override;
        null !== $application_name && $obj['application_name'] = $application_name;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
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
        $obj['application_name'] = $applicationName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * @param Inbound|array{
     *   channel_limit?: int|null,
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
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Tags associated with the Fax Application.
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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

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
     * The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhook_event_url'] = $webhookEventURL;

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
