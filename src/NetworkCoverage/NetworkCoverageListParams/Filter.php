<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
 *
 * @phpstan-type FilterShape = array{
 *   locationCode?: string|null,
 *   locationPop?: string|null,
 *   locationRegion?: string|null,
 *   locationSite?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The code of associated location to filter on.
     */
    #[Optional('location.code')]
    public ?string $locationCode;

    /**
     * The POP of associated location to filter on.
     */
    #[Optional('location.pop')]
    public ?string $locationPop;

    /**
     * The region of associated location to filter on.
     */
    #[Optional('location.region')]
    public ?string $locationRegion;

    /**
     * The site of associated location to filter on.
     */
    #[Optional('location.site')]
    public ?string $locationSite;

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
        ?string $locationCode = null,
        ?string $locationPop = null,
        ?string $locationRegion = null,
        ?string $locationSite = null,
    ): self {
        $self = new self;

        null !== $locationCode && $self['locationCode'] = $locationCode;
        null !== $locationPop && $self['locationPop'] = $locationPop;
        null !== $locationRegion && $self['locationRegion'] = $locationRegion;
        null !== $locationSite && $self['locationSite'] = $locationSite;

        return $self;
    }

    /**
     * The code of associated location to filter on.
     */
    public function withLocationCode(string $locationCode): self
    {
        $self = clone $this;
        $self['locationCode'] = $locationCode;

        return $self;
    }

    /**
     * The POP of associated location to filter on.
     */
    public function withLocationPop(string $locationPop): self
    {
        $self = clone $this;
        $self['locationPop'] = $locationPop;

        return $self;
    }

    /**
     * The region of associated location to filter on.
     */
    public function withLocationRegion(string $locationRegion): self
    {
        $self = clone $this;
        $self['locationRegion'] = $locationRegion;

        return $self;
    }

    /**
     * The site of associated location to filter on.
     */
    public function withLocationSite(string $locationSite): self
    {
        $self = clone $this;
        $self['locationSite'] = $locationSite;

        return $self;
    }
}
