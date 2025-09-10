<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\ShippingCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\SimCardsCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\TotalCost;

/**
 * @phpstan-type data_alias = array{
 *   quantity?: int|null,
 *   recordType?: string|null,
 *   shippingCost?: ShippingCost|null,
 *   simCardsCost?: SimCardsCost|null,
 *   totalCost?: TotalCost|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The amount of SIM cards requested in the SIM card order.
     */
    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('shipping_cost', optional: true)]
    public ?ShippingCost $shippingCost;

    #[Api('sim_cards_cost', optional: true)]
    public ?SimCardsCost $simCardsCost;

    #[Api('total_cost', optional: true)]
    public ?TotalCost $totalCost;

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
        ?int $quantity = null,
        ?string $recordType = null,
        ?ShippingCost $shippingCost = null,
        ?SimCardsCost $simCardsCost = null,
        ?TotalCost $totalCost = null,
    ): self {
        $obj = new self;

        null !== $quantity && $obj->quantity = $quantity;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $shippingCost && $obj->shippingCost = $shippingCost;
        null !== $simCardsCost && $obj->simCardsCost = $simCardsCost;
        null !== $totalCost && $obj->totalCost = $totalCost;

        return $obj;
    }

    /**
     * The amount of SIM cards requested in the SIM card order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withShippingCost(ShippingCost $shippingCost): self
    {
        $obj = clone $this;
        $obj->shippingCost = $shippingCost;

        return $obj;
    }

    public function withSimCardsCost(SimCardsCost $simCardsCost): self
    {
        $obj = clone $this;
        $obj->simCardsCost = $simCardsCost;

        return $obj;
    }

    public function withTotalCost(TotalCost $totalCost): self
    {
        $obj = clone $this;
        $obj->totalCost = $totalCost;

        return $obj;
    }
}
