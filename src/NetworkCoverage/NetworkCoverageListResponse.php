<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse\Location;

/**
 * @phpstan-type NetworkCoverageListResponseShape = array{
 *   available_services?: list<value-of<AvailableService>>|null,
 *   location?: Location|null,
 *   record_type?: string|null,
 * }
 */
final class NetworkCoverageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NetworkCoverageListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * List of interface types supported in this region.
     *
     * @var list<value-of<AvailableService>>|null $available_services
     */
    #[Api(list: AvailableService::class, optional: true)]
    public ?array $available_services;

    #[Api(optional: true)]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AvailableService|value-of<AvailableService>> $available_services
     */
    public static function with(
        ?array $available_services = null,
        ?Location $location = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $available_services && $obj['available_services'] = $available_services;
        null !== $location && $obj->location = $location;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    /**
     * List of interface types supported in this region.
     *
     * @param list<AvailableService|value-of<AvailableService>> $availableServices
     */
    public function withAvailableServices(array $availableServices): self
    {
        $obj = clone $this;
        $obj['available_services'] = $availableServices;

        return $obj;
    }

    public function withLocation(Location $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
