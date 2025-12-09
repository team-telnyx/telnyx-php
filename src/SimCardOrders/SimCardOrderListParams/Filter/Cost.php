<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostShape = array{amount?: string|null, currency?: string|null}
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<CostShape> */
    use SdkModel;

    /**
     * The total monetary amount of the order.
     */
    #[Optional]
    public ?string $amount;

    /**
     * Filter by ISO 4217 currency string.
     */
    #[Optional]
    public ?string $currency;

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
        ?string $currency = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $currency && $self['currency'] = $currency;

        return $self;
    }

    /**
     * The total monetary amount of the order.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Filter by ISO 4217 currency string.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }
}
