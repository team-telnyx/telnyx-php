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
 * @phpstan-type DataShape = array{
 *   quantity?: int|null,
 *   recordType?: string|null,
 *   shippingCost?: ShippingCost|null,
 *   simCardsCost?: SimCardsCost|null,
 *   totalCost?: TotalCost|null,
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
     * @param ShippingCost|array{
     *   amount?: string|null, currency?: string|null
     * } $shippingCost
     * @param SimCardsCost|array{
     *   amount?: string|null, currency?: string|null
     * } $simCardsCost
     * @param TotalCost|array{amount?: string|null, currency?: string|null} $totalCost
     */
    public static function with(
        ?int $quantity = null,
        ?string $recordType = null,
        ShippingCost|array|null $shippingCost = null,
        SimCardsCost|array|null $simCardsCost = null,
        TotalCost|array|null $totalCost = null,
    ): self {
        $obj = new self;

        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $shippingCost && $obj['shippingCost'] = $shippingCost;
        null !== $simCardsCost && $obj['simCardsCost'] = $simCardsCost;
        null !== $totalCost && $obj['totalCost'] = $totalCost;

        return $obj;
    }

    /**
     * The amount of SIM cards requested in the SIM card order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * @param ShippingCost|array{
     *   amount?: string|null, currency?: string|null
     * } $shippingCost
     */
    public function withShippingCost(ShippingCost|array $shippingCost): self
    {
        $obj = clone $this;
        $obj['shippingCost'] = $shippingCost;

        return $obj;
    }

    /**
     * @param SimCardsCost|array{
     *   amount?: string|null, currency?: string|null
     * } $simCardsCost
     */
    public function withSimCardsCost(SimCardsCost|array $simCardsCost): self
    {
        $obj = clone $this;
        $obj['simCardsCost'] = $simCardsCost;

        return $obj;
    }

    /**
     * @param TotalCost|array{amount?: string|null, currency?: string|null} $totalCost
     */
    public function withTotalCost(TotalCost|array $totalCost): self
    {
        $obj = clone $this;
        $obj['totalCost'] = $totalCost;

        return $obj;
    }
}
