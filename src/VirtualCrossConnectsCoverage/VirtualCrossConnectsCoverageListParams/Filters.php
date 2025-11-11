<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters\AvailableBandwidth\Contains;

/**
 * Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains].
 *
 * @phpstan-type FiltersShape = array{available_bandwidth?: int|null|Contains}
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * Filter by exact available bandwidth match.
     */
    #[Api(optional: true)]
    public int|Contains|null $available_bandwidth;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int|Contains|null $available_bandwidth = null): self
    {
        $obj = new self;

        null !== $available_bandwidth && $obj->available_bandwidth = $available_bandwidth;

        return $obj;
    }

    /**
     * Filter by exact available bandwidth match.
     */
    public function withAvailableBandwidth(
        int|Contains $availableBandwidth
    ): self {
        $obj = clone $this;
        $obj->available_bandwidth = $availableBandwidth;

        return $obj;
    }
}
