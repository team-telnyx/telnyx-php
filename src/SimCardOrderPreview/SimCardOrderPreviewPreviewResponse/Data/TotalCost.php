<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalCostShape = array{
 *   amount?: string|null, currency?: string|null
 * }
 */
final class TotalCost implements BaseModel
{
    /** @use SdkModel<TotalCostShape> */
    use SdkModel;

    /**
     * A string representing the cost amount.
     */
    #[Optional]
    public ?string $amount;

    /**
     * ISO 4217 currency string.
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
        $obj = new self;

        null !== $amount && $obj['amount'] = $amount;
        null !== $currency && $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * A string representing the cost amount.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * ISO 4217 currency string.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }
}
