<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\EventType;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\RecordType;

/**
 * @phpstan-import-type PayloadShape from \Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   eventType?: null|EventType|value-of<EventType>,
 *   occurredAt?: \DateTimeInterface|null,
 *   payload?: null|Payload|PayloadShape,
 *   recordType?: null|RecordType|value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the event.
     */
    #[Optional]
    public ?string $id;

    /**
     * The type of event being delivered. Internal transfer events are only emitted for orders where the numbers are already active on another Telnyx account.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    /**
     * ISO 8601 formatted date indicating when the event was generated.
     */
    #[Optional('occurred_at')]
    public ?\DateTimeInterface $occurredAt;

    /**
     * Payload delivered with every messaging_hosted_numbers_orders.* event. `approval_deadline` and `decision` are meaningful only for `internal_transfer_*` events.
     */
    #[Optional]
    public ?Payload $payload;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
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
     * @param EventType|value-of<EventType>|null $eventType
     * @param Payload|PayloadShape|null $payload
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        EventType|string|null $eventType = null,
        ?\DateTimeInterface $occurredAt = null,
        Payload|array|null $payload = null,
        RecordType|string|null $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;
        null !== $payload && $self['payload'] = $payload;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique identifier for the event.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of event being delivered. Internal transfer events are only emitted for orders where the numbers are already active on another Telnyx account.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the event was generated.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Payload delivered with every messaging_hosted_numbers_orders.* event. `approval_deadline` and `decision` are meaningful only for `internal_transfer_*` events.
     *
     * @param Payload|PayloadShape $payload
     */
    public function withPayload(Payload|array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
