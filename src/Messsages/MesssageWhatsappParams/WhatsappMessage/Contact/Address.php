<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   city?: string|null,
 *   country?: string|null,
 *   countryCode?: string|null,
 *   state?: string|null,
 *   street?: string|null,
 *   type?: string|null,
 *   zip?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    #[Optional]
    public ?string $city;

    #[Optional]
    public ?string $country;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional]
    public ?string $state;

    #[Optional]
    public ?string $street;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?string $zip;

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
        ?string $city = null,
        ?string $country = null,
        ?string $countryCode = null,
        ?string $state = null,
        ?string $street = null,
        ?string $type = null,
        ?string $zip = null,
    ): self {
        $self = new self;

        null !== $city && $self['city'] = $city;
        null !== $country && $self['country'] = $country;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $state && $self['state'] = $state;
        null !== $street && $self['street'] = $street;
        null !== $type && $self['type'] = $type;
        null !== $zip && $self['zip'] = $zip;

        return $self;
    }

    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withStreet(string $street): self
    {
        $self = clone $this;
        $self['street'] = $street;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withZip(string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
