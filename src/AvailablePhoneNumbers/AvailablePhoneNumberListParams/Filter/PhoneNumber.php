<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter phone numbers by pattern matching.
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
     * Filter numbers containing a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * Filter numbers ending with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    #[Api(optional: true)]
    public ?string $ends_with;

    /**
     * Filter numbers starting with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    #[Api(optional: true)]
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

        null !== $contains && $obj->contains = $contains;
        null !== $ends_with && $obj->ends_with = $ends_with;
        null !== $starts_with && $obj->starts_with = $starts_with;

        return $obj;
    }

    /**
     * Filter numbers containing a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter numbers ending with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withEndsWith(string $endsWith): self
    {
        $obj = clone $this;
        $obj->ends_with = $endsWith;

        return $obj;
    }

    /**
     * Filter numbers starting with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj->starts_with = $startsWith;

        return $obj;
    }
}
