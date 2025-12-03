<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Porting\Events\EventListResponse\AvailableNotificationMethod;
use Telnyx\Porting\Events\EventListResponse\EventType;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderDeletedPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderMessagingChangedPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderNewCommentPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderSplitPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderStatusChangedPayload;
use Telnyx\Porting\Events\EventListResponse\PayloadStatus;

/**
 * @phpstan-type EventListResponseShape = array{
 *   id?: string|null,
 *   available_notification_methods?: list<value-of<AvailableNotificationMethod>>|null,
 *   created_at?: \DateTimeInterface|null,
 *   event_type?: value-of<EventType>|null,
 *   payload?: null|WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload,
 *   payload_status?: value-of<PayloadStatus>|null,
 *   porting_order_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class EventListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<EventListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Uniquely identifies the event.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Indicates the notification methods used.
     *
     * @var list<value-of<AvailableNotificationMethod>>|null $available_notification_methods
     */
    #[Api(list: AvailableNotificationMethod::class, optional: true)]
    public ?array $available_notification_methods;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the event type.
     *
     * @var value-of<EventType>|null $event_type
     */
    #[Api(enum: EventType::class, optional: true)]
    public ?string $event_type;

    /**
     * The webhook payload for the porting_order.deleted event.
     */
    #[Api(optional: true)]
    public WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null $payload;

    /**
     * The status of the payload generation.
     *
     * @var value-of<PayloadStatus>|null $payload_status
     */
    #[Api(enum: PayloadStatus::class, optional: true)]
    public ?string $payload_status;

    /**
     * Identifies the porting order associated with the event.
     */
    #[Api(optional: true)]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>> $available_notification_methods
     * @param EventType|value-of<EventType> $event_type
     * @param PayloadStatus|value-of<PayloadStatus> $payload_status
     */
    public static function with(
        ?string $id = null,
        ?array $available_notification_methods = null,
        ?\DateTimeInterface $created_at = null,
        EventType|string|null $event_type = null,
        WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null $payload = null,
        PayloadStatus|string|null $payload_status = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $available_notification_methods && $obj['available_notification_methods'] = $available_notification_methods;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $event_type && $obj['event_type'] = $event_type;
        null !== $payload && $obj->payload = $payload;
        null !== $payload_status && $obj['payload_status'] = $payload_status;
        null !== $porting_order_id && $obj->porting_order_id = $porting_order_id;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

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
        $obj['available_notification_methods'] = $availableNotificationMethods;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

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
        $obj['event_type'] = $eventType;

        return $obj;
    }

    /**
     * The webhook payload for the porting_order.deleted event.
     */
    public function withPayload(
        WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload $payload,
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
        $obj['payload_status'] = $payloadStatus;

        return $obj;
    }

    /**
     * Identifies the porting order associated with the event.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->porting_order_id = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
