<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type Meta1Shape = array{attempt: int, deliveredTo: string}
 */
final class Meta1 implements BaseModel
{
    /** @use SdkModel<Meta1Shape> */
    use SdkModel;

    /**
     * Webhook delivery attempt number.
     */
    #[Required]
    public int $attempt;

    /**
     * URL where the webhook was delivered.
     */
    #[Required('delivered_to')]
    public string $deliveredTo;

    /**
     * `new Meta1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta1::with(attempt: ..., deliveredTo: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta1)->withAttempt(...)->withDeliveredTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $attempt, string $deliveredTo): self
    {
        $self = new self;

        $self['attempt'] = $attempt;
        $self['deliveredTo'] = $deliveredTo;

        return $self;
    }

    /**
     * Webhook delivery attempt number.
     */
    public function withAttempt(int $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * URL where the webhook was delivered.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $self = clone $this;
        $self['deliveredTo'] = $deliveredTo;

        return $self;
    }
}
