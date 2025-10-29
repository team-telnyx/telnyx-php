<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Provides normalized address when available.
 *
 * @phpstan-type SuggestedShape = array{
 *   administrativeArea?: string,
 *   countryCode?: string,
 *   extendedAddress?: string,
 *   locality?: string,
 *   postalCode?: string,
 *   streetAddress?: string,
 * }
 */
final class Suggested implements BaseModel
{
    /** @use SdkModel<SuggestedShape> */
    use SdkModel;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * The postal code of the address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * The primary street address information about the address.
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
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }
}
