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
 * @phpstan-import-type AvailableServicesShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices
 *
 * @phpstan-type FiltersShape = array{
 *   availableServices?: AvailableServicesShape|null
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * Filter by exact available service match.
     *
     * @var Contains|value-of<AvailableService>|null $availableServices
     */
    #[Optional('available_services', union: AvailableServices::class)]
    public Contains|string|null $availableServices;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AvailableServicesShape $availableServices
     */
    public static function with(
        AvailableService|Contains|array|string|null $availableServices = null
    ): self {
        $self = new self;

        null !== $availableServices && $self['availableServices'] = $availableServices;

        return $self;
    }

    /**
     * Filter by exact available service match.
     *
     * @param AvailableServicesShape $availableServices
     */
    public function withAvailableServices(
        AvailableService|Contains|array|string $availableServices
    ): self {
        $self = clone $this;
        $self['availableServices'] = $availableServices;

        return $self;
    }
}
