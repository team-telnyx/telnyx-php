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
 *   contains?: string|null, ends_with?: string|null, starts_with?: string|null
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
    #[Optional]
    public ?string $ends_with;

    /**
     * Filter by name starting with.
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
        $obj['ends_with'] = $endsWith;

        return $obj;
    }

    /**
     * Filter by name starting with.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj['starts_with'] = $startsWith;

        return $obj;
    }
}
