<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Data\Payload;

/**
 * @phpstan-import-type PayloadShape from \Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Data\Payload
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   eventType: string,
 *   occurredAt: \DateTimeInterface,
 *   payload: Payload|PayloadShape,
 *   recordType: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the event.
     */
    #[Required]
    public string $id;

    /**
     * The type of event being sent.
     */
    #[Required('event_type')]
    public string $eventType;

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /**
     * Number order data delivered in a webhook. Server-generated fields are valid in this outbound webhook request.
     */
    #[Required]
    public Payload $payload;

    /**
     * Type of record.
     */
    #[Required('record_type')]
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
     * @param Payload|PayloadShape $payload
     */
    public static function with(
        string $id,
        string $eventType,
        \DateTimeInterface $occurredAt,
        Payload|array $payload,
        string $recordType,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['eventType'] = $eventType;
        $self['occurredAt'] = $occurredAt;
        $self['payload'] = $payload;
        $self['recordType'] = $recordType;

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
     * The type of event being sent.
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Number order data delivered in a webhook. Server-generated fields are valid in this outbound webhook request.
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
     * Type of record.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
