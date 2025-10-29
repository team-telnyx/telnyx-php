<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   id?: string,
 *   administrativeArea?: string,
 *   countryCode?: string,
 *   extendedAddress?: string,
 *   locality?: string,
 *   postalCode?: string,
 *   streetAddress?: string,
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
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    /**
     * Filter by the name of the city where the address is located.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Filter by postal code for the address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    #[Api('street_address', optional: true)]
    public ?string $streetAddress;

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
        ?string $administrativeArea = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $locality && $obj->locality = $locality;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $streetAddress && $obj->streetAddress = $streetAddress;

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
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * Filter by the mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Returns entries with matching name of the supplemental field for address information.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

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
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * Returns entries with matching name of the street where the address is located.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }
}
