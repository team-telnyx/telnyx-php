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
 *   contains?: string, endsWith?: string, startsWith?: string
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
    #[Api('ends_with', optional: true)]
    public ?string $endsWith;

    /**
     * Filter numbers starting with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    #[Api('starts_with', optional: true)]
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

        null !== $contains && $obj->contains = $contains;
        null !== $endsWith && $obj->endsWith = $endsWith;
        null !== $startsWith && $obj->startsWith = $startsWith;

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
        $obj->endsWith = $endsWith;

        return $obj;
    }

    /**
     * Filter numbers starting with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj->startsWith = $startsWith;

        return $obj;
    }
}
