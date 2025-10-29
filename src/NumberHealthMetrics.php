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
 *   inboundOutboundRatio: float,
 *   messageCount: int,
 *   spamRatio: float,
 *   successRatio: float,
 * }
 */
final class NumberHealthMetrics implements BaseModel
{
    /** @use SdkModel<NumberHealthMetricsShape> */
    use SdkModel;

    /**
     * The ratio of messages received to the number of messages sent.
     */
    #[Api('inbound_outbound_ratio')]
    public float $inboundOutboundRatio;

    /**
     * The number of messages analyzed for the health metrics.
     */
    #[Api('message_count')]
    public int $messageCount;

    /**
     * The ratio of messages blocked for spam to the number of messages attempted.
     */
    #[Api('spam_ratio')]
    public float $spamRatio;

    /**
     * The ratio of messages sucessfully delivered to the number of messages attempted.
     */
    #[Api('success_ratio')]
    public float $successRatio;

    /**
     * `new NumberHealthMetrics()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberHealthMetrics::with(
     *   inboundOutboundRatio: ...,
     *   messageCount: ...,
     *   spamRatio: ...,
     *   successRatio: ...,
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
        float $inboundOutboundRatio,
        int $messageCount,
        float $spamRatio,
        float $successRatio,
    ): self {
        $obj = new self;

        $obj->inboundOutboundRatio = $inboundOutboundRatio;
        $obj->messageCount = $messageCount;
        $obj->spamRatio = $spamRatio;
        $obj->successRatio = $successRatio;

        return $obj;
    }

    /**
     * The ratio of messages received to the number of messages sent.
     */
    public function withInboundOutboundRatio(float $inboundOutboundRatio): self
    {
        $obj = clone $this;
        $obj->inboundOutboundRatio = $inboundOutboundRatio;

        return $obj;
    }

    /**
     * The number of messages analyzed for the health metrics.
     */
    public function withMessageCount(int $messageCount): self
    {
        $obj = clone $this;
        $obj->messageCount = $messageCount;

        return $obj;
    }

    /**
     * The ratio of messages blocked for spam to the number of messages attempted.
     */
    public function withSpamRatio(float $spamRatio): self
    {
        $obj = clone $this;
        $obj->spamRatio = $spamRatio;

        return $obj;
    }

    /**
     * The ratio of messages sucessfully delivered to the number of messages attempted.
     */
    public function withSuccessRatio(float $successRatio): self
    {
        $obj = clone $this;
        $obj->successRatio = $successRatio;

        return $obj;
    }
}
