<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
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
final class EventGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   available_notification_methods?: list<value-of<AvailableNotificationMethod>>|null,
     *   created_at?: \DateTimeInterface|null,
     *   event_type?: value-of<EventType>|null,
     *   payload?: WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   available_notification_methods?: list<value-of<AvailableNotificationMethod>>|null,
     *   created_at?: \DateTimeInterface|null,
     *   event_type?: value-of<EventType>|null,
     *   payload?: WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
