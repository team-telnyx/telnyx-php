<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\EventType;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\Payload;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\PayloadStatus;

/**
 * @phpstan-import-type PayloadShape from \Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\Payload
 *
 * @phpstan-type WebhookPortoutStatusChangedShape = array{
 *   id?: string|null,
 *   availableNotificationMethods?: list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   eventType?: null|EventType|value-of<EventType>,
 *   payload?: null|Payload|PayloadShape,
 *   payloadStatus?: null|PayloadStatus|value-of<PayloadStatus>,
 *   portoutID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class WebhookPortoutStatusChanged implements BaseModel
{
    /** @use SdkModel<WebhookPortoutStatusChangedShape> */
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
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the event type.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    /**
     * The webhook payload for the portout.status_changed event.
     */
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
     * Identifies the port-out order associated with the event.
     */
    #[Optional('portout_id')]
    public ?string $portoutID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
        ?\DateTimeInterface $createdAt = null,
        EventType|string|null $eventType = null,
        Payload|array|null $payload = null,
        PayloadStatus|string|null $payloadStatus = null,
        ?string $portoutID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $availableNotificationMethods && $self['availableNotificationMethods'] = $availableNotificationMethods;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $payload && $self['payload'] = $payload;
        null !== $payloadStatus && $self['payloadStatus'] = $payloadStatus;
        null !== $portoutID && $self['portoutID'] = $portoutID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * The webhook payload for the portout.status_changed event.
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
     * Identifies the port-out order associated with the event.
     */
    public function withPortoutID(string $portoutID): self
    {
        $self = clone $this;
        $self['portoutID'] = $portoutID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
