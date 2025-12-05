<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create new Access IP Range.
 *
 * @see Telnyx\Services\AccessIPRangesService::create()
 *
 * @phpstan-type AccessIPRangeCreateParamsShape = array{
 *   cidr_block: string, description?: string
 * }
 */
final class AccessIPRangeCreateParams implements BaseModel
{
    /** @use SdkModel<AccessIPRangeCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $cidr_block;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new AccessIPRangeCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPRangeCreateParams::with(cidr_block: ...)
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
        string $cidr_block,
        ?string $description = null
    ): self {
        $obj = new self;

        $obj['cidr_block'] = $cidr_block;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    public function withCidrBlock(string $cidrBlock): self
    {
        $obj = clone $this;
        $obj['cidr_block'] = $cidrBlock;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
