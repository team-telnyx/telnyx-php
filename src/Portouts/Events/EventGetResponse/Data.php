<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventGetResponse\Data\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventGetResponse\Data\EventType;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutFocDateChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutNewCommentPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutStatusChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\PayloadStatus;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>,
 *   createdAt?: \DateTimeInterface,
 *   eventType?: value-of<EventType>,
 *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload,
 *   payloadStatus?: value-of<PayloadStatus>,
 *   portoutID?: string,
 *   recordType?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Uniquely identifies the event.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicates the notification methods used.
     *
     * @var list<value-of<AvailableNotificationMethod>>|null $availableNotificationMethods
     */
    #[Api(
        'available_notification_methods',
        list: AvailableNotificationMethod::class,
        optional: true,
    )]
    public ?array $availableNotificationMethods;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the event type.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Api('event_type', enum: EventType::class, optional: true)]
    public ?string $eventType;

    /**
     * The webhook payload for the portout.status_changed event.
     */
    #[Api(optional: true)]
    public WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null $payload;

    /**
     * The status of the payload generation.
     *
     * @var value-of<PayloadStatus>|null $payloadStatus
     */
    #[Api('payload_status', enum: PayloadStatus::class, optional: true)]
    public ?string $payloadStatus;

    /**
     * Identifies the port-out order associated with the event.
     */
    #[Api('portout_id', optional: true)]
    public ?string $portoutID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>> $availableNotificationMethods
     * @param EventType|value-of<EventType> $eventType
     * @param PayloadStatus|value-of<PayloadStatus> $payloadStatus
     */
    public static function with(
        ?string $id = null,
        ?array $availableNotificationMethods = null,
        ?\DateTimeInterface $createdAt = null,
        EventType|string|null $eventType = null,
        WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null $payload = null,
        PayloadStatus|string|null $payloadStatus = null,
        ?string $portoutID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $availableNotificationMethods && $obj->availableNotificationMethods = array_map(fn ($v) => $v instanceof AvailableNotificationMethod ? $v->value : $v, $availableNotificationMethods);
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $eventType && $obj->eventType = $eventType instanceof EventType ? $eventType->value : $eventType;
        null !== $payload && $obj->payload = $payload;
        null !== $payloadStatus && $obj->payloadStatus = $payloadStatus instanceof PayloadStatus ? $payloadStatus->value : $payloadStatus;
        null !== $portoutID && $obj->portoutID = $portoutID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Indicates the notification methods used.
     *
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>> $availableNotificationMethods
     */
    public function withAvailableNotificationMethods(
        array $availableNotificationMethods
    ): self {
        $obj = clone $this;
        $obj->availableNotificationMethods = array_map(fn ($v) => $v instanceof AvailableNotificationMethod ? $v->value : $v, $availableNotificationMethods);

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the event type.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj->eventType = $eventType instanceof EventType ? $eventType->value : $eventType;

        return $obj;
    }

    /**
     * The webhook payload for the portout.status_changed event.
     */
    public function withPayload(
        WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload $payload,
    ): self {
        $obj = clone $this;
        $obj->payload = $payload;

        return $obj;
    }

    /**
     * The status of the payload generation.
     *
     * @param PayloadStatus|value-of<PayloadStatus> $payloadStatus
     */
    public function withPayloadStatus(PayloadStatus|string $payloadStatus): self
    {
        $obj = clone $this;
        $obj->payloadStatus = $payloadStatus instanceof PayloadStatus ? $payloadStatus->value : $payloadStatus;

        return $obj;
    }

    /**
     * Identifies the port-out order associated with the event.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj->portoutID = $portoutID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
