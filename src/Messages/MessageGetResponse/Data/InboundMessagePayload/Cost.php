<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;

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
     * The amount deducted from your account.
     */
    #[Optional]
    public ?string $amount;

    /**
     * The ISO 4217 currency identifier.
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
     * The amount deducted from your account.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * The ISO 4217 currency identifier.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }
}
