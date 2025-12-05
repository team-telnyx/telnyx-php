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
 * @phpstan-type SimCardOrderShape = array{
 *   id?: string|null,
 *   cost?: Cost|null,
 *   created_at?: string|null,
 *   order_address?: OrderAddress|null,
 *   quantity?: int|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   tracking_url?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class SimCardOrder implements BaseModel
{
    /** @use SdkModel<SimCardOrderShape> */
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
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * An object representing the address information from when the order was submitted.
     */
    #[Api(optional: true)]
    public ?OrderAddress $order_address;

    /**
     * The amount of SIM cards requested in the SIM card order.
     */
    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
    #[Api(optional: true)]
    public ?string $tracking_url;

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
     *   administrative_area?: string|null,
     *   business_name?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
     * } $order_address
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        Cost|array|null $cost = null,
        ?string $created_at = null,
        OrderAddress|array|null $order_address = null,
        ?int $quantity = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?string $tracking_url = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $cost && $obj['cost'] = $cost;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $order_address && $obj['order_address'] = $order_address;
        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $tracking_url && $obj['tracking_url'] = $tracking_url;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * An object representing the address information from when the order was submitted.
     *
     * @param OrderAddress|array{
     *   id?: string|null,
     *   administrative_area?: string|null,
     *   business_name?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
     * } $orderAddress
     */
    public function withOrderAddress(OrderAddress|array $orderAddress): self
    {
        $obj = clone $this;
        $obj['order_address'] = $orderAddress;

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
        $obj['tracking_url'] = $trackingURL;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
