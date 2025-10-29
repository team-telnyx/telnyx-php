<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostShape = array{amount?: string, currency?: string}
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<CostShape> */
    use SdkModel;

    /**
     * The total monetary amount of the order.
     */
    #[Api(optional: true)]
    public ?string $amount;

    /**
     * Filter by ISO 4217 currency string.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $currency && $obj->currency = $currency;

        return $obj;
    }

    /**
     * The total monetary amount of the order.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Filter by ISO 4217 currency string.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }
}
