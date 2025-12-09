<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Phone number search criteria.
 *
 * @phpstan-type PhoneNumberShape = array{
 *   contains?: string|null, endsWith?: string|null, startsWith?: string|null
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    #[Optional]
    public ?string $contains;

    /**
     * Filter by the ending digits of the phone number.
     */
    #[Optional('ends_with')]
    public ?string $endsWith;

    /**
     * Filter by the starting digits of the phone number.
     */
    #[Optional('starts_with')]
    public ?string $startsWith;

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
        ?string $contains = null,
        ?string $endsWith = null,
        ?string $startsWith = null
    ): self {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;
        null !== $endsWith && $self['endsWith'] = $endsWith;
        null !== $startsWith && $self['startsWith'] = $startsWith;

        return $self;
    }

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }

    /**
     * Filter by the ending digits of the phone number.
     */
    public function withEndsWith(string $endsWith): self
    {
        $self = clone $this;
        $self['endsWith'] = $endsWith;

        return $self;
    }

    /**
     * Filter by the starting digits of the phone number.
     */
    public function withStartsWith(string $startsWith): self
    {
        $self = clone $this;
        $self['startsWith'] = $startsWith;

        return $self;
    }
}
