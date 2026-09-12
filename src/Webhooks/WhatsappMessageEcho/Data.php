<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\EventType;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;
use Telnyx\Webhooks\WhatsappMessageEcho\Data\RecordType;

/**
 * @phpstan-import-type PayloadShape from \Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   eventType: EventType|value-of<EventType>,
 *   occurredAt: \DateTimeInterface,
 *   payload: Payload|PayloadShape,
 *   recordType: RecordType|value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var value-of<EventType> $eventType */
    #[Required('event_type', enum: EventType::class)]
    public string $eventType;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    #[Required]
    public Payload $payload;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ..., eventType: ..., occurredAt: ..., payload: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withEventType(...)
     *   ->withOccurredAt(...)
     *   ->withPayload(...)
     *   ->withRecordType(...)
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
     * @param EventType|value-of<EventType> $eventType
     * @param Payload|PayloadShape $payload
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        EventType|string $eventType,
        \DateTimeInterface $occurredAt,
        Payload|array $payload,
        RecordType|string $recordType,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['eventType'] = $eventType;
        $self['occurredAt'] = $occurredAt;
        $self['payload'] = $payload;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * @param Payload|PayloadShape $payload
     */
    public function withPayload(Payload|array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
