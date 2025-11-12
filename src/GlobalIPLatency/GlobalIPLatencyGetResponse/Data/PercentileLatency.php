<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
    public ?_0 $p0;

    #[Api(optional: true)]
    public ?_100 $p100;

    #[Api(optional: true)]
    public ?_25 $p25;

    #[Api(optional: true)]
    public ?_50 $p50;

    #[Api(optional: true)]
    public ?_75 $p75;

    #[Api(optional: true)]
    public ?_90 $p90;

    #[Api(optional: true)]
    public ?_99 $p99;

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
        ?_0 $p0 = null,
        ?_100 $p100 = null,
        ?_25 $p25 = null,
        ?_50 $p50 = null,
        ?_75 $p75 = null,
        ?_90 $p90 = null,
        ?_99 $p99 = null,
    ): self {
        $obj = new self;

        null !== $p0 && $obj->p0 = $p0;
        null !== $p100 && $obj->p100 = $p100;
        null !== $p25 && $obj->p25 = $p25;
        null !== $p50 && $obj->p50 = $p50;
        null !== $p75 && $obj->p75 = $p75;
        null !== $p90 && $obj->p90 = $p90;
        null !== $p99 && $obj->p99 = $p99;

        return $obj;
    }

    public function withP0(_0 $p0): self
    {
        $obj = clone $this;
        $obj->p0 = $p0;

        return $obj;
    }

    public function withP100(_100 $p100): self
    {
        $obj = clone $this;
        $obj->p100 = $p100;

        return $obj;
    }

    public function withP25(_25 $p25): self
    {
        $obj = clone $this;
        $obj->p25 = $p25;

        return $obj;
    }

    public function withP50(_50 $p50): self
    {
        $obj = clone $this;
        $obj->p50 = $p50;

        return $obj;
    }

    public function withP75(_75 $p75): self
    {
        $obj = clone $this;
        $obj->p75 = $p75;

        return $obj;
    }

    public function withP90(_90 $p90): self
    {
        $obj = clone $this;
        $obj->p90 = $p90;

        return $obj;
    }

    public function withP99(_99 $p99): self
    {
        $obj = clone $this;
        $obj->p99 = $p99;

        return $obj;
    }
}
