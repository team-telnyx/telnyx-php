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
 * @phpstan-type FilterShape = array{
 *   address?: Address|null,
 *   cost?: Cost|null,
 *   created_at?: \DateTimeInterface|null,
 *   quantity?: int|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Address $address;

    #[Api(optional: true)]
    public ?Cost $cost;

    /**
     * Filter by ISO 8601 formatted date-time string matching resource creation date-time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Filter orders by how many SIM cards were ordered.
     */
    #[Api(optional: true)]
    public ?int $quantity;

    /**
     * Filter by ISO 8601 formatted date-time string matching resource last update date-time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Address|array{
     *   id?: string|null,
     *   administrative_area?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
     * } $address
     * @param Cost|array{amount?: string|null, currency?: string|null} $cost
     */
    public static function with(
        Address|array|null $address = null,
        Cost|array|null $cost = null,
        ?\DateTimeInterface $created_at = null,
        ?int $quantity = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $address && $obj['address'] = $address;
        null !== $cost && $obj['cost'] = $cost;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $quantity && $obj['quantity'] = $quantity;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * @param Address|array{
     *   id?: string|null,
     *   administrative_area?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
     * } $address
     */
    public function withAddress(Address|array $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * @param Cost|array{amount?: string|null, currency?: string|null} $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * Filter by ISO 8601 formatted date-time string matching resource creation date-time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Filter orders by how many SIM cards were ordered.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * Filter by ISO 8601 formatted date-time string matching resource last update date-time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
