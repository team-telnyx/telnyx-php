<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v0;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v100;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v25;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v50;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v75;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v90;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\v99;

/**
 * @phpstan-type PercentileLatencyShape = array{
 *   p0?: v0, p100?: v100, p25?: v25, p50?: v50, p75?: v75, p90?: v90, p99?: v99
 * }
 */
final class PercentileLatency implements BaseModel
{
    /** @use SdkModel<PercentileLatencyShape> */
    use SdkModel;

    #[Api('0', optional: true)]
    public ?v0 $p0;

    #[Api('100', optional: true)]
    public ?v100 $p100;

    #[Api('25', optional: true)]
    public ?v25 $p25;

    #[Api('50', optional: true)]
    public ?v50 $p50;

    #[Api('75', optional: true)]
    public ?v75 $p75;

    #[Api('90', optional: true)]
    public ?v90 $p90;

    #[Api('99', optional: true)]
    public ?v99 $p99;

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
        ?v0 $p0 = null,
        ?v100 $p100 = null,
        ?v25 $p25 = null,
        ?v50 $p50 = null,
        ?v75 $p75 = null,
        ?v90 $p90 = null,
        ?v99 $p99 = null,
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

    public function withP0(v0 $p0): self
    {
        $obj = clone $this;
        $obj->p0 = $p0;

        return $obj;
    }

    public function withP100(v100 $p100): self
    {
        $obj = clone $this;
        $obj->p100 = $p100;

        return $obj;
    }

    public function withP25(v25 $p25): self
    {
        $obj = clone $this;
        $obj->p25 = $p25;

        return $obj;
    }

    public function withP50(v50 $p50): self
    {
        $obj = clone $this;
        $obj->p50 = $p50;

        return $obj;
    }

    public function withP75(v75 $p75): self
    {
        $obj = clone $this;
        $obj->p75 = $p75;

        return $obj;
    }

    public function withP90(v90 $p90): self
    {
        $obj = clone $this;
        $obj->p90 = $p90;

        return $obj;
    }

    public function withP99(v99 $p99): self
    {
        $obj = clone $this;
        $obj->p99 = $p99;

        return $obj;
    }
}
