<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEndedWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\EventType;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\Payload;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\RecordType;

/**
 * @phpstan-type Data1Shape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   event_type?: value-of<EventType>|null,
 *   occurred_at?: \DateTimeInterface|null,
 *   payload?: Payload|null,
 *   record_type?: value-of<RecordType>|null,
 * }
 */
final class Data1 implements BaseModel
{
    /** @use SdkModel<Data1Shape> */
    use SdkModel;

    /**
     * Unique identifier for the event.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Timestamp when the event was created in the system.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * The type of event being delivered.
     *
     * @var value-of<EventType>|null $event_type
     */
    #[Api(enum: EventType::class, optional: true)]
    public ?string $event_type;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurred_at;

    #[Api(optional: true)]
    public ?Payload $payload;

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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        EventType|string|null $event_type = null,
        ?\DateTimeInterface $occurred_at = null,
        ?Payload $payload = null,
        RecordType|string|null $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $event_type && $obj['event_type'] = $event_type;
        null !== $occurred_at && $obj->occurred_at = $occurred_at;
        null !== $payload && $obj->payload = $payload;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Unique identifier for the event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Timestamp when the event was created in the system.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurred_at = $occurredAt;

        return $obj;
    }

    public function withPayload(Payload $payload): self
    {
        $obj = clone $this;
        $obj->payload = $payload;

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
