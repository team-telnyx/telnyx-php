<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type porting_order_end_user_location = array{
 *   administrativeArea?: string|null,
 *   countryCode?: string|null,
 *   extendedAddress?: string|null,
 *   locality?: string|null,
 *   postalCode?: string|null,
 *   streetAddress?: string|null,
 * }
 */
final class PortingOrderEndUserLocation implements BaseModel
{
    /** @use SdkModel<porting_order_end_user_location> */
    use SdkModel;

    /**
     * State, province, or similar of billing address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * ISO3166-1 alpha-2 country code of billing address.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Second line of billing address.
     */
    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    /**
     * City or municipality of billing address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Postal Code of billing address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * First line of billing address.
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
        ?string $administrativeArea = null,
        ?string $countryCode = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $obj = new self;

        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $locality && $obj->locality = $locality;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $streetAddress && $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * State, province, or similar of billing address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * ISO3166-1 alpha-2 country code of billing address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Second line of billing address.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

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
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * First line of billing address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }
}
