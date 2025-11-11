<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderEndUserLocationShape = array{
 *   administrative_area?: string|null,
 *   country_code?: string|null,
 *   extended_address?: string|null,
 *   locality?: string|null,
 *   postal_code?: string|null,
 *   street_address?: string|null,
 * }
 */
final class PortingOrderEndUserLocation implements BaseModel
{
    /** @use SdkModel<PortingOrderEndUserLocationShape> */
    use SdkModel;

    /**
     * State, province, or similar of billing address.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * ISO3166-1 alpha-2 country code of billing address.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Second line of billing address.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * City or municipality of billing address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Postal Code of billing address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * First line of billing address.
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
        ?string $administrative_area = null,
        ?string $country_code = null,
        ?string $extended_address = null,
        ?string $locality = null,
        ?string $postal_code = null,
        ?string $street_address = null,
    ): self {
        $obj = new self;

        null !== $administrative_area && $obj->administrative_area = $administrative_area;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $extended_address && $obj->extended_address = $extended_address;
        null !== $locality && $obj->locality = $locality;
        null !== $postal_code && $obj->postal_code = $postal_code;
        null !== $street_address && $obj->street_address = $street_address;

        return $obj;
    }

    /**
     * State, province, or similar of billing address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrative_area = $administrativeArea;

        return $obj;
    }

    /**
     * ISO3166-1 alpha-2 country code of billing address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * Second line of billing address.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extended_address = $extendedAddress;

        return $obj;
    }

    /**
     * City or municipality of billing address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * Postal Code of billing address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postal_code = $postalCode;

        return $obj;
    }

    /**
     * First line of billing address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->street_address = $streetAddress;

        return $obj;
    }
}
