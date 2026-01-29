<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter phone numbers by pattern matching.
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
     * Filter numbers containing a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    #[Optional]
    public ?string $contains;

    /**
     * Filter numbers ending with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    #[Optional('ends_with')]
    public ?string $endsWith;

    /**
     * Filter numbers starting with a pattern (excludes NDC if used with `national_destination_code` filter).
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
     * Filter numbers containing a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }

    /**
     * Filter numbers ending with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withEndsWith(string $endsWith): self
    {
        $self = clone $this;
        $self['endsWith'] = $endsWith;

        return $self;
    }

    /**
     * Filter numbers starting with a pattern (excludes NDC if used with `national_destination_code` filter).
     */
    public function withStartsWith(string $startsWith): self
    {
        $self = clone $this;
        $self['startsWith'] = $startsWith;

        return $self;
    }
}
