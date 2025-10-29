<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent\Data\EventType;
use Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent\Data\Payload;
use Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   eventType?: value-of<EventType>,
 *   payload?: Payload,
 *   recordType?: value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The type of event being delivered.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Api('event_type', enum: EventType::class, optional: true)]
    public ?string $eventType;

    #[Api(optional: true)]
    public ?Payload $payload;

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
     * @param EventType|value-of<EventType> $eventType
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $id = null,
        EventType|string|null $eventType = null,
        ?Payload $payload = null,
        RecordType|string|null $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $payload && $obj->payload = $payload;
        null !== $recordType && $obj['recordType'] = $recordType;

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
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    public function withPayload(Payload $payload): self
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
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
