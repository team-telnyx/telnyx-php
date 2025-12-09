<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data\OrderingGroup;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrderShape = array{
 *   numberOrderID: string, subNumberOrderIDs: list<string>
 * }
 */
final class Order implements BaseModel
{
    /** @use SdkModel<OrderShape> */
    use SdkModel;

    /**
     * ID of the main number order.
     */
    #[Required('number_order_id')]
    public string $numberOrderID;

    /**
     * Array of sub number order IDs.
     *
     * @var list<string> $subNumberOrderIDs
     */
    #[Required('sub_number_order_ids', list: 'string')]
    public array $subNumberOrderIDs;

    /**
     * `new Order()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Order::with(numberOrderID: ..., subNumberOrderIDs: ...)
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
     * @param list<string> $subNumberOrderIDs
     */
    public static function with(
        string $numberOrderID,
        array $subNumberOrderIDs
    ): self {
        $obj = new self;

        $obj['numberOrderID'] = $numberOrderID;
        $obj['subNumberOrderIDs'] = $subNumberOrderIDs;

        return $obj;
    }

    /**
     * ID of the main number order.
     */
    public function withNumberOrderID(string $numberOrderID): self
    {
        $obj = clone $this;
        $obj['numberOrderID'] = $numberOrderID;

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
        $obj['subNumberOrderIDs'] = $subNumberOrderIDs;

        return $obj;
    }
}
