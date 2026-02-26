<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostInformationShape = array{
 *   currency?: string|null, monthlyCost?: string|null, upfrontCost?: string|null
 * }
 */
final class CostInformation implements BaseModel
{
    /** @use SdkModel<CostInformationShape> */
    use SdkModel;

    /**
     * The ISO 4217 code for the currency.
     */
    #[Optional]
    public ?string $currency;

    #[Optional('monthly_cost')]
    public ?string $monthlyCost;

    #[Optional('upfront_cost')]
    public ?string $upfrontCost;

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
        ?string $currency = null,
        ?string $monthlyCost = null,
        ?string $upfrontCost = null,
    ): self {
        $self = new self;

        null !== $currency && $self['currency'] = $currency;
        null !== $monthlyCost && $self['monthlyCost'] = $monthlyCost;
        null !== $upfrontCost && $self['upfrontCost'] = $upfrontCost;

        return $self;
    }

    /**
     * The ISO 4217 code for the currency.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    public function withMonthlyCost(string $monthlyCost): self
    {
        $self = clone $this;
        $self['monthlyCost'] = $monthlyCost;

        return $self;
    }

    public function withUpfrontCost(string $upfrontCost): self
    {
        $self = clone $this;
        $self['upfrontCost'] = $upfrontCost;

        return $self;
    }
}
