<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MeanLatencyShape = array{amount?: float|null, unit?: string|null}
 */
final class MeanLatency implements BaseModel
{
    /** @use SdkModel<MeanLatencyShape> */
    use SdkModel;

    /**
     * The average latency.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * The unit of the average latency.
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

        null !== $amount && $obj['amount'] = $amount;
        null !== $unit && $obj['unit'] = $unit;

        return $obj;
    }

    /**
     * The average latency.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * The unit of the average latency.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj['unit'] = $unit;

        return $obj;
    }
}
