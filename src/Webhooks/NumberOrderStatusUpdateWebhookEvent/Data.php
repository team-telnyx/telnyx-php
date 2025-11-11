<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   event_type: string,
 *   occurred_at: \DateTimeInterface,
 *   payload: NumberOrderWithPhoneNumbers,
 *   record_type: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the event.
     */
    #[Api]
    public string $id;

    /**
     * The type of event being sent.
     */
    #[Api]
    public string $event_type;

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    #[Api]
    public \DateTimeInterface $occurred_at;

    #[Api]
    public NumberOrderWithPhoneNumbers $payload;

    /**
     * Type of record.
     */
    #[Api]
    public string $record_type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ..., event_type: ..., occurred_at: ..., payload: ..., record_type: ...
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
     */
    public static function with(
        string $id,
        string $event_type,
        \DateTimeInterface $occurred_at,
        NumberOrderWithPhoneNumbers $payload,
        string $record_type,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->event_type = $event_type;
        $obj->occurred_at = $occurred_at;
        $obj->payload = $payload;
        $obj->record_type = $record_type;

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
     * The type of event being sent.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj->event_type = $eventType;

        return $obj;
    }

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurred_at = $occurredAt;

        return $obj;
    }

    public function withPayload(NumberOrderWithPhoneNumbers $payload): self
    {
        $obj = clone $this;
        $obj->payload = $payload;

        return $obj;
    }

    /**
     * Type of record.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
