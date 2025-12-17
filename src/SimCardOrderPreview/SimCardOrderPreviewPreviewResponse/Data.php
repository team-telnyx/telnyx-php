<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\ShippingCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\SimCardsCost;
use Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\TotalCost;

/**
 * @phpstan-import-type ShippingCostShape from \Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\ShippingCost
 * @phpstan-import-type SimCardsCostShape from \Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\SimCardsCost
 * @phpstan-import-type TotalCostShape from \Telnyx\SimCardOrderPreview\SimCardOrderPreviewPreviewResponse\Data\TotalCost
 *
 * @phpstan-type DataShape = array{
 *   quantity?: int|null,
 *   recordType?: string|null,
 *   shippingCost?: null|ShippingCost|ShippingCostShape,
 *   simCardsCost?: null|SimCardsCost|SimCardsCostShape,
 *   totalCost?: null|TotalCost|TotalCostShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The amount of SIM cards requested in the SIM card order.
     */
    #[Optional]
    public ?int $quantity;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('shipping_cost')]
    public ?ShippingCost $shippingCost;

    #[Optional('sim_cards_cost')]
    public ?SimCardsCost $simCardsCost;

    #[Optional('total_cost')]
    public ?TotalCost $totalCost;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ShippingCost|ShippingCostShape|null $shippingCost
     * @param SimCardsCost|SimCardsCostShape|null $simCardsCost
     * @param TotalCost|TotalCostShape|null $totalCost
     */
    public static function with(
        ?int $quantity = null,
        ?string $recordType = null,
        ShippingCost|array|null $shippingCost = null,
        SimCardsCost|array|null $simCardsCost = null,
        TotalCost|array|null $totalCost = null,
    ): self {
        $self = new self;

        null !== $quantity && $self['quantity'] = $quantity;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $shippingCost && $self['shippingCost'] = $shippingCost;
        null !== $simCardsCost && $self['simCardsCost'] = $simCardsCost;
        null !== $totalCost && $self['totalCost'] = $totalCost;

        return $self;
    }

    /**
     * The amount of SIM cards requested in the SIM card order.
     */
    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param ShippingCost|ShippingCostShape $shippingCost
     */
    public function withShippingCost(ShippingCost|array $shippingCost): self
    {
        $self = clone $this;
        $self['shippingCost'] = $shippingCost;

        return $self;
    }

    /**
     * @param SimCardsCost|SimCardsCostShape $simCardsCost
     */
    public function withSimCardsCost(SimCardsCost|array $simCardsCost): self
    {
        $self = clone $this;
        $self['simCardsCost'] = $simCardsCost;

        return $self;
    }

    /**
     * @param TotalCost|TotalCostShape $totalCost
     */
    public function withTotalCost(TotalCost|array $totalCost): self
    {
        $self = clone $this;
        $self['totalCost'] = $totalCost;

        return $self;
    }
}
