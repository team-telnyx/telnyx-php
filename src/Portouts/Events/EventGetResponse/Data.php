<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventGetResponse\Data\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventGetResponse\Data\EventType;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutFocDateChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutNewCommentPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutStatusChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutStatusChangedPayload\Status;
use Telnyx\Portouts\Events\EventGetResponse\Data\PayloadStatus;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   available_notification_methods?: list<value-of<AvailableNotificationMethod>>|null,
 *   created_at?: \DateTimeInterface|null,
 *   event_type?: value-of<EventType>|null,
 *   payload?: null|WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload,
 *   payload_status?: value-of<PayloadStatus>|null,
 *   portout_id?: string|null,
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
     * The webhook payload for the portout.status_changed event.
     */
    #[Optional]
    public WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null $payload;

    /**
     * The status of the payload generation.
     *
     * @var value-of<PayloadStatus>|null $payload_status
     */
    #[Optional(enum: PayloadStatus::class)]
    public ?string $payload_status;

    /**
     * Identifies the port-out order associated with the event.
     */
    #[Optional]
    public ?string $portout_id;

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
     * @param WebhookPortoutStatusChangedPayload|array{
     *   id?: string|null,
     *   attempted_pin?: string|null,
     *   carrier_name?: string|null,
     *   phone_numbers?: list<string>|null,
     *   rejection_reason?: string|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   subscriber_name?: string|null,
     *   user_id?: string|null,
     * }|WebhookPortoutNewCommentPayload|array{
     *   id?: string|null,
     *   comment?: string|null,
     *   portout_id?: string|null,
     *   user_id?: string|null,
     * }|WebhookPortoutFocDateChangedPayload|array{
     *   id?: string|null, foc_date?: \DateTimeInterface|null, user_id?: string|null
     * } $payload
     * @param PayloadStatus|value-of<PayloadStatus> $payload_status
     */
    public static function with(
        ?string $id = null,
        ?array $available_notification_methods = null,
        ?\DateTimeInterface $created_at = null,
        EventType|string|null $event_type = null,
        WebhookPortoutStatusChangedPayload|array|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null $payload = null,
        PayloadStatus|string|null $payload_status = null,
        ?string $portout_id = null,
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
        null !== $portout_id && $obj['portout_id'] = $portout_id;
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
     * The webhook payload for the portout.status_changed event.
     *
     * @param WebhookPortoutStatusChangedPayload|array{
     *   id?: string|null,
     *   attempted_pin?: string|null,
     *   carrier_name?: string|null,
     *   phone_numbers?: list<string>|null,
     *   rejection_reason?: string|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   subscriber_name?: string|null,
     *   user_id?: string|null,
     * }|WebhookPortoutNewCommentPayload|array{
     *   id?: string|null,
     *   comment?: string|null,
     *   portout_id?: string|null,
     *   user_id?: string|null,
     * }|WebhookPortoutFocDateChangedPayload|array{
     *   id?: string|null, foc_date?: \DateTimeInterface|null, user_id?: string|null
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
        $obj['payload_status'] = $payloadStatus;

        return $obj;
    }

    /**
     * Identifies the port-out order associated with the event.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj['portout_id'] = $portoutID;

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
