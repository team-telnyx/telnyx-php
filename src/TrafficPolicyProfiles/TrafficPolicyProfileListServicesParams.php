<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all available PCEF services that can be used in traffic policy profiles.
 *
 * @see Telnyx\Services\TrafficPolicyProfilesService::listServices()
 *
 * @phpstan-type TrafficPolicyProfileListServicesParamsShape = array{
 *   filterGroup?: string|null,
 *   filterName?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class TrafficPolicyProfileListServicesParams implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileListServicesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter services by group.
     */
    #[Optional]
    public ?string $filterGroup;

    /**
     * Filter services by name.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $filterGroup = null,
        ?string $filterName = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterGroup && $self['filterGroup'] = $filterGroup;
        null !== $filterName && $self['filterName'] = $filterName;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter services by group.
     */
    public function withFilterGroup(string $filterGroup): self
    {
        $self = clone $this;
        $self['filterGroup'] = $filterGroup;

        return $self;
    }

    /**
     * Filter services by name.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
