<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\CostBreakdown;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CarrierFeeShape = array{
 *   amount?: string|null, currency?: string|null
 * }
 */
final class CarrierFee implements BaseModel
{
    /** @use SdkModel<CarrierFeeShape> */
    use SdkModel;

    /**
     * The carrier fee amount.
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
     * The carrier fee amount.
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
