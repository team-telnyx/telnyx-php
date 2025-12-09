<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams;

use Telnyx\Core\Attributes\Optional;
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
 *   createdAt?: \DateTimeInterface|null,
 *   quantity?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?Address $address;

    #[Optional]
    public ?Cost $cost;

    /**
     * Filter by ISO 8601 formatted date-time string matching resource creation date-time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Filter orders by how many SIM cards were ordered.
     */
    #[Optional]
    public ?int $quantity;

    /**
     * Filter by ISO 8601 formatted date-time string matching resource last update date-time.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
     *   administrativeArea?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   locality?: string|null,
     *   postalCode?: string|null,
     *   streetAddress?: string|null,
     * } $address
     * @param Cost|array{amount?: string|null, currency?: string|null} $cost
     */
    public static function with(
        Address|array|null $address = null,
        Cost|array|null $cost = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $quantity = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param Address|array{
     *   id?: string|null,
     *   administrativeArea?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   locality?: string|null,
     *   postalCode?: string|null,
     *   streetAddress?: string|null,
     * } $address
     */
    public function withAddress(Address|array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * @param Cost|array{amount?: string|null, currency?: string|null} $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Filter by ISO 8601 formatted date-time string matching resource creation date-time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter orders by how many SIM cards were ordered.
     */
    public function withQuantity(int $quantity): self
    {
        $self = clone $this;
        $self['quantity'] = $quantity;

        return $self;
    }

    /**
     * Filter by ISO 8601 formatted date-time string matching resource last update date-time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
