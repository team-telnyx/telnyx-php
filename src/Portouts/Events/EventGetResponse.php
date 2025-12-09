<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Attributes\Optional;
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
     *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portoutID?: string|null,
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
     *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portoutID?: string|null,
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
