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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
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
     * Timestamp when the event was created in the system.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The type of event being delivered.
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
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
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
