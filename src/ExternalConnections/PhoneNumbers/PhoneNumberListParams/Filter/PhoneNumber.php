<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberShape = array{contains?: string|null, eq?: string|null}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * The phone number to filter by (partial match).
     */
    #[Optional]
    public ?string $contains;

    /**
     * The phone number to filter by (exact match).
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
    public static function with(
        ?string $contains = null,
        ?string $eq = null
    ): self {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;
        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * The phone number to filter by (partial match).
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }

    /**
     * The phone number to filter by (exact match).
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
