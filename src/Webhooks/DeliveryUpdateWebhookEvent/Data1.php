<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\DeliveryUpdateWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingError;
use Telnyx\Messages\OutboundMessagePayload;
use Telnyx\Messages\OutboundMessagePayload\Cc;
use Telnyx\Messages\OutboundMessagePayload\Cost;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown;
use Telnyx\Messages\OutboundMessagePayload\Direction;
use Telnyx\Messages\OutboundMessagePayload\From;
use Telnyx\Messages\OutboundMessagePayload\Media;
use Telnyx\Messages\OutboundMessagePayload\To;
use Telnyx\Messages\OutboundMessagePayload\Type;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data1\EventType;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data1\RecordType;

/**
 * @phpstan-type Data1Shape = array{
 *   id?: string|null,
 *   event_type?: value-of<EventType>|null,
 *   occurred_at?: \DateTimeInterface|null,
 *   payload?: OutboundMessagePayload|null,
 *   record_type?: value-of<RecordType>|null,
 * }
 */
final class Data1 implements BaseModel
{
    /** @use SdkModel<Data1Shape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The type of event being delivered.
     *
     * @var value-of<EventType>|null $event_type
     */
    #[Api(enum: EventType::class, optional: true)]
    public ?string $event_type;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurred_at;

    #[Api(optional: true)]
    public ?OutboundMessagePayload $payload;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EventType|value-of<EventType> $event_type
     * @param OutboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<Cc>|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: Cost|null,
     *   cost_breakdown?: CostBreakdown|null,
     *   direction?: value-of<Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: From|null,
     *   media?: list<Media>|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   parts?: int|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: value-of<OutboundMessagePayload\RecordType>|null,
     *   sent_at?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcr_campaign_billable?: bool|null,
     *   tcr_campaign_id?: string|null,
     *   tcr_campaign_registered?: string|null,
     *   text?: string|null,
     *   to?: list<To>|null,
     *   type?: value-of<Type>|null,
     *   valid_until?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * } $payload
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $id = null,
        EventType|string|null $event_type = null,
        ?\DateTimeInterface $occurred_at = null,
        OutboundMessagePayload|array|null $payload = null,
        RecordType|string|null $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $event_type && $obj['event_type'] = $event_type;
        null !== $occurred_at && $obj['occurred_at'] = $occurred_at;
        null !== $payload && $obj['payload'] = $payload;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The type of event being delivered.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['event_type'] = $eventType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurred_at'] = $occurredAt;

        return $obj;
    }

    /**
     * @param OutboundMessagePayload|array{
     *   id?: string|null,
     *   cc?: list<Cc>|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: Cost|null,
     *   cost_breakdown?: CostBreakdown|null,
     *   direction?: value-of<Direction>|null,
     *   encoding?: string|null,
     *   errors?: list<MessagingError>|null,
     *   from?: From|null,
     *   media?: list<Media>|null,
     *   messaging_profile_id?: string|null,
     *   organization_id?: string|null,
     *   parts?: int|null,
     *   received_at?: \DateTimeInterface|null,
     *   record_type?: value-of<OutboundMessagePayload\RecordType>|null,
     *   sent_at?: \DateTimeInterface|null,
     *   subject?: string|null,
     *   tags?: list<string>|null,
     *   tcr_campaign_billable?: bool|null,
     *   tcr_campaign_id?: string|null,
     *   tcr_campaign_registered?: string|null,
     *   text?: string|null,
     *   to?: list<To>|null,
     *   type?: value-of<Type>|null,
     *   valid_until?: \DateTimeInterface|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * } $payload
     */
    public function withPayload(OutboundMessagePayload|array $payload): self
    {
        $obj = clone $this;
        $obj['payload'] = $payload;

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
}
