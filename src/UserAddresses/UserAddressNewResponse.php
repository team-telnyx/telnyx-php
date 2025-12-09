<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserAddressNewResponseShape = array{data?: UserAddress|null}
 */
final class UserAddressNewResponse implements BaseModel
{
    /** @use SdkModel<UserAddressNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?UserAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserAddress|array{
     *   id?: string|null,
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
     * } $data
     */
    public static function with(UserAddress|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param UserAddress|array{
     *   id?: string|null,
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
     * } $data
     */
    public function withData(UserAddress|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
