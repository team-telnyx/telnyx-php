<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices\Contains;

/**
 * Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains].
 *
 * @phpstan-type filters_alias = array{
 *   availableServices?: null|Contains|value-of<AvailableService>
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<filters_alias> */
    use SdkModel;

    /**
     * Filter by exact available service match.
     *
     * @var Contains|value-of<AvailableService>|null $availableServices
     */
    #[Api('available_services', union: AvailableServices::class, optional: true)]
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
     * @param AvailableService|Contains|value-of<AvailableService> $availableServices
     */
    public static function with(
        AvailableService|Contains|string|null $availableServices = null
    ): self {
        $obj = new self;

        null !== $availableServices && $obj->availableServices = $availableServices instanceof AvailableService ? $availableServices->value : $availableServices;

        return $obj;
    }

    /**
     * Filter by exact available service match.
     *
     * @param AvailableService|Contains|value-of<AvailableService> $availableServices
     */
    public function withAvailableServices(
        AvailableService|Contains|string $availableServices
    ): self {
        $obj = clone $this;
        $obj->availableServices = $availableServices instanceof AvailableService ? $availableServices->value : $availableServices;

        return $obj;
    }
}
