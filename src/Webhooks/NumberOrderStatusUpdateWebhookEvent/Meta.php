<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{attempt: int, deliveredTo: string}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
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
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(attempt: ..., deliveredTo: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withAttempt(...)->withDeliveredTo(...)
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
