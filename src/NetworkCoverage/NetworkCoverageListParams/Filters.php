<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices\Contains;

/**
 * Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains].
 *
 * @phpstan-type FiltersShape = array{
 *   available_services?: null|Contains|value-of<AvailableService>
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * Filter by exact available service match.
     *
     * @var Contains|value-of<AvailableService>|null $available_services
     */
    #[Optional(union: AvailableServices::class)]
    public Contains|string|null $available_services;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AvailableService|Contains|array{
     *   contains?: value-of<AvailableService>|null
     * }|value-of<AvailableService> $available_services
     */
    public static function with(
        AvailableService|Contains|array|string|null $available_services = null
    ): self {
        $obj = new self;

        null !== $available_services && $obj['available_services'] = $available_services;

        return $obj;
    }

    /**
     * Filter by exact available service match.
     *
     * @param AvailableService|Contains|array{
     *   contains?: value-of<AvailableService>|null
     * }|value-of<AvailableService> $availableServices
     */
    public function withAvailableServices(
        AvailableService|Contains|array|string $availableServices
    ): self {
        $obj = clone $this;
        $obj['available_services'] = $availableServices;

        return $obj;
    }
}
