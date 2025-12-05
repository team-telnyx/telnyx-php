<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the customer service record.
 *
 * @phpstan-type AddressShape = array{
 *   administrative_area?: string|null,
 *   full_address?: string|null,
 *   locality?: string|null,
 *   postal_code?: string|null,
 *   street_address?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /**
     * The state of the address.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * The full address.
     */
    #[Api(optional: true)]
    public ?string $full_address;

    /**
     * The city of the address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * The zip code of the address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * The street address.
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
        ?string $full_address = null,
        ?string $locality = null,
        ?string $postal_code = null,
        ?string $street_address = null,
    ): self {
        $obj = new self;

        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $full_address && $obj['full_address'] = $full_address;
        null !== $locality && $obj['locality'] = $locality;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $street_address && $obj['street_address'] = $street_address;

        return $obj;
    }

    /**
     * The state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * The full address.
     */
    public function withFullAddress(string $fullAddress): self
    {
        $obj = clone $this;
        $obj['full_address'] = $fullAddress;

        return $obj;
    }

    /**
     * The city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * The zip code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * The street address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }
}
