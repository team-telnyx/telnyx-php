<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Email\DedicatedIPs\DedicatedIP\Warmup\Today;

/**
 * Warmup ramp state for a dedicated IP.
 *
 * @phpstan-import-type TodayShape from \Telnyx\Email\DedicatedIPs\DedicatedIP\Warmup\Today
 *
 * @phpstan-type WarmupShape = array{
 *   dailyCap?: int|null,
 *   paused?: bool|null,
 *   pausedAt?: \DateTimeInterface|null,
 *   progress?: int|null,
 *   startedAt?: \DateTimeInterface|null,
 *   today?: null|Today|TodayShape,
 * }
 */
final class Warmup implements BaseModel
{
    /** @use SdkModel<WarmupShape> */
    use SdkModel;

    /**
     * Daily cap of the current ramp stage. Null until the scheduler arms the first stage, and cleared when the ramp completes, automatically or through `complete_warmup`. On an `active` IP this value is informational and can keep an earlier stage cap after a suspension is lifted; it does not limit sending.
     */
    #[Optional('daily_cap', nullable: true)]
    public ?int $dailyCap;

    /**
     * True while the ramp is paused.
     */
    #[Optional]
    public ?bool $paused;

    /**
     * When the ramp was paused. Null when not paused.
     */
    #[Optional('paused_at', nullable: true)]
    public ?\DateTimeInterface $pausedAt;

    /**
     * Ramp progress (0-100): the share of the 28 send-day schedule completed. Only UTC days on which the IP sent mail count. Set to 100 when the ramp completes, automatically or through `complete_warmup`. On an `active` IP this value is informational and can keep an earlier value after a suspension is lifted.
     */
    #[Optional]
    public ?int $progress;

    /**
     * When `start_warmup` was called. Null before warm-up starts and after release.
     */
    #[Optional('started_at', nullable: true)]
    public ?\DateTimeInterface $startedAt;

    /**
     * Today's warmup allowance report card (current UTC day). Null outside the warmup window (before start_warmup, after release/suspension). `active` IPs report the ramp-complete allowance, except as described for `cap`.
     */
    #[Optional(nullable: true)]
    public ?Today $today;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|Today|TodayShape|null $today
     */
    public static function with(
        int|Omitted|null $dailyCap = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $pausedAt = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $startedAt = Omitted::VALUE,
        Omitted|Today|array|null $today = Omitted::VALUE,
        ?bool $paused = null,
        ?int $progress = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $dailyCap && $self['dailyCap'] = $dailyCap;
        null !== $paused && $self['paused'] = $paused;
        Omitted::VALUE !== $pausedAt && $self['pausedAt'] = $pausedAt;
        null !== $progress && $self['progress'] = $progress;
        Omitted::VALUE !== $startedAt && $self['startedAt'] = $startedAt;
        Omitted::VALUE !== $today && $self['today'] = $today;

        return $self;
    }

    /**
     * Daily cap of the current ramp stage. Null until the scheduler arms the first stage, and cleared when the ramp completes, automatically or through `complete_warmup`. On an `active` IP this value is informational and can keep an earlier stage cap after a suspension is lifted; it does not limit sending.
     */
    public function withDailyCap(?int $dailyCap): self
    {
        $self = clone $this;
        $self['dailyCap'] = $dailyCap;

        return $self;
    }

    /**
     * True while the ramp is paused.
     */
    public function withPaused(bool $paused): self
    {
        $self = clone $this;
        $self['paused'] = $paused;

        return $self;
    }

    /**
     * When the ramp was paused. Null when not paused.
     */
    public function withPausedAt(?\DateTimeInterface $pausedAt): self
    {
        $self = clone $this;
        $self['pausedAt'] = $pausedAt;

        return $self;
    }

    /**
     * Ramp progress (0-100): the share of the 28 send-day schedule completed. Only UTC days on which the IP sent mail count. Set to 100 when the ramp completes, automatically or through `complete_warmup`. On an `active` IP this value is informational and can keep an earlier value after a suspension is lifted.
     */
    public function withProgress(int $progress): self
    {
        $self = clone $this;
        $self['progress'] = $progress;

        return $self;
    }

    /**
     * When `start_warmup` was called. Null before warm-up starts and after release.
     */
    public function withStartedAt(?\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Today's warmup allowance report card (current UTC day). Null outside the warmup window (before start_warmup, after release/suspension). `active` IPs report the ramp-complete allowance, except as described for `cap`.
     *
     * @param Today|TodayShape|null $today
     */
    public function withToday(Today|array|null $today): self
    {
        $self = clone $this;
        $self['today'] = $today;

        return $self;
    }
}
