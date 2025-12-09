<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters\AvailableBandwidth\Contains;

/**
 * Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains].
 *
 * @phpstan-type FiltersShape = array{availableBandwidth?: int|null|Contains}
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * Filter by exact available bandwidth match.
     */
    #[Optional('available_bandwidth')]
    public int|Contains|null $availableBandwidth;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param int|Contains|array{contains?: int|null} $availableBandwidth
     */
    public static function with(
        int|Contains|array|null $availableBandwidth = null
    ): self {
        $obj = new self;

        null !== $availableBandwidth && $obj['availableBandwidth'] = $availableBandwidth;

        return $obj;
    }

    /**
     * Filter by exact available bandwidth match.
     *
     * @param int|Contains|array{contains?: int|null} $availableBandwidth
     */
    public function withAvailableBandwidth(
        int|Contains|array $availableBandwidth
    ): self {
        $obj = clone $this;
        $obj['availableBandwidth'] = $availableBandwidth;

        return $obj;
    }
}
