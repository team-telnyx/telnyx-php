<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders\SimCardOrder;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object representing the address information from when the order was submitted.
 *
 * @phpstan-type OrderAddressShape = array{
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
 * }
 */
final class OrderAddress implements BaseModel
{
    /** @use SdkModel<OrderAddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Optional]
    public ?string $id;

    /**
     * State or province where the address is located.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * The name of the business where the address is located.
     */
    #[Optional('business_name')]
    public ?string $businessName;

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Supplemental field for address information.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * The first name of the shipping recipient.
     */
    #[Optional('first_name')]
    public ?string $firstName;

    /**
     * The last name of the shipping recipient.
     */
    #[Optional('last_name')]
    public ?string $lastName;

    /**
     * The name of the city where the address is located.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Postal code for the address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * The name of the street where the address is located.
     */
    #[Optional('street_address')]
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
        ?string $businessName = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $administrativeArea && $obj['administrativeArea'] = $administrativeArea;
        null !== $businessName && $obj['businessName'] = $businessName;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $extendedAddress && $obj['extendedAddress'] = $extendedAddress;
        null !== $firstName && $obj['firstName'] = $firstName;
        null !== $lastName && $obj['lastName'] = $lastName;
        null !== $locality && $obj['locality'] = $locality;
        null !== $postalCode && $obj['postalCode'] = $postalCode;
        null !== $streetAddress && $obj['streetAddress'] = $streetAddress;

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
        $obj['administrativeArea'] = $administrativeArea;

        return $obj;
    }

    /**
     * The name of the business where the address is located.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['businessName'] = $businessName;

        return $obj;
    }

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * Supplemental field for address information.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extendedAddress'] = $extendedAddress;

        return $obj;
    }

    /**
     * The first name of the shipping recipient.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The last name of the shipping recipient.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

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
        $obj['postalCode'] = $postalCode;

        return $obj;
    }

    /**
     * The name of the street where the address is located.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['streetAddress'] = $streetAddress;

        return $obj;
    }
}
