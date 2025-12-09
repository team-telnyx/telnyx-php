<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Required;
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
    #[Required('inbound_outbound_ratio')]
    public float $inboundOutboundRatio;

    /**
     * The number of messages analyzed for the health metrics.
     */
    #[Required('message_count')]
    public int $messageCount;

    /**
     * The ratio of messages blocked for spam to the number of messages attempted.
     */
    #[Required('spam_ratio')]
    public float $spamRatio;

    /**
     * The ratio of messages sucessfully delivered to the number of messages attempted.
     */
    #[Required('success_ratio')]
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
        $self = new self;

        $self['inboundOutboundRatio'] = $inboundOutboundRatio;
        $self['messageCount'] = $messageCount;
        $self['spamRatio'] = $spamRatio;
        $self['successRatio'] = $successRatio;

        return $self;
    }

    /**
     * The ratio of messages received to the number of messages sent.
     */
    public function withInboundOutboundRatio(float $inboundOutboundRatio): self
    {
        $self = clone $this;
        $self['inboundOutboundRatio'] = $inboundOutboundRatio;

        return $self;
    }

    /**
     * The number of messages analyzed for the health metrics.
     */
    public function withMessageCount(int $messageCount): self
    {
        $self = clone $this;
        $self['messageCount'] = $messageCount;

        return $self;
    }

    /**
     * The ratio of messages blocked for spam to the number of messages attempted.
     */
    public function withSpamRatio(float $spamRatio): self
    {
        $self = clone $this;
        $self['spamRatio'] = $spamRatio;

        return $self;
    }

    /**
     * The ratio of messages sucessfully delivered to the number of messages attempted.
     */
    public function withSuccessRatio(float $successRatio): self
    {
        $self = clone $this;
        $self['successRatio'] = $successRatio;

        return $self;
    }
}
