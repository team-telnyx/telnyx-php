<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\DeliveryUpdateWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type Meta1Shape = array{attempt?: int|null, deliveredTo?: string|null}
 */
final class Meta1 implements BaseModel
{
    /** @use SdkModel<Meta1Shape> */
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
        $obj = new self;

        null !== $attempt && $obj['attempt'] = $attempt;
        null !== $deliveredTo && $obj['deliveredTo'] = $deliveredTo;

        return $obj;
    }

    /**
     * Number of attempts to deliver the webhook event.
     */
    public function withAttempt(int $attempt): self
    {
        $obj = clone $this;
        $obj['attempt'] = $attempt;

        return $obj;
    }

    /**
     * The webhook URL the event was delivered to.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $obj = clone $this;
        $obj['deliveredTo'] = $deliveredTo;

        return $obj;
    }
}
