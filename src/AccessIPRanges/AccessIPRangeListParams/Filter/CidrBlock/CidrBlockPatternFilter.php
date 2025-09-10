<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter\CidrBlock;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * CIDR block pattern matching operations.
 *
 * @phpstan-type cidr_block_pattern_filter = array{
 *   contains?: string|null, endswith?: string|null, startswith?: string|null
 * }
 */
final class CidrBlockPatternFilter implements BaseModel
{
    /** @use SdkModel<cidr_block_pattern_filter> */
    use SdkModel;

    /**
     * Filter CIDR blocks containing the specified string.
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * Filter CIDR blocks ending with the specified string.
     */
    #[Api(optional: true)]
    public ?string $endswith;

    /**
     * Filter CIDR blocks starting with the specified string.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $contains && $obj->contains = $contains;
        null !== $endswith && $obj->endswith = $endswith;
        null !== $startswith && $obj->startswith = $startswith;

        return $obj;
    }

    /**
     * Filter CIDR blocks containing the specified string.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter CIDR blocks ending with the specified string.
     */
    public function withEndswith(string $endswith): self
    {
        $obj = clone $this;
        $obj->endswith = $endswith;

        return $obj;
    }

    /**
     * Filter CIDR blocks starting with the specified string.
     */
    public function withStartswith(string $startswith): self
    {
        $obj = clone $this;
        $obj->startswith = $startswith;

        return $obj;
    }
}
