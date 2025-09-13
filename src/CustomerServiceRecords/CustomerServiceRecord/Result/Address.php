<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The address of the customer service record.
 *
 * @phpstan-type address_alias = array{
 *   administrativeArea?: string,
 *   fullAddress?: string,
 *   locality?: string,
 *   postalCode?: string,
 *   streetAddress?: string,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<address_alias> */
    use SdkModel;

    /**
     * The state of the address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * The full address.
     */
    #[Api('full_address', optional: true)]
    public ?string $fullAddress;

    /**
     * The city of the address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * The zip code of the address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * The street address.
     */
    #[Api('street_address', optional: true)]
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
        $obj = new self;

        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $fullAddress && $obj->fullAddress = $fullAddress;
        null !== $locality && $obj->locality = $locality;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $streetAddress && $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * The state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * The full address.
     */
    public function withFullAddress(string $fullAddress): self
    {
        $obj = clone $this;
        $obj->fullAddress = $fullAddress;

        return $obj;
    }

    /**
     * The city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * The zip code of the address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * The street address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }
}
