<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type P50Shape = array{amount?: float|null, unit?: string|null}
 */
final class P50 implements BaseModel
{
    /** @use SdkModel<P50Shape> */
    use SdkModel;

    /**
     * The 50th percentile latency.
     */
    #[Optional]
    public ?float $amount;

    /**
     * The unit of the 50th percentile latency.
     */
    #[Optional]
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
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    /**
     * The 50th percentile latency.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The unit of the 50th percentile latency.
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
