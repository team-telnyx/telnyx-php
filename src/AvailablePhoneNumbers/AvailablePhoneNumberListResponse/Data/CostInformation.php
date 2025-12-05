<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostInformationShape = array{
 *   currency?: string|null, monthly_cost?: string|null, upfront_cost?: string|null
 * }
 */
final class CostInformation implements BaseModel
{
    /** @use SdkModel<CostInformationShape> */
    use SdkModel;

    /**
     * The ISO 4217 code for the currency.
     */
    #[Api(optional: true)]
    public ?string $currency;

    #[Api(optional: true)]
    public ?string $monthly_cost;

    #[Api(optional: true)]
    public ?string $upfront_cost;

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
        ?string $monthly_cost = null,
        ?string $upfront_cost = null,
    ): self {
        $obj = new self;

        null !== $currency && $obj['currency'] = $currency;
        null !== $monthly_cost && $obj['monthly_cost'] = $monthly_cost;
        null !== $upfront_cost && $obj['upfront_cost'] = $upfront_cost;

        return $obj;
    }

    /**
     * The ISO 4217 code for the currency.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    public function withMonthlyCost(string $monthlyCost): self
    {
        $obj = clone $this;
        $obj['monthly_cost'] = $monthlyCost;

        return $obj;
    }

    public function withUpfrontCost(string $upfrontCost): self
    {
        $obj = clone $this;
        $obj['upfront_cost'] = $upfrontCost;

        return $obj;
    }
}
