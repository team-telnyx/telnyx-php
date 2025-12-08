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
 *   contains?: string|null, ends_with?: string|null, starts_with?: string|null
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
    #[Optional]
    public ?string $ends_with;

    /**
     * Filter by the starting digits of the phone number.
     */
    #[Optional]
    public ?string $starts_with;

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
        ?string $ends_with = null,
        ?string $starts_with = null,
    ): self {
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;
        null !== $ends_with && $obj['ends_with'] = $ends_with;
        null !== $starts_with && $obj['starts_with'] = $starts_with;

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
        $obj['ends_with'] = $endsWith;

        return $obj;
    }

    /**
     * Filter by the starting digits of the phone number.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj['starts_with'] = $startsWith;

        return $obj;
    }
}
