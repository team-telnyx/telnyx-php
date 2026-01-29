<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the company.
 *
 * @phpstan-type AddressShape = array{
 *   city: string,
 *   countryCode: string,
 *   state: string,
 *   streetAddress: string,
 *   zipCode: string,
 *   extendedAddress?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The locality of the company.
     */
    #[Required]
    public string $city;

    /**
     * The country code of the company.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * The administrative area of the company.
     */
    #[Required]
    public string $state;

    /**
     * The street address of the company.
     */
    #[Required('street_address')]
    public string $streetAddress;

    /**
     * The postal code of the company.
     */
    #[Required('zip_code')]
    public string $zipCode;

    /**
     * The extended address of the company.
     */
    #[Optional('extended_address')]
    public ?string $extendedAddress;

    /**
     * `new Address()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Address::with(
     *   city: ..., countryCode: ..., state: ..., streetAddress: ..., zipCode: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Address)
     *   ->withCity(...)
     *   ->withCountryCode(...)
     *   ->withState(...)
     *   ->withStreetAddress(...)
     *   ->withZipCode(...)
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
        string $city,
        string $countryCode,
        string $state,
        string $streetAddress,
        string $zipCode,
        ?string $extendedAddress = null,
    ): self {
        $self = new self;

        $self['city'] = $city;
        $self['countryCode'] = $countryCode;
        $self['state'] = $state;
        $self['streetAddress'] = $streetAddress;
        $self['zipCode'] = $zipCode;

        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * The locality of the company.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * The country code of the company.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * The administrative area of the company.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The street address of the company.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * The postal code of the company.
     */
    public function withZipCode(string $zipCode): self
    {
        $self = clone $this;
        $self['zipCode'] = $zipCode;

        return $self;
    }

    /**
     * The extended address of the company.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }
}
