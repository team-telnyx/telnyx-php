<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Data\Cost\Currency;

/**
 * @phpstan-type cost_alias = array{amount?: string, currency?: value-of<Currency>}
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<cost_alias> */
    use SdkModel;

    /**
     * Final cost. Cost is calculated as rate * unit.
     */
    #[Api(optional: true)]
    public ?string $amount;

    /**
     * Currency of the rate and cost.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Api(enum: Currency::class, optional: true)]
    public ?string $currency;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public static function with(
        ?string $amount = null,
        Currency|string|null $currency = null
    ): self {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $currency && $obj->currency = $currency instanceof Currency ? $currency->value : $currency;

        return $obj;
    }

    /**
     * Final cost. Cost is calculated as rate * unit.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Currency of the rate and cost.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency instanceof Currency ? $currency->value : $currency;

        return $obj;
    }
}
