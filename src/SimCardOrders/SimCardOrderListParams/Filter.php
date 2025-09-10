<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter\Address;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter\Cost;

/**
 * Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code].
 *
 * @phpstan-type filter_alias = array{
 *   address?: Address|null,
 *   cost?: Cost|null,
 *   createdAt?: \DateTimeInterface|null,
 *   quantity?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Address $address;

    #[Api(optional: true)]
    public ?Cost $cost;

    /**
     * Filter by ISO 8601 formatted date-time string matching resource creation date-time.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Filter orders by how many SIM cards were ordered.
     */
    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * Filter by ISO 8601 formatted date-time string matching resource last update date-time.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

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
        ?Address $address = null,
        ?Cost $cost = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $quantity = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $address && $obj->address = $address;
        null !== $cost && $obj->cost = $cost;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withAddress(Address $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    public function withCost(Cost $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Filter by ISO 8601 formatted date-time string matching resource creation date-time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter orders by how many SIM cards were ordered.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Filter by ISO 8601 formatted date-time string matching resource last update date-time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
