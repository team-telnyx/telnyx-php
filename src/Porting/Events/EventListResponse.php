<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\AvailableNotificationMethod;
use Telnyx\Porting\Events\EventListResponse\EventType;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderDeletedPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderMessagingChangedPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderNewCommentPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderNewCommentPayload\Comment;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderSplitPayload;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderSplitPayload\From;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderSplitPayload\PortingPhoneNumber;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderSplitPayload\To;
use Telnyx\Porting\Events\EventListResponse\Payload\WebhookPortingOrderStatusChangedPayload;
use Telnyx\Porting\Events\EventListResponse\PayloadStatus;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type EventListResponseShape = array{
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
final class EventListResponse implements BaseModel
{
    /** @use SdkModel<EventListResponseShape> */
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $availableNotificationMethods && $self['availableNotificationMethods'] = $availableNotificationMethods;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $payload && $self['payload'] = $payload;
        null !== $payloadStatus && $self['payloadStatus'] = $payloadStatus;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
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
