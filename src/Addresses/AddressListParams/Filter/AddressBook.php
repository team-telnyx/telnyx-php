<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressBookShape = array{eq?: string|null}
 */
final class AddressBook implements BaseModel
{
    /** @use SdkModel<AddressBookShape> */
    use SdkModel;

    /**
     * If present, only returns results with the <code>address_book</code> flag equal to the given value.
     */
    #[Optional]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * If present, only returns results with the <code>address_book</code> flag equal to the given value.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
