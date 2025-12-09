<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\OutboundMessagePayload;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data\EventType;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data\RecordType;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Meta;

/**
 * @phpstan-type DeliveryUpdateWebhookEventShape = array{
 *   data?: Data|null, meta?: Meta|null
 * }
 */
final class DeliveryUpdateWebhookEvent implements BaseModel
{
    /** @use SdkModel<DeliveryUpdateWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    #[Optional]
    public ?Meta $meta;

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
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: OutboundMessagePayload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     * @param Meta|array{attempt?: int|null, deliveredTo?: string|null} $meta
     */
    public static function with(
        Data|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: OutboundMessagePayload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{attempt?: int|null, deliveredTo?: string|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
