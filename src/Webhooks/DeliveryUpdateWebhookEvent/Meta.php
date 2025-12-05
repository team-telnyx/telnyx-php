<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\DeliveryUpdateWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{attempt?: int|null, delivered_to?: string|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Number of attempts to deliver the webhook event.
     */
    #[Api(optional: true)]
    public ?int $attempt;

    /**
     * The webhook URL the event was delivered to.
     */
    #[Api(optional: true)]
    public ?string $delivered_to;

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
        ?string $delivered_to = null
    ): self {
        $obj = new self;

        null !== $attempt && $obj['attempt'] = $attempt;
        null !== $delivered_to && $obj['delivered_to'] = $delivered_to;

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
        $obj['delivered_to'] = $deliveredTo;

        return $obj;
    }
}
