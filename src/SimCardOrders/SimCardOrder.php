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
 * @phpstan-type SimCardOrderShape = array{
 *   id?: string|null,
 *   cost?: Cost|null,
 *   createdAt?: string|null,
 *   orderAddress?: OrderAddress|null,
 *   quantity?: int|null,
 *   recordType?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param Cost|array{amount?: string|null, currency?: string|null} $cost
     * @param OrderAddress|array{
     *   id?: string|null,
     *   administrativeArea?: string|null,
     *   businessName?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   locality?: string|null,
     *   postalCode?: string|null,
     *   streetAddress?: string|null,
     * } $orderAddress
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $cost && $obj['cost'] = $cost;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $orderAddress && $obj['orderAddress'] = $orderAddress;
        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $status && $obj['status'] = $status;
        null !== $trackingURL && $obj['trackingURL'] = $trackingURL;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * An object representing the total cost of the order.
     *
     * @param Cost|array{amount?: string|null, currency?: string|null} $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * An object representing the address information from when the order was submitted.
     *
     * @param OrderAddress|array{
     *   id?: string|null,
     *   administrativeArea?: string|null,
     *   businessName?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   locality?: string|null,
     *   postalCode?: string|null,
     *   streetAddress?: string|null,
     * } $orderAddress
     */
    public function withOrderAddress(OrderAddress|array $orderAddress): self
    {
        $obj = clone $this;
        $obj['orderAddress'] = $orderAddress;

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
     * The current status of the SIM Card order.<ul> <li><code>pending</code> - the order is waiting to be processed.</li> <li><code>processing</code> - the order is currently being processed.</li> <li><code>ready_to_ship</code> - the order is ready to be shipped to the specified <b>address</b>.</li> <li><code>shipped</code> - the order was shipped and is on its way to be delivered to the specified <b>address</b>.</li> <li><code>delivered</code> - the order was delivered to the specified <b>address</b>.</li> <li><code>canceled</code> - the order was canceled.</li> </ul>.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The URL used to get tracking information about the order.
     */
    public function withTrackingURL(string $trackingURL): self
    {
        $obj = clone $this;
        $obj['trackingURL'] = $trackingURL;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
