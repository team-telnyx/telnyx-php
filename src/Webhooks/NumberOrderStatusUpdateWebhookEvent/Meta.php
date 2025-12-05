<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{attempt: int, delivered_to: string}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Webhook delivery attempt number.
     */
    #[Api]
    public int $attempt;

    /**
     * URL where the webhook was delivered.
     */
    #[Api]
    public string $delivered_to;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(attempt: ..., delivered_to: ...)
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
    public static function with(int $attempt, string $delivered_to): self
    {
        $obj = new self;

        $obj['attempt'] = $attempt;
        $obj['delivered_to'] = $delivered_to;

        return $obj;
    }

    /**
     * Webhook delivery attempt number.
     */
    public function withAttempt(int $attempt): self
    {
        $obj = clone $this;
        $obj['attempt'] = $attempt;

        return $obj;
    }

    /**
     * URL where the webhook was delivered.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $obj = clone $this;
        $obj['delivered_to'] = $deliveredTo;

        return $obj;
    }
}
