<?php

declare(strict_types=1);

namespace Telnyx\DialMetrics\DialMetricListResponse\Dials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Dial attempts rejected by a limit.
 *
 * @phpstan-type RejectedShape = array{
 *   dailyLimit?: int|null, dpsLimit?: int|null, hourlyLimit?: int|null
 * }
 */
final class Rejected implements BaseModel
{
    /** @use SdkModel<RejectedShape> */
    use SdkModel;

    /**
     * Rejected by a daily limit.
     */
    #[Optional('daily_limit')]
    public ?int $dailyLimit;

    /**
     * Rejected by the dials-per-second limit.
     */
    #[Optional('dps_limit')]
    public ?int $dpsLimit;

    /**
     * Rejected by an hourly limit.
     */
    #[Optional('hourly_limit')]
    public ?int $hourlyLimit;

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
        ?int $dailyLimit = null,
        ?int $dpsLimit = null,
        ?int $hourlyLimit = null
    ): self {
        $self = new self;

        null !== $dailyLimit && $self['dailyLimit'] = $dailyLimit;
        null !== $dpsLimit && $self['dpsLimit'] = $dpsLimit;
        null !== $hourlyLimit && $self['hourlyLimit'] = $hourlyLimit;

        return $self;
    }

    /**
     * Rejected by a daily limit.
     */
    public function withDailyLimit(int $dailyLimit): self
    {
        $self = clone $this;
        $self['dailyLimit'] = $dailyLimit;

        return $self;
    }

    /**
     * Rejected by the dials-per-second limit.
     */
    public function withDpsLimit(int $dpsLimit): self
    {
        $self = clone $this;
        $self['dpsLimit'] = $dpsLimit;

        return $self;
    }

    /**
     * Rejected by an hourly limit.
     */
    public function withHourlyLimit(int $hourlyLimit): self
    {
        $self = clone $this;
        $self['hourlyLimit'] = $hourlyLimit;

        return $self;
    }
}
