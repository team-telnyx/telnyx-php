<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type v90_alias = array{amount?: float, unit?: string}
 */
final class v90 implements BaseModel
{
    /** @use SdkModel<v90_alias> */
    use SdkModel;

    /**
     * The 90th percentile latency.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * The unit of the 90th percentile latency.
     */
    #[Api(optional: true)]
    public ?string $unit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $amount = null, ?string $unit = null): self
    {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $unit && $obj->unit = $unit;

        return $obj;
    }

    /**
     * The 90th percentile latency.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * The unit of the 90th percentile latency.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj->unit = $unit;

        return $obj;
    }
}
