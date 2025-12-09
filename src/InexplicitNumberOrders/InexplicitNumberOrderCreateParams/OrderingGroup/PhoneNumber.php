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
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;
        null !== $endsWith && $obj['endsWith'] = $endsWith;
        null !== $startsWith && $obj['startsWith'] = $startsWith;

        return $obj;
    }

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * Filter by the ending digits of the phone number.
     */
    public function withEndsWith(string $endsWith): self
    {
        $obj = clone $this;
        $obj['endsWith'] = $endsWith;

        return $obj;
    }

    /**
     * Filter by the starting digits of the phone number.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj['startsWith'] = $startsWith;

        return $obj;
    }
}
