<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Validates an address for emergency services.
 *
 * @see Telnyx\Services\Addresses\ActionsService::validate()
 *
 * @phpstan-type ActionValidateParamsShape = array{
 *   country_code: string,
 *   postal_code: string,
 *   street_address: string,
 *   administrative_area?: string,
 *   extended_address?: string,
 *   locality?: string,
 * }
 */
final class ActionValidateParams implements BaseModel
{
    /** @use SdkModel<ActionValidateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Required]
    public string $country_code;

    /**
     * The postal code of the address.
     */
    #[Required]
    public string $postal_code;

    /**
     * The primary street address information about the address.
     */
    #[Required]
    public string $street_address;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Optional]
    public ?string $administrative_area;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Optional]
    public ?string $extended_address;

    /**
     * The locality of the address. For US addresses, this corresponds to the city of the address.
     */
    #[Optional]
    public ?string $locality;

    /**
     * `new ActionValidateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionValidateParams::with(
     *   country_code: ..., postal_code: ..., street_address: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionValidateParams)
     *   ->withCountryCode(...)
     *   ->withPostalCode(...)
     *   ->withStreetAddress(...)
     * ```
     */
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
        string $country_code,
        string $postal_code,
        string $street_address,
        ?string $administrative_area = null,
        ?string $extended_address = null,
        ?string $locality = null,
    ): self {
        $obj = new self;

        $obj['country_code'] = $country_code;
        $obj['postal_code'] = $postal_code;
        $obj['street_address'] = $street_address;

        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $locality && $obj['locality'] = $locality;

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
}
