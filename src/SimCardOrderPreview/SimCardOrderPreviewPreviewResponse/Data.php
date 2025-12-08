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
 *   record_type?: string|null,
 *   shipping_cost?: ShippingCost|null,
 *   sim_cards_cost?: SimCardsCost|null,
 *   total_cost?: TotalCost|null,
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
    #[Optional]
    public ?string $record_type;

    #[Optional]
    public ?ShippingCost $shipping_cost;

    #[Optional]
    public ?SimCardsCost $sim_cards_cost;

    #[Optional]
    public ?TotalCost $total_cost;

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
     * } $shipping_cost
     * @param SimCardsCost|array{
     *   amount?: string|null, currency?: string|null
     * } $sim_cards_cost
     * @param TotalCost|array{amount?: string|null, currency?: string|null} $total_cost
     */
    public static function with(
        ?int $quantity = null,
        ?string $record_type = null,
        ShippingCost|array|null $shipping_cost = null,
        SimCardsCost|array|null $sim_cards_cost = null,
        TotalCost|array|null $total_cost = null,
    ): self {
        $obj = new self;

        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $shipping_cost && $obj['shipping_cost'] = $shipping_cost;
        null !== $sim_cards_cost && $obj['sim_cards_cost'] = $sim_cards_cost;
        null !== $total_cost && $obj['total_cost'] = $total_cost;

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
        $obj['record_type'] = $recordType;

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
        $obj['shipping_cost'] = $shippingCost;

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
        $obj['sim_cards_cost'] = $simCardsCost;

        return $obj;
    }

    /**
     * @param TotalCost|array{amount?: string|null, currency?: string|null} $totalCost
     */
    public function withTotalCost(TotalCost|array $totalCost): self
    {
        $obj = clone $this;
        $obj['total_cost'] = $totalCost;

        return $obj;
    }
}
