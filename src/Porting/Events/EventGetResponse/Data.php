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
 *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   eventType?: value-of<EventType>|null,
 *   payload?: null|WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload,
 *   payloadStatus?: value-of<PayloadStatus>|null,
 *   portingOrderID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
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
     * The webhook payload for the porting_order.deleted event.
     */
    #[Optional]
    public WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null $payload;

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
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>> $availableNotificationMethods
     * @param EventType|value-of<EventType> $eventType
     * @param WebhookPortingOrderDeletedPayload|array{
     *   id?: string|null,
     *   customerReference?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     * }|WebhookPortingOrderMessagingChangedPayload|array{
     *   id?: string|null,
     *   customerReference?: string|null,
     *   messaging?: Messaging|null,
     *   supportKey?: string|null,
     * }|WebhookPortingOrderStatusChangedPayload|array{
     *   id?: string|null,
     *   customerReference?: string|null,
     *   status?: PortingOrderStatus|null,
     *   supportKey?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookURL?: string|null,
     * }|WebhookPortingOrderNewCommentPayload|array{
     *   comment?: Comment|null, portingOrderID?: string|null, supportKey?: string|null
     * }|WebhookPortingOrderSplitPayload|array{
     *   from?: From|null,
     *   portingPhoneNumbers?: list<PortingPhoneNumber>|null,
     *   to?: To|null,
     * } $payload
     * @param PayloadStatus|value-of<PayloadStatus> $payloadStatus
     */
    public static function with(
        ?string $id = null,
        ?array $availableNotificationMethods = null,
        ?\DateTimeInterface $createdAt = null,
        EventType|string|null $eventType = null,
        WebhookPortingOrderDeletedPayload|array|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null $payload = null,
        PayloadStatus|string|null $payloadStatus = null,
        ?string $portingOrderID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $availableNotificationMethods && $obj['availableNotificationMethods'] = $availableNotificationMethods;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $payload && $obj['payload'] = $payload;
        null !== $payloadStatus && $obj['payloadStatus'] = $payloadStatus;
        null !== $portingOrderID && $obj['portingOrderID'] = $portingOrderID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
        $obj['availableNotificationMethods'] = $availableNotificationMethods;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * The webhook payload for the porting_order.deleted event.
     *
     * @param WebhookPortingOrderDeletedPayload|array{
     *   id?: string|null,
     *   customerReference?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     * }|WebhookPortingOrderMessagingChangedPayload|array{
     *   id?: string|null,
     *   customerReference?: string|null,
     *   messaging?: Messaging|null,
     *   supportKey?: string|null,
     * }|WebhookPortingOrderStatusChangedPayload|array{
     *   id?: string|null,
     *   customerReference?: string|null,
     *   status?: PortingOrderStatus|null,
     *   supportKey?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookURL?: string|null,
     * }|WebhookPortingOrderNewCommentPayload|array{
     *   comment?: Comment|null, portingOrderID?: string|null, supportKey?: string|null
     * }|WebhookPortingOrderSplitPayload|array{
     *   from?: From|null,
     *   portingPhoneNumbers?: list<PortingPhoneNumber>|null,
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
        $obj['payloadStatus'] = $payloadStatus;

        return $obj;
    }

    /**
     * Identifies the porting order associated with the event.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['portingOrderID'] = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
