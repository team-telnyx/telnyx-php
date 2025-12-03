<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Data\Rate\Currency;

/**
 * @phpstan-type RateShape = array{
 *   amount?: string|null, currency?: value-of<Currency>|null
 * }
 */
final class Rate implements BaseModel
{
    /** @use SdkModel<RateShape> */
    use SdkModel;

    /**
     * Rate from which cost is calculated.
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
        null !== $currency && $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Rate from which cost is calculated.
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
        $obj['currency'] = $currency;

        return $obj;
    }
}
