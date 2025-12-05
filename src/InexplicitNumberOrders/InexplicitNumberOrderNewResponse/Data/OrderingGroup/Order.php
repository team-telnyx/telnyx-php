<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse\Data\OrderingGroup;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrderShape = array{
 *   number_order_id: string, sub_number_order_ids: list<string>
 * }
 */
final class Order implements BaseModel
{
    /** @use SdkModel<OrderShape> */
    use SdkModel;

    /**
     * ID of the main number order.
     */
    #[Api]
    public string $number_order_id;

    /**
     * Array of sub number order IDs.
     *
     * @var list<string> $sub_number_order_ids
     */
    #[Api(list: 'string')]
    public array $sub_number_order_ids;

    /**
     * `new Order()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Order::with(number_order_id: ..., sub_number_order_ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Order)->withNumberOrderID(...)->withSubNumberOrderIDs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $sub_number_order_ids
     */
    public static function with(
        string $number_order_id,
        array $sub_number_order_ids
    ): self {
        $obj = new self;

        $obj['number_order_id'] = $number_order_id;
        $obj['sub_number_order_ids'] = $sub_number_order_ids;

        return $obj;
    }

    /**
     * ID of the main number order.
     */
    public function withNumberOrderID(string $numberOrderID): self
    {
        $obj = clone $this;
        $obj['number_order_id'] = $numberOrderID;

        return $obj;
    }

    /**
     * Array of sub number order IDs.
     *
     * @param list<string> $subNumberOrderIDs
     */
    public function withSubNumberOrderIDs(array $subNumberOrderIDs): self
    {
        $obj = clone $this;
        $obj['sub_number_order_ids'] = $subNumberOrderIDs;

        return $obj;
    }
}
