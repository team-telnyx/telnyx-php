<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionValidateParams); // set properties as needed
 * $client->addresses.actions->validate(...$params->toArray());
 * ```
 * Validates an address for emergency services.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->addresses.actions->validate(...$params->toArray());`
 *
 * @see Telnyx\Addresses\Actions->validate
 *
 * @phpstan-type action_validate_params = array{
 *   countryCode: string,
 *   postalCode: string,
 *   streetAddress: string,
 *   administrativeArea?: string,
 *   extendedAddress?: string,
 *   locality?: string,
 * }
 */
final class ActionValidateParams implements BaseModel
{
    /** @use SdkModel<action_validate_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Api('country_code')]
    public string $countryCode;

    /**
     * The postal code of the address.
     */
    #[Api('postal_code')]
    public string $postalCode;

    /**
     * The primary street address information about the address.
     */
    #[Api('street_address')]
    public string $streetAddress;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

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
     * `new ActionValidateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionValidateParams::with(
     *   countryCode: ..., postalCode: ..., streetAddress: ...
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
        string $countryCode,
        string $postalCode,
        string $streetAddress,
        ?string $administrativeArea = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
    ): self {
        $obj = new self;

        $obj->countryCode = $countryCode;
        $obj->postalCode = $postalCode;
        $obj->streetAddress = $streetAddress;

        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $locality && $obj->locality = $locality;

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
}
