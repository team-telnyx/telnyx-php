<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrganizationPhysicalAddressShape = array{
 *   administrativeArea: string,
 *   city: string,
 *   country: string,
 *   postalCode: string,
 *   streetAddress: string,
 *   extendedAddress?: string|null,
 * }
 */
final class OrganizationPhysicalAddress implements BaseModel
{
    /** @use SdkModel<OrganizationPhysicalAddressShape> */
    use SdkModel;

    /**
     * State or province.
     */
    #[Required('administrative_area')]
    public string $administrativeArea;

    /**
     * City name.
     */
    #[Required]
    public string $city;

    /**
     * Country name (e.g., United States).
     */
    #[Required]
    public string $country;

    /**
     * ZIP or postal code.
     */
    #[Required('postal_code')]
    public string $postalCode;

    /**
     * Street address.
     */
    #[Required('street_address')]
    public string $streetAddress;

    /**
     * Additional address line (suite, apt, etc.).
     */
    #[Optional('extended_address', nullable: true)]
    public ?string $extendedAddress;

    /**
     * `new OrganizationPhysicalAddress()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrganizationPhysicalAddress::with(
     *   administrativeArea: ...,
     *   city: ...,
     *   country: ...,
     *   postalCode: ...,
     *   streetAddress: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OrganizationPhysicalAddress)
     *   ->withAdministrativeArea(...)
     *   ->withCity(...)
     *   ->withCountry(...)
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
        string $administrativeArea,
        string $city,
        string $country,
        string $postalCode,
        string $streetAddress,
        ?string $extendedAddress = null,
    ): self {
        $self = new self;

        $self['administrativeArea'] = $administrativeArea;
        $self['city'] = $city;
        $self['country'] = $country;
        $self['postalCode'] = $postalCode;
        $self['streetAddress'] = $streetAddress;

        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * State or province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * City name.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * Country name (e.g., United States).
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * ZIP or postal code.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * Street address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * Additional address line (suite, apt, etc.).
     */
    public function withExtendedAddress(?string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }
}
