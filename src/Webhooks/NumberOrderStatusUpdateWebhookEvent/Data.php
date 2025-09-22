<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers;

/**
 * @phpstan-type data_alias = array{
 *   id: string,
 *   eventType: string,
 *   occurredAt: \DateTimeInterface,
 *   payload: NumberOrderWithPhoneNumbers,
 *   recordType: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Unique identifier for the event.
     */
    #[Api]
    public string $id;

    /**
     * The type of event being sent.
     */
    #[Api('event_type')]
    public string $eventType;

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    #[Api('occurred_at')]
    public \DateTimeInterface $occurredAt;

    #[Api]
    public NumberOrderWithPhoneNumbers $payload;

    /**
     * Type of record.
     */
    #[Api('record_type')]
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
     */
    public static function with(
        string $id,
        string $eventType,
        \DateTimeInterface $occurredAt,
        NumberOrderWithPhoneNumbers $payload,
        string $recordType,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->eventType = $eventType;
        $obj->occurredAt = $occurredAt;
        $obj->payload = $payload;
        $obj->recordType = $recordType;

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
        $obj->eventType = $eventType;

        return $obj;
    }

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurredAt = $occurredAt;

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
        $obj->recordType = $recordType;

        return $obj;
    }
}
