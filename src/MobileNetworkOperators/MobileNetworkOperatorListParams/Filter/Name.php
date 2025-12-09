<?php

declare(strict_types=1);

namespace Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Advanced name filtering operations.
 *
 * @phpstan-type NameShape = array{
 *   contains?: string|null, endsWith?: string|null, startsWith?: string|null
 * }
 */
final class Name implements BaseModel
{
    /** @use SdkModel<NameShape> */
    use SdkModel;

    /**
     * Filter by name containing match.
     */
    #[Optional]
    public ?string $contains;

    /**
     * Filter by name ending with.
     */
    #[Optional('ends_with')]
    public ?string $endsWith;

    /**
     * Filter by name starting with.
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
     * Filter by name containing match.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }

    /**
     * Filter by name ending with.
     */
    public function withEndsWith(string $endsWith): self
    {
        $self = clone $this;
        $self['endsWith'] = $endsWith;

        return $self;
    }

    /**
     * Filter by name starting with.
     */
    public function withStartsWith(string $startsWith): self
    {
        $self = clone $this;
        $self['startsWith'] = $startsWith;

        return $self;
    }
}
