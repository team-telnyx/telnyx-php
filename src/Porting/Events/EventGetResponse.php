<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload\AvailableNotificationMethod;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload\EventType;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload\Payload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload\PayloadStatus;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventStatusChangedEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventWithoutWebhook;

/**
 * @phpstan-type EventGetResponseShape = array{
 *   data?: null|PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook,
 * }
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    #[Optional(union: Data::class)]
    public PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingEventDeletedPayload|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
     *   eventType?: value-of<EventType>|null,
     *   payload?: Payload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portingOrderID?: string|null,
     * }|PortingEventMessagingChangedPayload|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventMessagingChangedPayload\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventMessagingChangedPayload\EventType>|null,
     *   payload?: PortingEventMessagingChangedPayload\Payload|null,
     *   payloadStatus?: value-of<PortingEventMessagingChangedPayload\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventStatusChangedEvent|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventStatusChangedEvent\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventStatusChangedEvent\EventType>|null,
     *   payload?: PortingEventStatusChangedEvent\Payload|null,
     *   payloadStatus?: value-of<PortingEventStatusChangedEvent\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventNewCommentEvent|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventNewCommentEvent\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventNewCommentEvent\EventType>|null,
     *   payload?: PortingEventNewCommentEvent\Payload|null,
     *   payloadStatus?: value-of<PortingEventNewCommentEvent\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventSplitEvent|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventSplitEvent\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventSplitEvent\EventType>|null,
     *   payload?: PortingEventSplitEvent\Payload|null,
     *   payloadStatus?: value-of<PortingEventSplitEvent\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventWithoutWebhook|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventWithoutWebhook\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventWithoutWebhook\EventType>|null,
     *   payload?: null|null,
     *   payloadStatus?: value-of<PortingEventWithoutWebhook\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingEventDeletedPayload|array|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook|null $data = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingEventDeletedPayload|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
     *   eventType?: value-of<EventType>|null,
     *   payload?: Payload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portingOrderID?: string|null,
     * }|PortingEventMessagingChangedPayload|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventMessagingChangedPayload\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventMessagingChangedPayload\EventType>|null,
     *   payload?: PortingEventMessagingChangedPayload\Payload|null,
     *   payloadStatus?: value-of<PortingEventMessagingChangedPayload\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventStatusChangedEvent|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventStatusChangedEvent\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventStatusChangedEvent\EventType>|null,
     *   payload?: PortingEventStatusChangedEvent\Payload|null,
     *   payloadStatus?: value-of<PortingEventStatusChangedEvent\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventNewCommentEvent|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventNewCommentEvent\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventNewCommentEvent\EventType>|null,
     *   payload?: PortingEventNewCommentEvent\Payload|null,
     *   payloadStatus?: value-of<PortingEventNewCommentEvent\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventSplitEvent|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventSplitEvent\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventSplitEvent\EventType>|null,
     *   payload?: PortingEventSplitEvent\Payload|null,
     *   payloadStatus?: value-of<PortingEventSplitEvent\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|PortingEventWithoutWebhook|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<PortingEventWithoutWebhook\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<PortingEventWithoutWebhook\EventType>|null,
     *   payload?: null|null,
     *   payloadStatus?: value-of<PortingEventWithoutWebhook\PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(
        PortingEventDeletedPayload|array|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook $data,
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
