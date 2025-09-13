<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrders\SimCardOrder\Cost;
use Telnyx\SimCardOrders\SimCardOrder\OrderAddress;
use Telnyx\SimCardOrders\SimCardOrder\Status;

/**
 * @phpstan-type sim_card_order = array{
 *   id?: string,
 *   cost?: Cost,
 *   createdAt?: string,
 *   orderAddress?: OrderAddress,
 *   quantity?: int,
 *   recordType?: string,
 *   status?: value-of<Status>,
 *   trackingURL?: string,
 *   updatedAt?: string,
 * }
 */
final class SimCardOrder implements BaseModel
{
    /** @use SdkModel<sim_card_order> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * An object representing the total cost of the order.
     */
    #[Api(optional: true)]
    public ?Cost $cost;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * An object representing the address information from when the order was submitted.
     */
    #[Api('order_address', optional: true)]
    public ?OrderAddress $orderAddress;

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

    /**
     * The current status of the SIM Card order.<ul> <li><code>pending</code> - the order is waiting to be processed.</li> <li><code>processing</code> - the order is currently being processed.</li> <li><code>ready_to_ship</code> - the order is ready to be shipped to the specified <b>address</b>.</li> <li><code>shipped</code> - the order was shipped and is on its way to be delivered to the specified <b>address</b>.</li> <li><code>delivered</code> - the order was delivered to the specified <b>address</b>.</li> <li><code>canceled</code> - the order was canceled.</li> </ul>.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The URL used to get tracking information about the order.
     */
    #[Api('tracking_url', optional: true)]
    public ?string $trackingURL;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?Cost $cost = null,
        ?string $createdAt = null,
        ?OrderAddress $orderAddress = null,
        ?int $quantity = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?string $trackingURL = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $cost && $obj->cost = $cost;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $orderAddress && $obj->orderAddress = $orderAddress;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $trackingURL && $obj->trackingURL = $trackingURL;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * An object representing the total cost of the order.
     */
    public function withCost(Cost $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * An object representing the address information from when the order was submitted.
     */
    public function withOrderAddress(OrderAddress $orderAddress): self
    {
        $obj = clone $this;
        $obj->orderAddress = $orderAddress;

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

    /**
     * The current status of the SIM Card order.<ul> <li><code>pending</code> - the order is waiting to be processed.</li> <li><code>processing</code> - the order is currently being processed.</li> <li><code>ready_to_ship</code> - the order is ready to be shipped to the specified <b>address</b>.</li> <li><code>shipped</code> - the order was shipped and is on its way to be delivered to the specified <b>address</b>.</li> <li><code>delivered</code> - the order was delivered to the specified <b>address</b>.</li> <li><code>canceled</code> - the order was canceled.</li> </ul>.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The URL used to get tracking information about the order.
     */
    public function withTrackingURL(string $trackingURL): self
    {
        $obj = clone $this;
        $obj->trackingURL = $trackingURL;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
