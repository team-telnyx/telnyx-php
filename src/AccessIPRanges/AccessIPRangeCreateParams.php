<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create new Access IP Range.
 *
 * @see Telnyx\Services\AccessIPRangesService::create()
 *
 * @phpstan-type AccessIPRangeCreateParamsShape = array{
 *   cidrBlock: string, description?: string
 * }
 */
final class AccessIPRangeCreateParams implements BaseModel
{
    /** @use SdkModel<AccessIPRangeCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('cidr_block')]
    public string $cidrBlock;

    #[Optional]
    public ?string $description;

    /**
     * `new AccessIPRangeCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPRangeCreateParams::with(cidrBlock: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPRangeCreateParams)->withCidrBlock(...)
     * ```
     */
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
        string $cidrBlock,
        ?string $description = null
    ): self {
        $obj = new self;

        $obj['cidrBlock'] = $cidrBlock;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    public function withCidrBlock(string $cidrBlock): self
    {
        $obj = clone $this;
        $obj['cidrBlock'] = $cidrBlock;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
