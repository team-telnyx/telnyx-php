<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse\Data\Location;

/**
 * @phpstan-type data_alias = array{
 *   availableServices?: list<value-of<AvailableService>>,
 *   location?: Location,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * List of interface types supported in this region.
     *
     * @var list<value-of<AvailableService>>|null $availableServices
     */
    #[Api('available_services', list: AvailableService::class, optional: true)]
    public ?array $availableServices;

    #[Api(optional: true)]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
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
     */
    public static function with(
        ?array $availableServices = null,
        ?Location $location = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $availableServices && $obj->availableServices = array_map(fn ($v) => $v instanceof AvailableService ? $v->value : $v, $availableServices);
        null !== $location && $obj->location = $location;
        null !== $recordType && $obj->recordType = $recordType;

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
        $obj->availableServices = array_map(fn ($v) => $v instanceof AvailableService ? $v->value : $v, $availableServices);

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
        $obj->recordType = $recordType;

        return $obj;
    }
}
