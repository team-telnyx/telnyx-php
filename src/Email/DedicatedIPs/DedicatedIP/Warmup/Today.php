<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP\Warmup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Today's warmup allowance report card (current UTC day). Null outside the warmup window (before start_warmup, after release/suspension). `active` IPs report the ramp-complete allowance, except as described for `cap`.
 *
 * @phpstan-type TodayShape = array{
 *   cap?: int|null, day?: string|null, granted?: int|null, remaining?: int|null
 * }
 */
final class Today implements BaseModel
{
    /** @use SdkModel<TodayShape> */
    use SdkModel;

    /**
     * The day's allowance cap. Null when the ramp has not opened yet (day 0: the scheduler has not armed a stage cap) — distinct from a spent day, which reports the cap with remaining 0. `active` IPs report `100000000`, the ramp-complete cap; `complete_warmup` applies it to the current day immediately. A day's allowance created before the IP became `active` can keep its stored `cap` and `remaining` until the next first-attempt send refreshes them.
     */
    #[Optional(nullable: true)]
    public ?int $cap;

    /**
     * The UTC day this snapshot describes (warmup caps reset at UTC midnight).
     */
    #[Optional]
    public ?string $day;

    /**
     * First-attempt sends released from warmup hold so far today. Delivery retries never lease allowance and are not counted.
     */
    #[Optional]
    public ?int $granted;

    /**
     * Headroom left today. A queued send held by the daily cap is explained by remaining == 0; null mirrors cap (ramp not open yet). On an `active` IP whose `cap` is below `100000000`, remaining == 0 is a stored allowance and does not block the next eligible first-attempt send.
     */
    #[Optional(nullable: true)]
    public ?int $remaining;

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
        int|Omitted|null $cap = Omitted::VALUE,
        int|Omitted|null $remaining = Omitted::VALUE,
        ?string $day = null,
        ?int $granted = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $cap && $self['cap'] = $cap;
        null !== $day && $self['day'] = $day;
        null !== $granted && $self['granted'] = $granted;
        Omitted::VALUE !== $remaining && $self['remaining'] = $remaining;

        return $self;
    }

    /**
     * The day's allowance cap. Null when the ramp has not opened yet (day 0: the scheduler has not armed a stage cap) — distinct from a spent day, which reports the cap with remaining 0. `active` IPs report `100000000`, the ramp-complete cap; `complete_warmup` applies it to the current day immediately. A day's allowance created before the IP became `active` can keep its stored `cap` and `remaining` until the next first-attempt send refreshes them.
     */
    public function withCap(?int $cap): self
    {
        $self = clone $this;
        $self['cap'] = $cap;

        return $self;
    }

    /**
     * The UTC day this snapshot describes (warmup caps reset at UTC midnight).
     */
    public function withDay(string $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    /**
     * First-attempt sends released from warmup hold so far today. Delivery retries never lease allowance and are not counted.
     */
    public function withGranted(int $granted): self
    {
        $self = clone $this;
        $self['granted'] = $granted;

        return $self;
    }

    /**
     * Headroom left today. A queued send held by the daily cap is explained by remaining == 0; null mirrors cap (ramp not open yet). On an `active` IP whose `cap` is below `100000000`, remaining == 0 is a stored allowance and does not block the next eligible first-attempt send.
     */
    public function withRemaining(?int $remaining): self
    {
        $self = clone $this;
        $self['remaining'] = $remaining;

        return $self;
    }
}
