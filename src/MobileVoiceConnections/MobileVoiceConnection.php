<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\RecordType;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection\WebhookAPIVersion;

/**
 * @phpstan-type MobileVoiceConnectionShape = array{
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
final class MobileVoiceConnection implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MobileVoiceConnectionShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicates if the connection is active.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * The name of the connection.
     */
    #[Api(optional: true)]
    public ?string $connection_name;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?Inbound $inbound;

    #[Api(optional: true)]
    public ?Outbound $outbound;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * A list of tags associated with the connection.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * The API version for webhooks.
     *
     * @var value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    #[Api(enum: WebhookAPIVersion::class, nullable: true, optional: true)]
    public ?string $webhook_api_version;

    /**
     * The failover URL where webhooks are sent.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_failover_url;

    /**
     * The URL where webhooks are sent.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_event_url;

    /**
     * The timeout for webhooks in seconds.
     */
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
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion>|null $webhook_api_version
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?string $connection_name = null,
        ?\DateTimeInterface $created_at = null,
        ?Inbound $inbound = null,
        ?Outbound $outbound = null,
        RecordType|string|null $record_type = null,
        ?array $tags = null,
        ?\DateTimeInterface $updated_at = null,
        WebhookAPIVersion|string|null $webhook_api_version = null,
        ?string $webhook_event_failover_url = null,
        ?string $webhook_event_url = null,
        ?int $webhook_timeout_secs = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $connection_name && $obj->connection_name = $connection_name;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $inbound && $obj->inbound = $inbound;
        null !== $outbound && $obj->outbound = $outbound;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $tags && $obj->tags = $tags;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $webhook_api_version && $obj['webhook_api_version'] = $webhook_api_version;
        null !== $webhook_event_failover_url && $obj->webhook_event_failover_url = $webhook_event_failover_url;
        null !== $webhook_event_url && $obj->webhook_event_url = $webhook_event_url;
        null !== $webhook_timeout_secs && $obj->webhook_timeout_secs = $webhook_timeout_secs;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Indicates if the connection is active.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * The name of the connection.
     */
    public function withConnectionName(string $connectionName): self
    {
        $obj = clone $this;
        $obj->connection_name = $connectionName;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
        $obj->tags = $tags;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

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
        $obj->webhook_event_failover_url = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks are sent.
     */
    public function withWebhookEventURL(?string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj->webhook_event_url = $webhookEventURL;

        return $obj;
    }

    /**
     * The timeout for webhooks in seconds.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->webhook_timeout_secs = $webhookTimeoutSecs;

        return $obj;
    }
}
