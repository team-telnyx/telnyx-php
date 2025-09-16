<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\0;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\100;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\25;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\50;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\75;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\90;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\99;

/**
  * @phpstan-type percentile_latency = array{
  *   p0?: 0, p100?: 100, p25?: 25, p50?: 50, p75?: 75, p90?: 90, p99?: 99
  * }
  * 
 */
final class PercentileLatency implements BaseModel
{
  /** @use SdkModel<percentile_latency> */
  use SdkModel;

  /** @var 0|null $p0 */
  #[Api("0", optional: true)]
  public ?0 $p0;

  /** @var 100|null $p100 */
  #[Api("100", optional: true)]
  public ?100 $p100;

  /** @var 25|null $p25 */
  #[Api("25", optional: true)]
  public ?25 $p25;

  /** @var 50|null $p50 */
  #[Api("50", optional: true)]
  public ?50 $p50;

  /** @var 75|null $p75 */
  #[Api("75", optional: true)]
  public ?75 $p75;

  /** @var 90|null $p90 */
  #[Api("90", optional: true)]
  public ?90 $p90;

  /** @var 99|null $p99 */
  #[Api("99", optional: true)]
  public ?99 $p99;

  /**  */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param 0 $p0
  * @param 100 $p100
  * @param 25 $p25
  * @param 50 $p50
  * @param 75 $p75
  * @param 90 $p90
  * @param 99 $p99
  * 
  * @return self
 */
  public static function with(
    0 $p0 = null,
    100 $p100 = null,
    25 $p25 = null,
    50 $p50 = null,
    75 $p75 = null,
    90 $p90 = null,
    99 $p99 = null,
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

  /**
  * @param 0 $p0
  * 
  * @return self
 */
  public function withP0(0 $p0): self {
    $obj = clone $this;
    $obj->p0 = $p0;
    return $obj;
  }

  /**
  * @param 100 $p100
  * 
  * @return self
 */
  public function withP100(100 $p100): self {
    $obj = clone $this;
    $obj->p100 = $p100;
    return $obj;
  }

  /**
  * @param 25 $p25
  * 
  * @return self
 */
  public function withP25(25 $p25): self {
    $obj = clone $this;
    $obj->p25 = $p25;
    return $obj;
  }

  /**
  * @param 50 $p50
  * 
  * @return self
 */
  public function withP50(50 $p50): self {
    $obj = clone $this;
    $obj->p50 = $p50;
    return $obj;
  }

  /**
  * @param 75 $p75
  * 
  * @return self
 */
  public function withP75(75 $p75): self {
    $obj = clone $this;
    $obj->p75 = $p75;
    return $obj;
  }

  /**
  * @param 90 $p90
  * 
  * @return self
 */
  public function withP90(90 $p90): self {
    $obj = clone $this;
    $obj->p90 = $p90;
    return $obj;
  }

  /**
  * @param 99 $p99
  * 
  * @return self
 */
  public function withP99(99 $p99): self {
    $obj = clone $this;
    $obj->p99 = $p99;
    return $obj;
  }
}