<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEndedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\EventType;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\Payload;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\Payload\CallingPartyType;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data1\RecordType;

/**
 * @phpstan-type Data1Shape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   eventType?: value-of<EventType>|null,
 *   occurredAt?: \DateTimeInterface|null,
 *   payload?: Payload|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class Data1 implements BaseModel
{
    /** @use SdkModel<Data1Shape> */
    use SdkModel;

    /**
     * Unique identifier for the event.
     */
    #[Optional]
    public ?string $id;

    /**
     * Timestamp when the event was created in the system.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The type of event being delivered.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Optional('occurred_at')]
    public ?\DateTimeInterface $occurredAt;

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
     *   assistantID?: string|null,
     *   callControlID?: string|null,
     *   callLegID?: string|null,
     *   callSessionID?: string|null,
     *   callingPartyType?: value-of<CallingPartyType>|null,
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   conversationID?: string|null,
     *   durationSec?: int|null,
     *   from?: string|null,
     *   llmModel?: string|null,
     *   sttModel?: string|null,
     *   to?: string|null,
     *   ttsModelID?: string|null,
     *   ttsProvider?: string|null,
     *   ttsVoiceID?: string|null,
     * } $payload
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        EventType|string|null $eventType = null,
        ?\DateTimeInterface $occurredAt = null,
        Payload|array|null $payload = null,
        RecordType|string|null $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $occurredAt && $obj['occurredAt'] = $occurredAt;
        null !== $payload && $obj['payload'] = $payload;
        null !== $recordType && $obj['recordType'] = $recordType;

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
     * Timestamp when the event was created in the system.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurredAt'] = $occurredAt;

        return $obj;
    }

    /**
     * @param Payload|array{
     *   assistantID?: string|null,
     *   callControlID?: string|null,
     *   callLegID?: string|null,
     *   callSessionID?: string|null,
     *   callingPartyType?: value-of<CallingPartyType>|null,
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   conversationID?: string|null,
     *   durationSec?: int|null,
     *   from?: string|null,
     *   llmModel?: string|null,
     *   sttModel?: string|null,
     *   to?: string|null,
     *   ttsModelID?: string|null,
     *   ttsProvider?: string|null,
     *   ttsVoiceID?: string|null,
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
