<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data1\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data1\Payload\CostBreakdown\CarrierFee;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data1\Payload\CostBreakdown\Rate;

/**
 * Detailed breakdown of the message cost components.
 *
 * @phpstan-type CostBreakdownShape = array{
 *   carrierFee?: CarrierFee|null, rate?: Rate|null
 * }
 */
final class CostBreakdown implements BaseModel
{
    /** @use SdkModel<CostBreakdownShape> */
    use SdkModel;

    #[Optional('carrier_fee')]
    public ?CarrierFee $carrierFee;

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
     * } $carrierFee
     * @param Rate|array{amount?: string|null, currency?: string|null} $rate
     */
    public static function with(
        CarrierFee|array|null $carrierFee = null,
        Rate|array|null $rate = null
    ): self {
        $obj = new self;

        null !== $carrierFee && $obj['carrierFee'] = $carrierFee;
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
        $obj['carrierFee'] = $carrierFee;

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
