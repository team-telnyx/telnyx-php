<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\StreamingStartedWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\StreamingStartedWebhookEvent\Data1\EventType;
use Telnyx\Webhooks\StreamingStartedWebhookEvent\Data1\Payload;
use Telnyx\Webhooks\StreamingStartedWebhookEvent\Data1\RecordType;

/**
 * @phpstan-type Data1Shape = array{
 *   id?: string|null,
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
     * @param Payload|array{
     *   call_control_id?: string|null,
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   client_state?: string|null,
     *   connection_id?: string|null,
     *   stream_url?: string|null,
     * } $payload
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $id = null,
        EventType|string|null $event_type = null,
        ?\DateTimeInterface $occurred_at = null,
        Payload|array|null $payload = null,
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
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurred_at'] = $occurredAt;

        return $obj;
    }

    /**
     * @param Payload|array{
     *   call_control_id?: string|null,
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   client_state?: string|null,
     *   connection_id?: string|null,
     *   stream_url?: string|null,
     * } $payload
     */
    public function withPayload(Payload|array $payload): self
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
