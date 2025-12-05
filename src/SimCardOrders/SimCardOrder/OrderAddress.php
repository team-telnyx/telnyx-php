<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrder;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object representing the address information from when the order was submitted.
 *
 * @phpstan-type OrderAddressShape = array{
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
 * }
 */
final class OrderAddress implements BaseModel
{
    /** @use SdkModel<OrderAddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * State or province where the address is located.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * The name of the business where the address is located.
     */
    #[Api(optional: true)]
    public ?string $business_name;

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Supplemental field for address information.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * The first name of the shipping recipient.
     */
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * The last name of the shipping recipient.
     */
    #[Api(optional: true)]
    public ?string $last_name;

    /**
     * The name of the city where the address is located.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Postal code for the address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * The name of the street where the address is located.
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
        ?string $business_name = null,
        ?string $country_code = null,
        ?string $extended_address = null,
        ?string $first_name = null,
        ?string $last_name = null,
        ?string $locality = null,
        ?string $postal_code = null,
        ?string $street_address = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $business_name && $obj['business_name'] = $business_name;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $locality && $obj['locality'] = $locality;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $street_address && $obj['street_address'] = $street_address;

        return $obj;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * State or province where the address is located.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * The name of the business where the address is located.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['business_name'] = $businessName;

        return $obj;
    }

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Supplemental field for address information.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

        return $obj;
    }

    /**
     * The first name of the shipping recipient.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * The last name of the shipping recipient.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * The name of the city where the address is located.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * Postal code for the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * The name of the street where the address is located.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }
}
