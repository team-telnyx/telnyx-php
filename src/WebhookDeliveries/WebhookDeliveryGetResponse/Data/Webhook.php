<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Webhook\RecordType;

/**
 * Original webhook JSON data. Payload fields vary according to event type.
 *
 * @phpstan-type WebhookShape = array{
 *   id?: string|null,
 *   event_type?: string|null,
 *   occurred_at?: \DateTimeInterface|null,
 *   payload?: array<string,mixed>|null,
 *   record_type?: value-of<RecordType>|null,
 * }
 */
final class Webhook implements BaseModel
{
    /** @use SdkModel<WebhookShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The type of event being delivered.
     */
    #[Api(optional: true)]
    public ?string $event_type;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurred_at;

    /** @var array<string,mixed>|null $payload */
    #[Api(map: 'mixed', optional: true)]
    public ?array $payload;

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
     * @param array<string,mixed> $payload
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $id = null,
        ?string $event_type = null,
        ?\DateTimeInterface $occurred_at = null,
        ?array $payload = null,
        RecordType|string|null $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $event_type && $obj->event_type = $event_type;
        null !== $occurred_at && $obj->occurred_at = $occurred_at;
        null !== $payload && $obj->payload = $payload;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The type of event being delivered.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj->event_type = $eventType;

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

    /**
     * @param array<string,mixed> $payload
     */
    public function withPayload(array $payload): self
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
