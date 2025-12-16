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
 * @phpstan-import-type _0Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_0
 * @phpstan-import-type _100Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_100
 * @phpstan-import-type _25Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_25
 * @phpstan-import-type _50Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_50
 * @phpstan-import-type _75Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_75
 * @phpstan-import-type _90Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_90
 * @phpstan-import-type _99Shape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_99
 *
 * @phpstan-type PercentileLatencyShape = array{
 *   p0?: null|_0|_0Shape,
 *   p100?: null|_100|_100Shape,
 *   p25?: null|_25|_25Shape,
 *   p50?: null|_50|_50Shape,
 *   p75?: null|_75|_75Shape,
 *   p90?: null|_90|_90Shape,
 *   p99?: null|_99|_99Shape,
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
     * @param _0Shape $p0
     * @param _100Shape $p100
     * @param _25Shape $p25
     * @param _50Shape $p50
     * @param _75Shape $p75
     * @param _90Shape $p90
     * @param _99Shape $p99
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
     * @param _0Shape $p0
     */
    public function withP0(_0|array $p0): self
    {
        $self = clone $this;
        $self['p0'] = $p0;

        return $self;
    }

    /**
     * @param _100Shape $p100
     */
    public function withP100(_100|array $p100): self
    {
        $self = clone $this;
        $self['p100'] = $p100;

        return $self;
    }

    /**
     * @param _25Shape $p25
     */
    public function withP25(_25|array $p25): self
    {
        $self = clone $this;
        $self['p25'] = $p25;

        return $self;
    }

    /**
     * @param _50Shape $p50
     */
    public function withP50(_50|array $p50): self
    {
        $self = clone $this;
        $self['p50'] = $p50;

        return $self;
    }

    /**
     * @param _75Shape $p75
     */
    public function withP75(_75|array $p75): self
    {
        $self = clone $this;
        $self['p75'] = $p75;

        return $self;
    }

    /**
     * @param _90Shape $p90
     */
    public function withP90(_90|array $p90): self
    {
        $self = clone $this;
        $self['p90'] = $p90;

        return $self;
    }

    /**
     * @param _99Shape $p99
     */
    public function withP99(_99|array $p99): self
    {
        $self = clone $this;
        $self['p99'] = $p99;

        return $self;
    }
}
