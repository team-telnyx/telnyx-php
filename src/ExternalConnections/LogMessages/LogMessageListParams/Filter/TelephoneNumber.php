<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
 *
 * @phpstan-type TelephoneNumberShape = array{
 *   contains?: string|null, eq?: string|null
 * }
 */
final class TelephoneNumber implements BaseModel
{
    /** @use SdkModel<TelephoneNumberShape> */
    use SdkModel;

    /**
     * The partial phone number to filter log messages for. Requires 3-15 digits.
     */
    #[Optional]
    public ?string $contains;

    /**
     * The phone number to filter log messages for or "null" to filter for logs without a phone number.
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
     * The partial phone number to filter log messages for. Requires 3-15 digits.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }

    /**
     * The phone number to filter log messages for or "null" to filter for logs without a phone number.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
