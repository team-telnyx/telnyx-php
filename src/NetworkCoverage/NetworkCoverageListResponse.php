<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NetappsLocation17904fcfbcShape from \Telnyx\NetworkCoverage\NetappsLocation17904fcfbc
 *
 * @phpstan-type NetworkCoverageListResponseShape = array{
 *   availableServices?: list<AvailableService|value-of<AvailableService>>|null,
 *   location?: null|NetappsLocation17904fcfbc|NetappsLocation17904fcfbcShape,
 *   recordType?: string|null,
 * }
 */
final class NetworkCoverageListResponse implements BaseModel
{
    /** @use SdkModel<NetworkCoverageListResponseShape> */
    use SdkModel;

    /**
     * List of interface types supported in this region.
     *
     * @var list<value-of<AvailableService>>|null $availableServices
     */
    #[Optional('available_services', list: AvailableService::class)]
    public ?array $availableServices;

    #[Optional]
    public ?NetappsLocation17904fcfbc $location;

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
     * @param list<AvailableService|value-of<AvailableService>>|null $availableServices
     * @param NetappsLocation17904fcfbc|NetappsLocation17904fcfbcShape|null $location
     */
    public static function with(
        ?array $availableServices = null,
        NetappsLocation17904fcfbc|array|null $location = null,
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
     * @param NetappsLocation17904fcfbc|NetappsLocation17904fcfbcShape $location
     */
    public function withLocation(
        NetappsLocation17904fcfbc|array $location
    ): self {
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
