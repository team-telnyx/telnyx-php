<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressDeleteResponseShape = array{data?: Address|null}
 */
final class AddressDeleteResponse implements BaseModel
{
    /** @use SdkModel<AddressDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Address $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Address|array{
     *   id?: string|null,
     *   addressBook?: bool|null,
     *   administrativeArea?: string|null,
     *   borough?: string|null,
     *   businessName?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   extendedAddress?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phoneNumber?: string|null,
     *   postalCode?: string|null,
     *   recordType?: string|null,
     *   streetAddress?: string|null,
     *   updatedAt?: string|null,
     *   validateAddress?: bool|null,
     * } $data
     */
    public static function with(Address|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Address|array{
     *   id?: string|null,
     *   addressBook?: bool|null,
     *   administrativeArea?: string|null,
     *   borough?: string|null,
     *   businessName?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   extendedAddress?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phoneNumber?: string|null,
     *   postalCode?: string|null,
     *   recordType?: string|null,
     *   streetAddress?: string|null,
     *   updatedAt?: string|null,
     *   validateAddress?: bool|null,
     * } $data
     */
    public function withData(Address|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
