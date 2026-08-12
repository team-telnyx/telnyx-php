<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserAddressesUserAddressShape from \Telnyx\UserAddresses\UserAddressesUserAddress
 *
 * @phpstan-type UserAddressGetResponseShape = array{
 *   data?: null|UserAddressesUserAddress|UserAddressesUserAddressShape
 * }
 */
final class UserAddressGetResponse implements BaseModel
{
    /** @use SdkModel<UserAddressGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?UserAddressesUserAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserAddressesUserAddress|UserAddressesUserAddressShape|null $data
     */
    public static function with(
        UserAddressesUserAddress|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param UserAddressesUserAddress|UserAddressesUserAddressShape $data
     */
    public function withData(UserAddressesUserAddress|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
