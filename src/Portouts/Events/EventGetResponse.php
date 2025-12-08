<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventGetResponse\Data;
use Telnyx\Portouts\Events\EventGetResponse\Data\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventGetResponse\Data\EventType;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutFocDateChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutNewCommentPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutStatusChangedPayload;
use Telnyx\Portouts\Events\EventGetResponse\Data\PayloadStatus;

/**
 * @phpstan-type EventGetResponseShape = array{data?: Data|null}
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

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
     *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   portout_id?: string|null,
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
     *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   portout_id?: string|null,
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
