<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrders\SimCardOrder\Cost;
use Telnyx\SimCardOrders\SimCardOrder\OrderAddress;
use Telnyx\SimCardOrders\SimCardOrder\Status;

/**
 * @phpstan-import-type CostShape from \Telnyx\SimCardOrders\SimCardOrder\Cost
 * @phpstan-import-type OrderAddressShape from \Telnyx\SimCardOrders\SimCardOrder\OrderAddress
 *
 * @phpstan-type SimCardOrderShape = array{
 *   id?: string|null,
 *   cost?: null|Cost|CostShape,
 *   createdAt?: string|null,
 *   orderAddress?: null|OrderAddress|OrderAddressShape,
 *   quantity?: int|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   trackingURL?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class SimCardOrder implements BaseModel
{
    /** @use SdkModel<SimCardOrderShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * An object representing the total cost of the order.
     */
    #[Optional]
    public ?Cost $cost;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * An object representing the address information from when the order was submitted.
     */
    #[Optional('order_address')]
    public ?OrderAddress $orderAddress;

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

    /**
     * The current status of the SIM Card order.<ul> <li><code>pending</code> - the order is waiting to be processed.</li> <li><code>processing</code> - the order is currently being processed.</li> <li><code>ready_to_ship</code> - the order is ready to be shipped to the specified <b>address</b>.</li> <li><code>shipped</code> - the order was shipped and is on its way to be delivered to the specified <b>address</b>.</li> <li><code>delivered</code> - the order was delivered to the specified <b>address</b>.</li> <li><code>canceled</code> - the order was canceled.</li> </ul>.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The URL used to get tracking information about the order.
     */
    #[Optional('tracking_url')]
    public ?string $trackingURL;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Optional('updated_at')]
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
     * @param Cost|CostShape|null $cost
     * @param OrderAddress|OrderAddressShape|null $orderAddress
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        Cost|array|null $cost = null,
        ?string $createdAt = null,
        OrderAddress|array|null $orderAddress = null,
        ?int $quantity = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?string $trackingURL = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $orderAddress && $self['orderAddress'] = $orderAddress;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $trackingURL && $self['trackingURL'] = $trackingURL;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An object representing the total cost of the order.
     *
     * @param Cost|CostShape $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * An object representing the address information from when the order was submitted.
     *
     * @param OrderAddress|OrderAddressShape $orderAddress
     */
    public function withOrderAddress(OrderAddress|array $orderAddress): self
    {
        $self = clone $this;
        $self['orderAddress'] = $orderAddress;

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
     * The current status of the SIM Card order.<ul> <li><code>pending</code> - the order is waiting to be processed.</li> <li><code>processing</code> - the order is currently being processed.</li> <li><code>ready_to_ship</code> - the order is ready to be shipped to the specified <b>address</b>.</li> <li><code>shipped</code> - the order was shipped and is on its way to be delivered to the specified <b>address</b>.</li> <li><code>delivered</code> - the order was delivered to the specified <b>address</b>.</li> <li><code>canceled</code> - the order was canceled.</li> </ul>.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The URL used to get tracking information about the order.
     */
    public function withTrackingURL(string $trackingURL): self
    {
        $self = clone $this;
        $self['trackingURL'] = $trackingURL;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
