<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AddressShape from \Telnyx\Addresses\Address
 *
 * @phpstan-type AddressDeleteResponseShape = array{
 *   data?: null|Address|AddressShape
 * }
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
     * @param Address|AddressShape|null $data
     */
    public static function with(Address|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Address|AddressShape $data
     */
    public function withData(Address|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
