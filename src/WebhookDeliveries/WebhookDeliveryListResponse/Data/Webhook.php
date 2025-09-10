<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Webhook\RecordType;

/**
 * Original webhook JSON data. Payload fields vary according to event type.
 *
 * @phpstan-type webhook_alias = array{
 *   id?: string|null,
 *   eventType?: string|null,
 *   occurredAt?: \DateTimeInterface|null,
 *   payload?: mixed,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class Webhook implements BaseModel
{
    /** @use SdkModel<webhook_alias> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The type of event being delivered.
     */
    #[Api('event_type', optional: true)]
    public ?string $eventType;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Api('occurred_at', optional: true)]
    public ?\DateTimeInterface $occurredAt;

    #[Api(optional: true)]
    public mixed $payload;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $id = null,
        ?string $eventType = null,
        ?\DateTimeInterface $occurredAt = null,
        mixed $payload = null,
        RecordType|string|null $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $occurredAt && $obj->occurredAt = $occurredAt;
        null !== $payload && $obj->payload = $payload;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

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
        $obj->eventType = $eventType;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurredAt = $occurredAt;

        return $obj;
    }

    public function withPayload(mixed $payload): self
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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }
}
