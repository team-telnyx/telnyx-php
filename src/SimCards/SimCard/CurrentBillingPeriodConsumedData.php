<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The SIM card consumption so far in the current billing cycle.
 *
 * @phpstan-type CurrentBillingPeriodConsumedDataShape = array{
 *   amount?: string|null, unit?: string|null
 * }
 */
final class CurrentBillingPeriodConsumedData implements BaseModel
{
    /** @use SdkModel<CurrentBillingPeriodConsumedDataShape> */
    use SdkModel;

    #[Optional]
    public ?string $amount;

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
    public static function with(
        ?string $amount = null,
        ?string $unit = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
