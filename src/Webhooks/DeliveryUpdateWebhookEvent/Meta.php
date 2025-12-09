<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\DeliveryUpdateWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{attempt?: int|null, deliveredTo?: string|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Number of attempts to deliver the webhook event.
     */
    #[Optional]
    public ?int $attempt;

    /**
     * The webhook URL the event was delivered to.
     */
    #[Optional('delivered_to')]
    public ?string $deliveredTo;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $attempt = null,
        ?string $deliveredTo = null
    ): self {
        $self = new self;

        null !== $attempt && $self['attempt'] = $attempt;
        null !== $deliveredTo && $self['deliveredTo'] = $deliveredTo;

        return $self;
    }

    /**
     * Number of attempts to deliver the webhook event.
     */
    public function withAttempt(int $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * The webhook URL the event was delivered to.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $self = clone $this;
        $self['deliveredTo'] = $deliveredTo;

        return $self;
    }
}
