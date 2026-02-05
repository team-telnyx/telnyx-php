<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Meta;

/**
 * @phpstan-import-type OutboundMessageShape from \Telnyx\Webhooks\OutboundMessage
 * @phpstan-import-type MetaShape from \Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Meta
 *
 * @phpstan-type DeliveryUpdateWebhookEventShape = array{
 *   data?: null|OutboundMessage|OutboundMessageShape, meta?: null|Meta|MetaShape
 * }
 */
final class DeliveryUpdateWebhookEvent implements BaseModel
{
    /** @use SdkModel<DeliveryUpdateWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?OutboundMessage $data;

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
     * @param OutboundMessage|OutboundMessageShape|null $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        OutboundMessage|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param OutboundMessage|OutboundMessageShape $data
     */
    public function withData(OutboundMessage|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
