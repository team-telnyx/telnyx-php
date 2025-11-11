<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\CostBreakdown\CarrierFee;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\CostBreakdown\Rate;

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

    #[Api(optional: true)]
    public ?CarrierFee $carrier_fee;

    #[Api(optional: true)]
    public ?Rate $rate;

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
        ?CarrierFee $carrier_fee = null,
        ?Rate $rate = null
    ): self {
        $obj = new self;

        null !== $carrier_fee && $obj->carrier_fee = $carrier_fee;
        null !== $rate && $obj->rate = $rate;

        return $obj;
    }

    public function withCarrierFee(CarrierFee $carrierFee): self
    {
        $obj = clone $this;
        $obj->carrier_fee = $carrierFee;

        return $obj;
    }

    public function withRate(Rate $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }
}
