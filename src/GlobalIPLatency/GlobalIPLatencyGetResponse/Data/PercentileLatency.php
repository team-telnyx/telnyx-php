<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_0;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_100;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_25;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_50;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_75;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_90;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_99;

/**
 * @phpstan-type PercentileLatencyShape = array{
 *   p0?: _0|null,
 *   p100?: _100|null,
 *   p25?: _25|null,
 *   p50?: _50|null,
 *   p75?: _75|null,
 *   p90?: _90|null,
 *   p99?: _99|null,
 * }
 */
final class PercentileLatency implements BaseModel
{
    /** @use SdkModel<PercentileLatencyShape> */
    use SdkModel;

    #[Optional('0')]
    public ?_0 $p0;

    #[Optional('100')]
    public ?_100 $p100;

    #[Optional('25')]
    public ?_25 $p25;

    #[Optional('50')]
    public ?_50 $p50;

    #[Optional('75')]
    public ?_75 $p75;

    #[Optional('90')]
    public ?_90 $p90;

    #[Optional('99')]
    public ?_99 $p99;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _0|array{amount?: float|null, unit?: string|null} $p0
     * @param _100|array{amount?: float|null, unit?: string|null} $p100
     * @param _25|array{amount?: float|null, unit?: string|null} $p25
     * @param _50|array{amount?: float|null, unit?: string|null} $p50
     * @param _75|array{amount?: float|null, unit?: string|null} $p75
     * @param _90|array{amount?: float|null, unit?: string|null} $p90
     * @param _99|array{amount?: float|null, unit?: string|null} $p99
     */
    public static function with(
        _0|array|null $p0 = null,
        _100|array|null $p100 = null,
        _25|array|null $p25 = null,
        _50|array|null $p50 = null,
        _75|array|null $p75 = null,
        _90|array|null $p90 = null,
        _99|array|null $p99 = null,
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
     * @param _0|array{amount?: float|null, unit?: string|null} $p0
     */
    public function withP0(_0|array $p0): self
    {
        $self = clone $this;
        $self['p0'] = $p0;

        return $self;
    }

    /**
     * @param _100|array{amount?: float|null, unit?: string|null} $p100
     */
    public function withP100(_100|array $p100): self
    {
        $self = clone $this;
        $self['p100'] = $p100;

        return $self;
    }

    /**
     * @param _25|array{amount?: float|null, unit?: string|null} $p25
     */
    public function withP25(_25|array $p25): self
    {
        $self = clone $this;
        $self['p25'] = $p25;

        return $self;
    }

    /**
     * @param _50|array{amount?: float|null, unit?: string|null} $p50
     */
    public function withP50(_50|array $p50): self
    {
        $self = clone $this;
        $self['p50'] = $p50;

        return $self;
    }

    /**
     * @param _75|array{amount?: float|null, unit?: string|null} $p75
     */
    public function withP75(_75|array $p75): self
    {
        $self = clone $this;
        $self['p75'] = $p75;

        return $self;
    }

    /**
     * @param _90|array{amount?: float|null, unit?: string|null} $p90
     */
    public function withP90(_90|array $p90): self
    {
        $self = clone $this;
        $self['p90'] = $p90;

        return $self;
    }

    /**
     * @param _99|array{amount?: float|null, unit?: string|null} $p99
     */
    public function withP99(_99|array $p99): self
    {
        $self = clone $this;
        $self['p99'] = $p99;

        return $self;
    }
}
