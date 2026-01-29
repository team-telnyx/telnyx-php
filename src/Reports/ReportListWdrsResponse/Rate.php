<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Rate\Currency;

/**
 * @phpstan-type RateShape = array{
 *   amount?: string|null, currency?: null|Currency|value-of<Currency>
 * }
 */
final class Rate implements BaseModel
{
    /** @use SdkModel<RateShape> */
    use SdkModel;

    /**
     * Rate from which cost is calculated.
     */
    #[Optional]
    public ?string $amount;

    /**
     * Currency of the rate and cost.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Optional(enum: Currency::class)]
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
     * @param Currency|value-of<Currency>|null $currency
     */
    public static function with(
        ?string $amount = null,
        Currency|string|null $currency = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $currency && $self['currency'] = $currency;

        return $self;
    }

    /**
     * Rate from which cost is calculated.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Currency of the rate and cost.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }
}
