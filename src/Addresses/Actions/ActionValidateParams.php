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
    /** @use SdkModel<ActionValidateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * The postal code of the address.
     */
    #[Required('postal_code')]
    public string $postalCode;

    /**
     * The primary street address information about the address.
     */
    #[Required('street_address')]
    public string $streetAddress;

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

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

        $obj['countryCode'] = $countryCode;
        $obj['postalCode'] = $postalCode;
        $obj['streetAddress'] = $streetAddress;

        null !== $administrativeArea && $obj['administrativeArea'] = $administrativeArea;
        null !== $extendedAddress && $obj['extendedAddress'] = $extendedAddress;
        null !== $locality && $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * The postal code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postalCode'] = $postalCode;

        return $obj;
    }

    /**
     * The primary street address information about the address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['streetAddress'] = $streetAddress;

        return $obj;
    }

    /**
     * The locality of the address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrativeArea'] = $administrativeArea;

        return $obj;
    }

    /**
     * Additional street address information about the address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extendedAddress'] = $extendedAddress;

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
