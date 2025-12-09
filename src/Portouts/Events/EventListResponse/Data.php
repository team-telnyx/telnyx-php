<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListResponse\Data\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventListResponse\Data\EventType;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutFocDateChangedPayload;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutNewCommentPayload;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutStatusChangedPayload;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutStatusChangedPayload\Status;
use Telnyx\Portouts\Events\EventListResponse\Data\PayloadStatus;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   eventType?: value-of<EventType>|null,
 *   payload?: null|WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload,
 *   payloadStatus?: value-of<PayloadStatus>|null,
 *   portoutID?: string|null,
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
     * The webhook payload for the portout.status_changed event.
     */
    #[Optional]
    public WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null $payload;

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
     * @param list<AvailableNotificationMethod|value-of<AvailableNotificationMethod>> $availableNotificationMethods
     * @param EventType|value-of<EventType> $eventType
     * @param WebhookPortoutStatusChangedPayload|array{
     *   id?: string|null,
     *   attemptedPin?: string|null,
     *   carrierName?: string|null,
     *   phoneNumbers?: list<string>|null,
     *   rejectionReason?: string|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   subscriberName?: string|null,
     *   userID?: string|null,
     * }|WebhookPortoutNewCommentPayload|array{
     *   id?: string|null,
     *   comment?: string|null,
     *   portoutID?: string|null,
     *   userID?: string|null,
     * }|WebhookPortoutFocDateChangedPayload|array{
     *   id?: string|null, focDate?: \DateTimeInterface|null, userID?: string|null
     * } $payload
     * @param PayloadStatus|value-of<PayloadStatus> $payloadStatus
     */
    public static function with(
        ?string $id = null,
        ?array $availableNotificationMethods = null,
        ?\DateTimeInterface $createdAt = null,
        EventType|string|null $eventType = null,
        WebhookPortoutStatusChangedPayload|array|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null $payload = null,
        PayloadStatus|string|null $payloadStatus = null,
        ?string $portoutID = null,
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
        null !== $portoutID && $obj['portoutID'] = $portoutID;
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
     * The webhook payload for the portout.status_changed event.
     *
     * @param WebhookPortoutStatusChangedPayload|array{
     *   id?: string|null,
     *   attemptedPin?: string|null,
     *   carrierName?: string|null,
     *   phoneNumbers?: list<string>|null,
     *   rejectionReason?: string|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   subscriberName?: string|null,
     *   userID?: string|null,
     * }|WebhookPortoutNewCommentPayload|array{
     *   id?: string|null,
     *   comment?: string|null,
     *   portoutID?: string|null,
     *   userID?: string|null,
     * }|WebhookPortoutFocDateChangedPayload|array{
     *   id?: string|null, focDate?: \DateTimeInterface|null, userID?: string|null
     * } $payload
     */
    public function withPayload(
        WebhookPortoutStatusChangedPayload|array|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload $payload,
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
     * Identifies the port-out order associated with the event.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj['portoutID'] = $portoutID;

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
