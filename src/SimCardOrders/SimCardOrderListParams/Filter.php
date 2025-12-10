<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code].
 *
 * @phpstan-type FilterShape = array{
 *   addressAdministrativeArea?: string|null,
 *   addressCountryCode?: string|null,
 *   addressExtendedAddress?: string|null,
 *   addressID?: string|null,
 *   addressLocality?: string|null,
 *   addressPostalCode?: string|null,
 *   addressStreetAddress?: string|null,
 *   costAmount?: string|null,
 *   costCurrency?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   quantity?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by state or province where the address is located.
     */
    #[Optional('address.administrative_area')]
    public ?string $addressAdministrativeArea;

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Optional('address.country_code')]
    public ?string $addressCountryCode;

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    #[Optional('address.extended_address')]
    public ?string $addressExtendedAddress;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Optional('address.id')]
    public ?string $addressID;

    /**
     * Filter by the name of the city where the address is located.
     */
    #[Optional('address.locality')]
    public ?string $addressLocality;

    /**
     * Filter by postal code for the address.
     */
    #[Optional('address.postal_code')]
    public ?string $addressPostalCode;

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    #[Optional('address.street_address')]
    public ?string $addressStreetAddress;

    /**
     * The total monetary amount of the order.
     */
    #[Optional('cost.amount')]
    public ?string $costAmount;

    /**
     * Filter by ISO 4217 currency string.
     */
    #[Optional('cost.currency')]
    public ?string $costCurrency;

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
     */
    public static function with(
        ?string $addressAdministrativeArea = null,
        ?string $addressCountryCode = null,
        ?string $addressExtendedAddress = null,
        ?string $addressID = null,
        ?string $addressLocality = null,
        ?string $addressPostalCode = null,
        ?string $addressStreetAddress = null,
        ?string $costAmount = null,
        ?string $costCurrency = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $quantity = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $addressAdministrativeArea && $self['addressAdministrativeArea'] = $addressAdministrativeArea;
        null !== $addressCountryCode && $self['addressCountryCode'] = $addressCountryCode;
        null !== $addressExtendedAddress && $self['addressExtendedAddress'] = $addressExtendedAddress;
        null !== $addressID && $self['addressID'] = $addressID;
        null !== $addressLocality && $self['addressLocality'] = $addressLocality;
        null !== $addressPostalCode && $self['addressPostalCode'] = $addressPostalCode;
        null !== $addressStreetAddress && $self['addressStreetAddress'] = $addressStreetAddress;
        null !== $costAmount && $self['costAmount'] = $costAmount;
        null !== $costCurrency && $self['costCurrency'] = $costCurrency;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $quantity && $self['quantity'] = $quantity;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Filter by state or province where the address is located.
     */
    public function withAddressAdministrativeArea(
        string $addressAdministrativeArea
    ): self {
        $self = clone $this;
        $self['addressAdministrativeArea'] = $addressAdministrativeArea;

        return $self;
    }

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withAddressCountryCode(string $addressCountryCode): self
    {
        $self = clone $this;
        $self['addressCountryCode'] = $addressCountryCode;

        return $self;
    }

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    public function withAddressExtendedAddress(
        string $addressExtendedAddress
    ): self {
        $self = clone $this;
        $self['addressExtendedAddress'] = $addressExtendedAddress;

        return $self;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withAddressID(string $addressID): self
    {
        $self = clone $this;
        $self['addressID'] = $addressID;

        return $self;
    }

    /**
     * Filter by the name of the city where the address is located.
     */
    public function withAddressLocality(string $addressLocality): self
    {
        $self = clone $this;
        $self['addressLocality'] = $addressLocality;

        return $self;
    }

    /**
     * Filter by postal code for the address.
     */
    public function withAddressPostalCode(string $addressPostalCode): self
    {
        $self = clone $this;
        $self['addressPostalCode'] = $addressPostalCode;

        return $self;
    }

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    public function withAddressStreetAddress(string $addressStreetAddress): self
    {
        $self = clone $this;
        $self['addressStreetAddress'] = $addressStreetAddress;

        return $self;
    }

    /**
     * The total monetary amount of the order.
     */
    public function withCostAmount(string $costAmount): self
    {
        $self = clone $this;
        $self['costAmount'] = $costAmount;

        return $self;
    }

    /**
     * Filter by ISO 4217 currency string.
     */
    public function withCostCurrency(string $costCurrency): self
    {
        $self = clone $this;
        $self['costCurrency'] = $costCurrency;

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
