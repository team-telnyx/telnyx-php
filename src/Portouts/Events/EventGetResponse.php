<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventGetResponse\Data;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutFocDateChanged;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutNewComment;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\EventType;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\Payload;
use Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged\PayloadStatus;

/**
 * @phpstan-type EventGetResponseShape = array{
 *   data?: null|WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged,
 * }
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    #[Optional(union: Data::class)]
    public WebhookPortoutStatusChanged|WebhookPortoutNewComment|WebhookPortoutFocDateChanged|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WebhookPortoutStatusChanged|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<EventType>|null,
     *   payload?: Payload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|WebhookPortoutNewComment|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<WebhookPortoutNewComment\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<WebhookPortoutNewComment\EventType>|null,
     *   payload?: WebhookPortoutNewComment\Payload|null,
     *   payloadStatus?: value-of<WebhookPortoutNewComment\PayloadStatus>|null,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|WebhookPortoutFocDateChanged|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<WebhookPortoutFocDateChanged\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<WebhookPortoutFocDateChanged\EventType>|null,
     *   payload?: WebhookPortoutFocDateChanged\Payload|null,
     *   payloadStatus?: value-of<WebhookPortoutFocDateChanged\PayloadStatus>|null,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        WebhookPortoutStatusChanged|array|WebhookPortoutNewComment|WebhookPortoutFocDateChanged|null $data = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WebhookPortoutStatusChanged|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<EventType>|null,
     *   payload?: Payload|null,
     *   payloadStatus?: value-of<PayloadStatus>|null,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|WebhookPortoutNewComment|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<WebhookPortoutNewComment\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<WebhookPortoutNewComment\EventType>|null,
     *   payload?: WebhookPortoutNewComment\Payload|null,
     *   payloadStatus?: value-of<WebhookPortoutNewComment\PayloadStatus>|null,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }|WebhookPortoutFocDateChanged|array{
     *   id?: string|null,
     *   availableNotificationMethods?: list<value-of<WebhookPortoutFocDateChanged\AvailableNotificationMethod>>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eventType?: value-of<WebhookPortoutFocDateChanged\EventType>|null,
     *   payload?: WebhookPortoutFocDateChanged\Payload|null,
     *   payloadStatus?: value-of<WebhookPortoutFocDateChanged\PayloadStatus>|null,
     *   portoutID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(
        WebhookPortoutStatusChanged|array|WebhookPortoutNewComment|WebhookPortoutFocDateChanged $data,
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
