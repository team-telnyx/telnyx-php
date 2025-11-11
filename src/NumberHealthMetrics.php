<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * High level health metrics about the number and it's messaging sending patterns.
 *
 * @phpstan-type NumberHealthMetricsShape = array{
 *   inbound_outbound_ratio: float,
 *   message_count: int,
 *   spam_ratio: float,
 *   success_ratio: float,
 * }
 */
final class NumberHealthMetrics implements BaseModel
{
    /** @use SdkModel<NumberHealthMetricsShape> */
    use SdkModel;

    /**
     * The ratio of messages received to the number of messages sent.
     */
    #[Api]
    public float $inbound_outbound_ratio;

    /**
     * The number of messages analyzed for the health metrics.
     */
    #[Api]
    public int $message_count;

    /**
     * The ratio of messages blocked for spam to the number of messages attempted.
     */
    #[Api]
    public float $spam_ratio;

    /**
     * The ratio of messages sucessfully delivered to the number of messages attempted.
     */
    #[Api]
    public float $success_ratio;

    /**
     * `new NumberHealthMetrics()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberHealthMetrics::with(
     *   inbound_outbound_ratio: ...,
     *   message_count: ...,
     *   spam_ratio: ...,
     *   success_ratio: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberHealthMetrics)
     *   ->withInboundOutboundRatio(...)
     *   ->withMessageCount(...)
     *   ->withSpamRatio(...)
     *   ->withSuccessRatio(...)
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
    public static function with(
        float $inbound_outbound_ratio,
        int $message_count,
        float $spam_ratio,
        float $success_ratio,
    ): self {
        $obj = new self;

        $obj->inbound_outbound_ratio = $inbound_outbound_ratio;
        $obj->message_count = $message_count;
        $obj->spam_ratio = $spam_ratio;
        $obj->success_ratio = $success_ratio;

        return $obj;
    }

    /**
     * The ratio of messages received to the number of messages sent.
     */
    public function withInboundOutboundRatio(float $inboundOutboundRatio): self
    {
        $obj = clone $this;
        $obj->inbound_outbound_ratio = $inboundOutboundRatio;

        return $obj;
    }

    /**
     * The number of messages analyzed for the health metrics.
     */
    public function withMessageCount(int $messageCount): self
    {
        $obj = clone $this;
        $obj->message_count = $messageCount;

        return $obj;
    }

    /**
     * The ratio of messages blocked for spam to the number of messages attempted.
     */
    public function withSpamRatio(float $spamRatio): self
    {
        $obj = clone $this;
        $obj->spam_ratio = $spamRatio;

        return $obj;
    }

    /**
     * The ratio of messages sucessfully delivered to the number of messages attempted.
     */
    public function withSuccessRatio(float $successRatio): self
    {
        $obj = clone $this;
        $obj->success_ratio = $successRatio;

        return $obj;
    }
}
