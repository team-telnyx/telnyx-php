<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AccessIPRangeCreateParams); // set properties as needed
 * $client->accessIPRanges->create(...$params->toArray());
 * ```
 * Create new Access IP Range.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->accessIPRanges->create(...$params->toArray());`
 *
 * @see Telnyx\AccessIPRanges->create
 *
 * @phpstan-type access_ip_range_create_params = array{
 *   cidrBlock: string, description?: string
 * }
 */
final class AccessIPRangeCreateParams implements BaseModel
{
    /** @use SdkModel<access_ip_range_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('cidr_block')]
    public string $cidrBlock;

    #[Api(optional: true)]
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

        $obj->cidrBlock = $cidrBlock;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    public function withCidrBlock(string $cidrBlock): self
    {
        $obj = clone $this;
        $obj->cidrBlock = $cidrBlock;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
