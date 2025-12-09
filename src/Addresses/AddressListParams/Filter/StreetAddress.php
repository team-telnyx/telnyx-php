<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StreetAddressShape = array{contains?: string|null}
 */
final class StreetAddress implements BaseModel
{
    /** @use SdkModel<StreetAddressShape> */
    use SdkModel;

    /**
     * If present, addresses with <code>street_address</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Optional]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;

        return $self;
    }

    /**
     * If present, addresses with <code>street_address</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }
}
