<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands\BrandResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   administrativeArea: string,
 *   city: string,
 *   countryCode: string,
 *   line1: string,
 *   postalCode: string,
 *   line2?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    #[Required('administrative_area')]
    public string $administrativeArea;

    #[Required]
    public string $city;

    /**
     * The two-letter ISO 3166-1 country code.
     */
    #[Required('country_code')]
    public string $countryCode;

    #[Required('line_1')]
    public string $line1;

    #[Required('postal_code')]
    public string $postalCode;

    #[Optional('line_2', nullable: true)]
    public ?string $line2;

    /**
     * `new Address()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Address::with(
     *   administrativeArea: ...,
     *   city: ...,
     *   countryCode: ...,
     *   line1: ...,
     *   postalCode: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Address)
     *   ->withAdministrativeArea(...)
     *   ->withCity(...)
     *   ->withCountryCode(...)
     *   ->withLine1(...)
     *   ->withPostalCode(...)
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
        string $countryCode,
        string $line1,
        string $postalCode,
        ?string $line2 = null,
    ): self {
        $self = new self;

        $self['administrativeArea'] = $administrativeArea;
        $self['city'] = $city;
        $self['countryCode'] = $countryCode;
        $self['line1'] = $line1;
        $self['postalCode'] = $postalCode;

        null !== $line2 && $self['line2'] = $line2;

        return $self;
    }

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
     * The two-letter ISO 3166-1 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withLine1(string $line1): self
    {
        $self = clone $this;
        $self['line1'] = $line1;

        return $self;
    }

    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    public function withLine2(?string $line2): self
    {
        $self = clone $this;
        $self['line2'] = $line2;

        return $self;
    }
}
