<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\PortingEventDeletedPayload\AvailableNotificationMethod;
use Telnyx\Porting\Events\PortingEventDeletedPayload\EventType;
use Telnyx\Porting\Events\PortingEventDeletedPayload\Payload;
use Telnyx\Porting\Events\PortingEventDeletedPayload\PayloadStatus;

/**
 * @phpstan-import-type PayloadShape from \Telnyx\Porting\Events\PortingEventDeletedPayload\Payload
 *
 * @phpstan-type PortingEventDeletedPayloadShape = array{
 *   id?: string|null,
 *   availableNotificationMethods?: list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>>|null,
 *   eventType?: null|EventType|value-of<EventType>,
 *   payload?: null|Payload|PayloadShape,
 *   payloadStatus?: null|PayloadStatus|value-of<PayloadStatus>,
 *   portingOrderID?: string|null,
 * }
 */
final class PortingEventDeletedPayload implements BaseModel
{
    /** @use SdkModel<PortingEventDeletedPayloadShape> */
    use SdkModel;

    /**
     * Uniquely identifies the event.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicates the notification methods used.
     *
     * @var list<value-of<AvailableNotificationMethod>>|null $availableNotificationMethods
     */
    #[Optional(
        'available_notification_methods',
        list: AvailableNotificationMethod::class
    )]
    public ?array $availableNotificationMethods;

    /**
     * Identifies the event type.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    #[Optional]
    public ?Payload $payload;

    /**
     * The status of the payload generation.
     *
     * @var value-of<PayloadStatus>|null $payloadStatus
     */
    #[Optional('payload_status', enum: PayloadStatus::class)]
    public ?string $payloadStatus;

    /**
     * Identifies the porting order associated with the event.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>>|null $availableNotificationMethods
     * @param EventType|value-of<EventType>|null $eventType
     * @param Payload|PayloadShape|null $payload
     * @param PayloadStatus|value-of<PayloadStatus>|null $payloadStatus
     */
    public static function with(
        ?string $id = null,
        ?array $availableNotificationMethods = null,
        EventType|string|null $eventType = null,
        Payload|array|null $payload = null,
        PayloadStatus|string|null $payloadStatus = null,
        ?string $portingOrderID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $availableNotificationMethods && $self['availableNotificationMethods'] = $availableNotificationMethods;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $payload && $self['payload'] = $payload;
        null !== $payloadStatus && $self['payloadStatus'] = $payloadStatus;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Uniquely identifies the event.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Indicates the notification methods used.
     *
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>> $availableNotificationMethods
     */
    public function withAvailableNotificationMethods(
        array $availableNotificationMethods
    ): self {
        $self = clone $this;
        $self['availableNotificationMethods'] = $availableNotificationMethods;

        return $self;
    }

    /**
     * Identifies the event type.
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
     * @param Payload|PayloadShape $payload
     */
    public function withPayload(Payload|array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    /**
     * The status of the payload generation.
     *
     * @param PayloadStatus|value-of<PayloadStatus> $payloadStatus
     */
    public function withPayloadStatus(PayloadStatus|string $payloadStatus): self
    {
        $self = clone $this;
        $self['payloadStatus'] = $payloadStatus;

        return $self;
    }

    /**
     * Identifies the porting order associated with the event.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }
}
