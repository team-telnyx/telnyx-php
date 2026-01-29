<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UserAddressShape from \Telnyx\UserAddresses\UserAddress
 *
 * @phpstan-type UserAddressGetResponseShape = array{
 *   data?: null|UserAddress|UserAddressShape
 * }
 */
final class UserAddressGetResponse implements BaseModel
{
    /** @use SdkModel<UserAddressGetResponseShape> */
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
     * @param UserAddress|UserAddressShape|null $data
     */
    public static function with(UserAddress|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param UserAddress|UserAddressShape $data
     */
    public function withData(UserAddress|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
