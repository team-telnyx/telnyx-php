<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortoutEventVariants from \Telnyx\Portouts\Events\PortoutEvent
 * @phpstan-import-type PortoutEventShape from \Telnyx\Portouts\Events\PortoutEvent
 *
 * @phpstan-type EventGetResponseShape = array{data?: PortoutEventShape|null}
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    /** @var PortoutEventVariants|null $data */
    #[Optional(union: PortoutEvent::class)]
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
     * @param PortoutEventShape|null $data
     */
    public static function with(
        WebhookPortoutStatusChanged|array|WebhookPortoutNewComment|WebhookPortoutFocDateChanged|null $data = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortoutEventShape $data
     */
    public function withData(
        WebhookPortoutStatusChanged|array|WebhookPortoutNewComment|WebhookPortoutFocDateChanged $data,
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
