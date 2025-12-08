<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\RecordType;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse\Data\WebhookAPIVersion;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   connection_name?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   inbound?: Inbound|null,
 *   outbound?: Outbound|null,
 *   record_type?: value-of<RecordType>|null,
 *   tags?: list<string>|null,
 *   updated_at?: \DateTimeInterface|null,
 *   webhook_api_version?: value-of<WebhookAPIVersion>|null,
 *   webhook_event_failover_url?: string|null,
 *   webhook_event_url?: string|null,
 *   webhook_timeout_secs?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicates if the connection is active.
     */
    #[Optional]
    public ?bool $active;

    /**
     * The name of the connection.
     */
    #[Optional]
    public ?string $connection_name;

    #[Optional]
    public ?\DateTimeInterface $created_at;

    #[Optional]
    public ?Inbound $inbound;

    #[Optional]
    public ?Outbound $outbound;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    /**
     * A list of tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * The API version for webhooks.
     *
     * @var value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    #[Optional(enum: WebhookAPIVersion::class, nullable: true)]
    public ?string $webhook_api_version;

    /**
     * The failover URL where webhooks are sent.
     */
    #[Optional(nullable: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks are sent.
     */
    #[Optional(nullable: true)]
    public ?string $webhook_event_url;

    /**
     * The timeout for webhooks in seconds.
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
     * @param Inbound|array{channel_limit?: int|null} $inbound
     * @param Outbound|array{
     *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
     * } $outbound
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?string $connection_name = null,
        ?\DateTimeInterface $created_at = null,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        RecordType|string|null $record_type = null,
        ?array $tags = null,
        ?\DateTimeInterface $updated_at = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $inbound && $obj['inbound'] = $inbound;
        null !== $outbound && $obj['outbound'] = $outbound;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $tags && $obj['tags'] = $tags;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj['webhook_event_failover_url'] = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj['webhook_event_url'] = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj['webhook_timeout_secs'] = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Indicates if the connection is active.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    /**
     * The name of the connection.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * @param Inbound|array{channel_limit?: int|null} $inbound
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
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * A list of tags associated with the connection.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * The API version for webhooks.
     *
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion>|null $webhookAPIVersion
     */
    public function withWebhookAPIVersion(
        WebhookAPIVersion|string|null $webhookAPIVersion
    ): self {
        $obj = clone $this;
        $obj['webhook_api_version'] = $webhookAPIVersion;

        return $obj;
    }

    /**
     * The failover URL where webhooks are sent.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhook_event_failover_url'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks are sent.
     */
    public function withWebhookEventURL(?string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhook_event_url'] = $webhookEventURL;

        return $obj;
    }

    /**
     * The timeout for webhooks in seconds.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhook_timeout_secs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
