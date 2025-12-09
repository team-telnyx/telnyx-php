<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\EventType;
use Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\Payload;
use Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\Payload\Direction;
use Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\Payload\Status;
use Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\RecordType;

/**
 * @phpstan-type FaxMediaProcessedWebhookEventShape = array{
 *   id?: string|null,
 *   eventType?: value-of<EventType>|null,
 *   payload?: Payload|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class FaxMediaProcessedWebhookEvent implements BaseModel
{
    /** @use SdkModel<FaxMediaProcessedWebhookEventShape> */
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
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   direction?: value-of<Direction>|null,
     *   faxID?: string|null,
     *   from?: string|null,
     *   mediaName?: string|null,
     *   originalMediaURL?: string|null,
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $payload && $self['payload'] = $payload;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * @param Payload|array{
     *   clientState?: string|null,
     *   connectionID?: string|null,
     *   direction?: value-of<Direction>|null,
     *   faxID?: string|null,
     *   from?: string|null,
     *   mediaName?: string|null,
     *   originalMediaURL?: string|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   userID?: string|null,
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
