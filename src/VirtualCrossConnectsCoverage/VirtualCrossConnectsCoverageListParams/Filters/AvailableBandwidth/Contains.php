<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters\AvailableBandwidth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Available bandwidth filtering operations.
 *
 * @phpstan-type ContainsShape = array{contains?: int}
 */
final class Contains implements BaseModel
{
    /** @use SdkModel<ContainsShape> */
    use SdkModel;

    /**
     * Filter by available bandwidth containing the specified value.
     */
    #[Api(optional: true)]
    public ?int $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter by available bandwidth containing the specified value.
     */
    public function withContains(int $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }
}
