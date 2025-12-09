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
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;
        null !== $endsWith && $obj['endsWith'] = $endsWith;
        null !== $startsWith && $obj['startsWith'] = $startsWith;

        return $obj;
    }

    /**
     * Filter by name containing match.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * Filter by name ending with.
     */
    public function withEndsWith(string $endsWith): self
    {
        $obj = clone $this;
        $obj['endsWith'] = $endsWith;

        return $obj;
    }

    /**
     * Filter by name starting with.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj['startsWith'] = $startsWith;

        return $obj;
    }
}
