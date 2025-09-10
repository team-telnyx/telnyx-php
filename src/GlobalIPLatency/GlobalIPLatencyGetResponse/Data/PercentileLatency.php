<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\0 as 01;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\100 as 1001;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\25 as 251;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\50 as 501;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\75 as 751;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\90 as 901;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\99 as 991;

/**
  * @phpstan-type percentile_latency = array{
  *   0?: 01|null,
  *   100?: 1001|null,
  *   25?: 251|null,
  *   50?: 501|null,
  *   75?: 751|null,
  *   90?: 901|null,
  *   99?: 991|null,
  * }
  * 
 */
final class PercentileLatency implements BaseModel
{
  /** @use SdkModel<percentile_latency> */
  use SdkModel;

  /** @var 01|null $0 */
  #[Api(optional: true)]
  public ?01 $0;

  /** @var 1001|null $100 */
  #[Api(optional: true)]
  public ?1001 $100;

  /** @var 251|null $25 */
  #[Api(optional: true)]
  public ?251 $25;

  /** @var 501|null $50 */
  #[Api(optional: true)]
  public ?501 $50;

  /** @var 751|null $75 */
  #[Api(optional: true)]
  public ?751 $75;

  /** @var 901|null $90 */
  #[Api(optional: true)]
  public ?901 $90;

  /** @var 991|null $99 */
  #[Api(optional: true)]
  public ?991 $99;

  /**  */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param 01 $0
  * @param 1001 $100
  * @param 251 $25
  * @param 501 $50
  * @param 751 $75
  * @param 901 $90
  * @param 991 $99
  * 
  * @return self
 */
  public static function with(
    01 $0 = null,
    1001 $100 = null,
    251 $25 = null,
    501 $50 = null,
    751 $75 = null,
    901 $90 = null,
    991 $99 = null,
  ): self {
    $obj = new self;

    null !== $0 && $obj->0 = $0;
    null !== $100 && $obj->100 = $100;
    null !== $25 && $obj->25 = $25;
    null !== $50 && $obj->50 = $50;
    null !== $75 && $obj->75 = $75;
    null !== $90 && $obj->90 = $90;
    null !== $99 && $obj->99 = $99;

    return $obj;
  }

  /**
  * @param 01 $0
  * 
  * @return self
 */
  public function with0(01 $0): self {
    $obj = clone $this;
    $obj->0 = $0;
    return $obj;
  }

  /**
  * @param 1001 $100
  * 
  * @return self
 */
  public function with100(1001 $100): self {
    $obj = clone $this;
    $obj->100 = $100;
    return $obj;
  }

  /**
  * @param 251 $25
  * 
  * @return self
 */
  public function with25(251 $25): self {
    $obj = clone $this;
    $obj->25 = $25;
    return $obj;
  }

  /**
  * @param 501 $50
  * 
  * @return self
 */
  public function with50(501 $50): self {
    $obj = clone $this;
    $obj->50 = $50;
    return $obj;
  }

  /**
  * @param 751 $75
  * 
  * @return self
 */
  public function with75(751 $75): self {
    $obj = clone $this;
    $obj->75 = $75;
    return $obj;
  }

  /**
  * @param 901 $90
  * 
  * @return self
 */
  public function with90(901 $90): self {
    $obj = clone $this;
    $obj->90 = $90;
    return $obj;
  }

  /**
  * @param 991 $99
  * 
  * @return self
 */
  public function with99(991 $99): self {
    $obj = clone $this;
    $obj->99 = $99;
    return $obj;
  }
}