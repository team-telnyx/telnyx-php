<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload\CostBreakdown\CarrierFee;
use Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload\CostBreakdown\Rate;

/**
 * Detailed breakdown of the message cost components.
 *
 * @phpstan-type CostBreakdownShape = array{
 *   carrier_fee?: CarrierFee|null, rate?: Rate|null
 * }
 */
final class CostBreakdown implements BaseModel
{
    /** @use SdkModel<CostBreakdownShape> */
    use SdkModel;

    #[Optional]
    public ?CarrierFee $carrier_fee;

    #[Optional]
    public ?Rate $rate;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CarrierFee|array{
     *   amount?: string|null, currency?: string|null
     * } $carrier_fee
     * @param Rate|array{amount?: string|null, currency?: string|null} $rate
     */
    public static function with(
        CarrierFee|array|null $carrier_fee = null,
        Rate|array|null $rate = null
    ): self {
        $obj = new self;

        null !== $carrier_fee && $obj['carrier_fee'] = $carrier_fee;
        null !== $rate && $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * @param CarrierFee|array{
     *   amount?: string|null, currency?: string|null
     * } $carrierFee
     */
    public function withCarrierFee(CarrierFee|array $carrierFee): self
    {
        $obj = clone $this;
        $obj['carrier_fee'] = $carrierFee;

        return $obj;
    }

    /**
     * @param Rate|array{amount?: string|null, currency?: string|null} $rate
     */
    public function withRate(Rate|array $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }
}
