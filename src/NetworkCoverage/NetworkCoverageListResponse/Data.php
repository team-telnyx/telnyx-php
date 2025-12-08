<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse\Data\Location;

/**
 * @phpstan-type DataShape = array{
 *   available_services?: list<value-of<AvailableService>>|null,
 *   location?: Location|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * List of interface types supported in this region.
     *
     * @var list<value-of<AvailableService>>|null $available_services
     */
    #[Optional(list: AvailableService::class)]
    public ?array $available_services;

    #[Optional]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
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
     * @param Location|array{
     *   code?: string|null,
     *   name?: string|null,
     *   pop?: string|null,
     *   region?: string|null,
     *   site?: string|null,
     * } $location
     */
    public static function with(
        ?array $available_services = null,
        Location|array|null $location = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $available_services && $obj['available_services'] = $available_services;
        null !== $location && $obj['location'] = $location;
        null !== $record_type && $obj['record_type'] = $record_type;

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

    /**
     * @param Location|array{
     *   code?: string|null,
     *   name?: string|null,
     *   pop?: string|null,
     *   region?: string|null,
     *   site?: string|null,
     * } $location
     */
    public function withLocation(Location|array $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
