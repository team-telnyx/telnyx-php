<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\AvailableNotificationMethod;
use Telnyx\Porting\Events\EventGetResponse\Data\EventType;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderDeletedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload\Comment;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload\From;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload\PortingPhoneNumber;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload\To;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderStatusChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PayloadStatus;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type DataShape = array{
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
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the event.
     */
    #[Optional]
    public ?string $id;

    /**
     * Indicates the notification methods used.
     *
     * @var list<value-of<AvailableNotificationMethod>>|null $available_notification_methods
     */
    #[Optional(list: AvailableNotificationMethod::class)]
    public ?array $available_notification_methods;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the event type.
     *
     * @var value-of<EventType>|null $event_type
     */
    #[Optional(enum: EventType::class)]
    public ?string $event_type;

    /**
     * The webhook payload for the porting_order.deleted event.
     */
    #[Optional]
    public WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null $payload;

    /**
     * The status of the payload generation.
     *
     * @var value-of<PayloadStatus>|null $payload_status
     */
    #[Optional(enum: PayloadStatus::class)]
    public ?string $payload_status;

    /**
     * Identifies the porting order associated with the event.
     */
    #[Optional]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
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
     * @param WebhookPortingOrderDeletedPayload|array{
     *   id?: string|null,
     *   customer_reference?: string|null,
     *   deleted_at?: \DateTimeInterface|null,
     * }|WebhookPortingOrderMessagingChangedPayload|array{
     *   id?: string|null,
     *   customer_reference?: string|null,
     *   messaging?: Messaging|null,
     *   support_key?: string|null,
     * }|WebhookPortingOrderStatusChangedPayload|array{
     *   id?: string|null,
     *   customer_reference?: string|null,
     *   status?: PortingOrderStatus|null,
     *   support_key?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_url?: string|null,
     * }|WebhookPortingOrderNewCommentPayload|array{
     *   comment?: Comment|null,
     *   porting_order_id?: string|null,
     *   support_key?: string|null,
     * }|WebhookPortingOrderSplitPayload|array{
     *   from?: From|null,
     *   porting_phone_numbers?: list<PortingPhoneNumber>|null,
     *   to?: To|null,
     * } $payload
     * @param PayloadStatus|value-of<PayloadStatus> $payload_status
     */
    public static function with(
        ?string $id = null,
        ?array $available_notification_methods = null,
        ?\DateTimeInterface $created_at = null,
        EventType|string|null $event_type = null,
        WebhookPortingOrderDeletedPayload|array|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null $payload = null,
        PayloadStatus|string|null $payload_status = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $available_notification_methods && $obj['available_notification_methods'] = $available_notification_methods;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $event_type && $obj['event_type'] = $event_type;
        null !== $payload && $obj['payload'] = $payload;
        null !== $payload_status && $obj['payload_status'] = $payload_status;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
        $obj['created_at'] = $createdAt;

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
     *
     * @param WebhookPortingOrderDeletedPayload|array{
     *   id?: string|null,
     *   customer_reference?: string|null,
     *   deleted_at?: \DateTimeInterface|null,
     * }|WebhookPortingOrderMessagingChangedPayload|array{
     *   id?: string|null,
     *   customer_reference?: string|null,
     *   messaging?: Messaging|null,
     *   support_key?: string|null,
     * }|WebhookPortingOrderStatusChangedPayload|array{
     *   id?: string|null,
     *   customer_reference?: string|null,
     *   status?: PortingOrderStatus|null,
     *   support_key?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   webhook_url?: string|null,
     * }|WebhookPortingOrderNewCommentPayload|array{
     *   comment?: Comment|null,
     *   porting_order_id?: string|null,
     *   support_key?: string|null,
     * }|WebhookPortingOrderSplitPayload|array{
     *   from?: From|null,
     *   porting_phone_numbers?: list<PortingPhoneNumber>|null,
     *   to?: To|null,
     * } $payload
     */
    public function withPayload(
        WebhookPortingOrderDeletedPayload|array|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload $payload,
    ): self {
        $obj = clone $this;
        $obj['payload'] = $payload;

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
        $obj['porting_order_id'] = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
