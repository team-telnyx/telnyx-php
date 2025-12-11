<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P0;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P100;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P25;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P50;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P75;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P90;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P99;

/**
 * @phpstan-type PercentileLatencyShape = array{
 *   p0?: P0|null,
 *   p100?: P100|null,
 *   p25?: P25|null,
 *   p50?: P50|null,
 *   p75?: P75|null,
 *   p90?: P90|null,
 *   p99?: P99|null,
 * }
 */
final class PercentileLatency implements BaseModel
{
    /** @use SdkModel<PercentileLatencyShape> */
    use SdkModel;

    #[Optional('0')]
    public ?P0 $p0;

    #[Optional('100')]
    public ?P100 $p100;

    #[Optional('25')]
    public ?P25 $p25;

    #[Optional('50')]
    public ?P50 $p50;

    #[Optional('75')]
    public ?P75 $p75;

    #[Optional('90')]
    public ?P90 $p90;

    #[Optional('99')]
    public ?P99 $p99;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param P0|array{amount?: float|null, unit?: string|null} $p0
     * @param P100|array{amount?: float|null, unit?: string|null} $p100
     * @param P25|array{amount?: float|null, unit?: string|null} $p25
     * @param P50|array{amount?: float|null, unit?: string|null} $p50
     * @param P75|array{amount?: float|null, unit?: string|null} $p75
     * @param P90|array{amount?: float|null, unit?: string|null} $p90
     * @param P99|array{amount?: float|null, unit?: string|null} $p99
     */
    public static function with(
        P0|array|null $p0 = null,
        P100|array|null $p100 = null,
        P25|array|null $p25 = null,
        P50|array|null $p50 = null,
        P75|array|null $p75 = null,
        P90|array|null $p90 = null,
        P99|array|null $p99 = null,
    ): self {
        $self = new self;

        null !== $p0 && $self['p0'] = $p0;
        null !== $p100 && $self['p100'] = $p100;
        null !== $p25 && $self['p25'] = $p25;
        null !== $p50 && $self['p50'] = $p50;
        null !== $p75 && $self['p75'] = $p75;
        null !== $p90 && $self['p90'] = $p90;
        null !== $p99 && $self['p99'] = $p99;

        return $self;
    }

    /**
     * @param P0|array{amount?: float|null, unit?: string|null} $p0
     */
    public function withP0(P0|array $p0): self
    {
        $self = clone $this;
        $self['p0'] = $p0;

        return $self;
    }

    /**
     * @param P100|array{amount?: float|null, unit?: string|null} $p100
     */
    public function withP100(P100|array $p100): self
    {
        $self = clone $this;
        $self['p100'] = $p100;

        return $self;
    }

    /**
     * @param P25|array{amount?: float|null, unit?: string|null} $p25
     */
    public function withP25(P25|array $p25): self
    {
        $self = clone $this;
        $self['p25'] = $p25;

        return $self;
    }

    /**
     * @param P50|array{amount?: float|null, unit?: string|null} $p50
     */
    public function withP50(P50|array $p50): self
    {
        $self = clone $this;
        $self['p50'] = $p50;

        return $self;
    }

    /**
     * @param P75|array{amount?: float|null, unit?: string|null} $p75
     */
    public function withP75(P75|array $p75): self
    {
        $self = clone $this;
        $self['p75'] = $p75;

        return $self;
    }

    /**
     * @param P90|array{amount?: float|null, unit?: string|null} $p90
     */
    public function withP90(P90|array $p90): self
    {
        $self = clone $this;
        $self['p90'] = $p90;

        return $self;
    }

    /**
     * @param P99|array{amount?: float|null, unit?: string|null} $p99
     */
    public function withP99(P99|array $p99): self
    {
        $self = clone $this;
        $self['p99'] = $p99;

        return $self;
    }
}
