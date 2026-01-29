<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown\CarrierFee;
use Telnyx\Messages\OutboundMessagePayload\CostBreakdown\Rate;

/**
 * Detailed breakdown of the message cost components.
 *
 * @phpstan-import-type CarrierFeeShape from \Telnyx\Messages\OutboundMessagePayload\CostBreakdown\CarrierFee
 * @phpstan-import-type RateShape from \Telnyx\Messages\OutboundMessagePayload\CostBreakdown\Rate
 *
 * @phpstan-type CostBreakdownShape = array{
 *   carrierFee?: null|CarrierFee|CarrierFeeShape, rate?: null|Rate|RateShape
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
     * @param CarrierFee|CarrierFeeShape|null $carrierFee
     * @param Rate|RateShape|null $rate
     */
    public static function with(
        CarrierFee|array|null $carrierFee = null,
        Rate|array|null $rate = null
    ): self {
        $self = new self;

        null !== $carrierFee && $self['carrierFee'] = $carrierFee;
        null !== $rate && $self['rate'] = $rate;

        return $self;
    }

    /**
     * @param CarrierFee|CarrierFeeShape $carrierFee
     */
    public function withCarrierFee(CarrierFee|array $carrierFee): self
    {
        $self = clone $this;
        $self['carrierFee'] = $carrierFee;

        return $self;
    }

    /**
     * @param Rate|RateShape $rate
     */
    public function withRate(Rate|array $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }
}
