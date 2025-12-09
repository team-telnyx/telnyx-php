<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\EventType;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\Payload;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\Payload\Direction;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\Payload\Status;
use Telnyx\Webhooks\FaxDeliveredWebhookEvent\RecordType;

/**
 * @phpstan-type FaxDeliveredWebhookEventShape = array{
 *   id?: string|null,
 *   eventType?: value-of<EventType>|null,
 *   payload?: Payload|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class FaxDeliveredWebhookEvent implements BaseModel
{
    /** @use SdkModel<FaxDeliveredWebhookEventShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The type of event being delivered.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

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
     * @param EventType|value-of<EventType> $eventType
     * @param Payload|array{
     *   callDurationSecs?: int|null,
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   direction?: value-of<Direction>|null,
     *   faxID?: string|null,
     *   from?: string|null,
     *   mediaName?: string|null,
     *   originalMediaURL?: string|null,
     *   pageCount?: int|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   userID?: string|null,
     * } $payload
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $id = null,
        EventType|string|null $eventType = null,
        Payload|array|null $payload = null,
        RecordType|string|null $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $payload && $obj['payload'] = $payload;
        null !== $recordType && $obj['recordType'] = $recordType;

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
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * @param Payload|array{
     *   callDurationSecs?: int|null,
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   direction?: value-of<Direction>|null,
     *   faxID?: string|null,
     *   from?: string|null,
     *   mediaName?: string|null,
     *   originalMediaURL?: string|null,
     *   pageCount?: int|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   userID?: string|null,
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
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
