<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhysicalAddressShape = array{
 *   administrativeArea: string,
 *   city: string,
 *   country: string,
 *   postalCode: string,
 *   streetAddress: string,
 *   extendedAddress?: string|null,
 * }
 */
final class PhysicalAddress implements BaseModel
{
    /** @use SdkModel<PhysicalAddressShape> */
    use SdkModel;

    /**
     * State or province code (e.g. `IL`, `ON`).
     */
    #[Required('administrative_area')]
    public string $administrativeArea;

    #[Required]
    public string $city;

    /**
     * ISO 3166-1 alpha-2 code (currently `US` or `CA`).
     */
    #[Required]
    public string $country;

    #[Required('postal_code')]
    public string $postalCode;

    #[Required('street_address')]
    public string $streetAddress;

    #[Optional('extended_address', nullable: true)]
    public ?string $extendedAddress;

    /**
     * `new PhysicalAddress()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhysicalAddress::with(
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
     * (new PhysicalAddress)
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
     * State or province code (e.g. `IL`, `ON`).
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 code (currently `US` or `CA`).
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    public function withExtendedAddress(?string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }
}
