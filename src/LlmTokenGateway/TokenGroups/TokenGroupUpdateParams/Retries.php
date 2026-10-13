<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries\Backoff;

/**
 * Per-group same-route retries. max_attempts counts the first try of each step (the primary and each fallback) and is the ceiling for the x-ltg-max-attempts request header. A step is retried only when its attempt definitely did no provider work (connection failure before dispatch, or 429/529) before the first provider event; an uncertain failure (timeout, 408/500/502/503/504) moves to the next fallback step instead. max_attempts x (1 + the longest fallback chain) must not exceed 8, else 400. The n-th retry waits retry_delay_ms (constant), retry_delay_ms*n (linear) or retry_delay_ms*2^(n-1) (exponential), at most 5 s and never past the request deadline, then jittered uniformly down to half that value so concurrent retries spread out; a provider Retry-After of at most 5 s is honoured and a longer one moves to the next step. request_timeout_ms applies to streaming requests only: it bounds each attempt's time to its first provider event and never applies after it. Non-stream requests keep the per-attempt hop and idle bounds (their headers arrive only with the finished completion). retry_delay_ms and backoff are floors for the request knobs. Each planned attempt is reserved (at most 8 per request); unused reservation is released at settlement. Managed routes only. The stored form is echoed back with defaults filled in; null disables retries.
 *
 * @phpstan-type RetriesShape = array{
 *   maxAttempts: int,
 *   backoff?: null|Backoff|value-of<Backoff>,
 *   requestTimeoutMs?: int|null,
 *   retryDelayMs?: int|null,
 * }
 */
final class Retries implements BaseModel
{
    /** @use SdkModel<RetriesShape> */
    use SdkModel;

    #[Required('max_attempts')]
    public int $maxAttempts;

    /** @var value-of<Backoff>|null $backoff */
    #[Optional(enum: Backoff::class)]
    public ?string $backoff;

    #[Optional('request_timeout_ms', nullable: true)]
    public ?int $requestTimeoutMs;

    #[Optional('retry_delay_ms')]
    public ?int $retryDelayMs;

    /**
     * `new Retries()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Retries::with(maxAttempts: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Retries)->withMaxAttempts(...)
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
     *
     * @param Backoff|value-of<Backoff>|null $backoff
     */
    public static function with(
        int $maxAttempts,
        int|Omitted|null $requestTimeoutMs = Omitted::VALUE,
        Backoff|string|null $backoff = null,
        ?int $retryDelayMs = null,
    ): self {
        $self = new self;

        $self['maxAttempts'] = $maxAttempts;

        null !== $backoff && $self['backoff'] = $backoff;
        Omitted::VALUE !== $requestTimeoutMs && $self['requestTimeoutMs'] = $requestTimeoutMs;
        null !== $retryDelayMs && $self['retryDelayMs'] = $retryDelayMs;

        return $self;
    }

    public function withMaxAttempts(int $maxAttempts): self
    {
        $self = clone $this;
        $self['maxAttempts'] = $maxAttempts;

        return $self;
    }

    /**
     * @param Backoff|value-of<Backoff> $backoff
     */
    public function withBackoff(Backoff|string $backoff): self
    {
        $self = clone $this;
        $self['backoff'] = $backoff;

        return $self;
    }

    public function withRequestTimeoutMs(?int $requestTimeoutMs): self
    {
        $self = clone $this;
        $self['requestTimeoutMs'] = $requestTimeoutMs;

        return $self;
    }

    public function withRetryDelayMs(int $retryDelayMs): self
    {
        $self = clone $this;
        $self['retryDelayMs'] = $retryDelayMs;

        return $self;
    }
}
