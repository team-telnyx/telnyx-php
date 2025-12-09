<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers\Status;
use Telnyx\NumberOrders\PhoneNumber;

/**
 * @phpstan-type Data1Shape = array{
 *   id: string,
 *   eventType: string,
 *   occurredAt: \DateTimeInterface,
 *   payload: NumberOrderWithPhoneNumbers,
 *   recordType: string,
 * }
 */
final class Data1 implements BaseModel
{
    /** @use SdkModel<Data1Shape> */
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

    #[Required]
    public NumberOrderWithPhoneNumbers $payload;

    /**
     * Type of record.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * `new Data1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data1::with(
     *   id: ..., eventType: ..., occurredAt: ..., payload: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data1)
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
     * @param NumberOrderWithPhoneNumbers|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrdersIDs?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $payload
     */
    public static function with(
        string $id,
        string $eventType,
        \DateTimeInterface $occurredAt,
        NumberOrderWithPhoneNumbers|array $payload,
        string $recordType,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['eventType'] = $eventType;
        $obj['occurredAt'] = $occurredAt;
        $obj['payload'] = $payload;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Unique identifier for the event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The type of event being sent.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * ISO 8601 timestamp of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurredAt'] = $occurredAt;

        return $obj;
    }

    /**
     * @param NumberOrderWithPhoneNumbers|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrdersIDs?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $payload
     */
    public function withPayload(
        NumberOrderWithPhoneNumbers|array $payload
    ): self {
        $obj = clone $this;
        $obj['payload'] = $payload;

        return $obj;
    }

    /**
     * Type of record.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
