<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   id?: string|null,
 *   administrative_area?: string|null,
 *   country_code?: string|null,
 *   extended_address?: string|null,
 *   locality?: string|null,
 *   postal_code?: string|null,
 *   street_address?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Filter by state or province where the address is located.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * Filter by the name of the city where the address is located.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Filter by postal code for the address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    #[Api(optional: true)]
    public ?string $street_address;

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
        ?string $id = null,
        ?string $administrative_area = null,
        ?string $country_code = null,
        ?string $extended_address = null,
        ?string $locality = null,
        ?string $postal_code = null,
        ?string $street_address = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $administrative_area && $obj->administrative_area = $administrative_area;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $extended_address && $obj->extended_address = $extended_address;
        null !== $locality && $obj->locality = $locality;
        null !== $postal_code && $obj->postal_code = $postal_code;
        null !== $street_address && $obj->street_address = $street_address;

        return $obj;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Filter by state or province where the address is located.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrative_area = $administrativeArea;

        return $obj;
    }

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extended_address = $extendedAddress;

        return $obj;
    }

    /**
     * Filter by the name of the city where the address is located.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * Filter by postal code for the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postal_code = $postalCode;

        return $obj;
    }

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->street_address = $streetAddress;

        return $obj;
    }
}
