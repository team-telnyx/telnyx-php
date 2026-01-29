<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReceivedShape = array{amount?: float|null, unit?: string|null}
 */
final class Received implements BaseModel
{
    /** @use SdkModel<ReceivedShape> */
    use SdkModel;

    /**
     * The amount of data received.
     */
    #[Optional]
    public ?float $amount;

    /**
     * The unit of the amount of data received.
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
     * The amount of data received.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The unit of the amount of data received.
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
