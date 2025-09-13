<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
  * @phpstan-type 50_alias = array{amount?: float, unit?: string}
  * 
 */
final class 50 implements BaseModel
{
  /** @use SdkModel<50_alias> */
  use SdkModel;

  /**
  * The 50th percentile latency.
  * 
  * @var float|null $amount
 */
  #[Api(optional: true)]
  public ?float $amount;

  /**
  * The unit of the 50th percentile latency.
  * 
  * @var string|null $unit
 */
  #[Api(optional: true)]
  public ?string $unit;

  /**  */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param float $amount
  * @param string $unit
  * 
  * @return self
 */
  public static function with(float $amount = null, string $unit = null): self {
    $obj = new self;

    null !== $amount && $obj->amount = $amount;
    null !== $unit && $obj->unit = $unit;

    return $obj;
  }

  /**
  * The 50th percentile latency.
  * 
  * @param float $amount
  * 
  * @return self
 */
  public function withAmount(float $amount): self {
    $obj = clone $this;
    $obj->amount = $amount;
    return $obj;
  }

  /**
  * The unit of the 50th percentile latency.
  * 
  * @param string $unit
  * 
  * @return self
 */
  public function withUnit(string $unit): self {
    $obj = clone $this;
    $obj->unit = $unit;
    return $obj;
  }
}