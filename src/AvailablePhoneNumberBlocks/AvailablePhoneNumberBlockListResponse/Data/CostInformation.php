<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostInformationShape = array{
 *   currency?: string, monthlyCost?: string, upfrontCost?: string
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

    #[Api('monthly_cost', optional: true)]
    public ?string $monthlyCost;

    #[Api('upfront_cost', optional: true)]
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
        $obj = new self;

        null !== $currency && $obj->currency = $currency;
        null !== $monthlyCost && $obj->monthlyCost = $monthlyCost;
        null !== $upfrontCost && $obj->upfrontCost = $upfrontCost;

        return $obj;
    }

    /**
     * The ISO 4217 code for the currency.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    public function withMonthlyCost(string $monthlyCost): self
    {
        $obj = clone $this;
        $obj->monthlyCost = $monthlyCost;

        return $obj;
    }

    public function withUpfrontCost(string $upfrontCost): self
    {
        $obj = clone $this;
        $obj->upfrontCost = $upfrontCost;

        return $obj;
    }
}
