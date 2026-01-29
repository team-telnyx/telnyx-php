<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the customer service record.
 *
 * @phpstan-type AddressShape = array{
 *   administrativeArea?: string|null,
 *   fullAddress?: string|null,
 *   locality?: string|null,
 *   postalCode?: string|null,
 *   streetAddress?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The state of the address.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * The full address.
     */
    #[Optional('full_address')]
    public ?string $fullAddress;

    /**
     * The city of the address.
     */
    #[Optional]
    public ?string $locality;

    /**
     * The zip code of the address.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * The street address.
     */
    #[Optional('street_address')]
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
        ?string $fullAddress = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $streetAddress = null,
    ): self {
        $self = new self;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $fullAddress && $self['fullAddress'] = $fullAddress;
        null !== $locality && $self['locality'] = $locality;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $streetAddress && $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * The state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * The full address.
     */
    public function withFullAddress(string $fullAddress): self
    {
        $self = clone $this;
        $self['fullAddress'] = $fullAddress;

        return $self;
    }

    /**
     * The city of the address.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * The zip code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * The street address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }
}
