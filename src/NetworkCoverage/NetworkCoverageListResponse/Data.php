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
 *   availableServices?: list<value-of<AvailableService>>|null,
 *   location?: Location|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * List of interface types supported in this region.
     *
     * @var list<value-of<AvailableService>>|null $availableServices
     */
    #[Optional('available_services', list: AvailableService::class)]
    public ?array $availableServices;

    #[Optional]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AvailableService|value-of<AvailableService>> $availableServices
     * @param Location|array{
     *   code?: string|null,
     *   name?: string|null,
     *   pop?: string|null,
     *   region?: string|null,
     *   site?: string|null,
     * } $location
     */
    public static function with(
        ?array $availableServices = null,
        Location|array|null $location = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $availableServices && $self['availableServices'] = $availableServices;
        null !== $location && $self['location'] = $location;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * List of interface types supported in this region.
     *
     * @param list<AvailableService|value-of<AvailableService>> $availableServices
     */
    public function withAvailableServices(array $availableServices): self
    {
        $self = clone $this;
        $self['availableServices'] = $availableServices;

        return $self;
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
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
