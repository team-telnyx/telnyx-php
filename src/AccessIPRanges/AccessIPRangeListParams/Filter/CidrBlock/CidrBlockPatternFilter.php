<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CidrBlock;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * CIDR block pattern matching operations.
 *
 * @phpstan-type CidrBlockPatternFilterShape = array{
 *   contains?: string|null, endswith?: string|null, startswith?: string|null
 * }
 */
final class CidrBlockPatternFilter implements BaseModel
{
    /** @use SdkModel<CidrBlockPatternFilterShape> */
    use SdkModel;

    /**
     * Filter CIDR blocks containing the specified string.
     */
    #[Optional]
    public ?string $contains;

    /**
     * Filter CIDR blocks ending with the specified string.
     */
    #[Optional]
    public ?string $endswith;

    /**
     * Filter CIDR blocks starting with the specified string.
     */
    #[Optional]
    public ?string $startswith;

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
        ?string $endswith = null,
        ?string $startswith = null
    ): self {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;
        null !== $endswith && $self['endswith'] = $endswith;
        null !== $startswith && $self['startswith'] = $startswith;

        return $self;
    }

    /**
     * Filter CIDR blocks containing the specified string.
     */
    public function withContains(string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }

    /**
     * Filter CIDR blocks ending with the specified string.
     */
    public function withEndswith(string $endswith): self
    {
        $self = clone $this;
        $self['endswith'] = $endswith;

        return $self;
    }

    /**
     * Filter CIDR blocks starting with the specified string.
     */
    public function withStartswith(string $startswith): self
    {
        $self = clone $this;
        $self['startswith'] = $startswith;

        return $self;
    }
}
