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
 *   administrative_area?: string|null,
 *   country_code?: string|null,
 *   extended_address?: string|null,
 *   locality?: string|null,
 *   postal_code?: string|null,
 *   street_address?: string|null,
 * }
 */
final class Suggested implements BaseModel
{
    /** @use SdkModel<SuggestedShape> */
    use SdkModel;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * The postal code of the address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * The primary street address information about the address.
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

        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $locality && $obj['locality'] = $locality;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $street_address && $obj['street_address'] = $street_address;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }
}
