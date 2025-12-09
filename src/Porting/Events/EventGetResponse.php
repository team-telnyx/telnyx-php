<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data;
use Telnyx\Porting\Events\EventGetResponse\Data\AvailableNotificationMethod;
use Telnyx\Porting\Events\EventGetResponse\Data\EventType;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderDeletedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderStatusChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PayloadStatus;

/**
 * @phpstan-type EventGetResponseShape = array{data?: Data|null}
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<EventType>|null,
     *   payload?: WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<EventType>|null,
     *   payload?: WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
