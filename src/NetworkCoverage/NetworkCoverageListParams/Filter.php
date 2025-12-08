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
 *   location_code?: string|null,
 *   location_pop?: string|null,
 *   location_region?: string|null,
 *   location_site?: string|null,
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
    public ?string $location_code;

    /**
     * The POP of associated location to filter on.
     */
    #[Optional('location.pop')]
    public ?string $location_pop;

    /**
     * The region of associated location to filter on.
     */
    #[Optional('location.region')]
    public ?string $location_region;

    /**
     * The site of associated location to filter on.
     */
    #[Optional('location.site')]
    public ?string $location_site;

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
        ?string $location_code = null,
        ?string $location_pop = null,
        ?string $location_region = null,
        ?string $location_site = null,
    ): self {
        $obj = new self;

        null !== $location_code && $obj['location_code'] = $location_code;
        null !== $location_pop && $obj['location_pop'] = $location_pop;
        null !== $location_region && $obj['location_region'] = $location_region;
        null !== $location_site && $obj['location_site'] = $location_site;

        return $obj;
    }

    /**
     * The code of associated location to filter on.
     */
    public function withLocationCode(string $locationCode): self
    {
        $obj = clone $this;
        $obj['location_code'] = $locationCode;

        return $obj;
    }

    /**
     * The POP of associated location to filter on.
     */
    public function withLocationPop(string $locationPop): self
    {
        $obj = clone $this;
        $obj['location_pop'] = $locationPop;

        return $obj;
    }

    /**
     * The region of associated location to filter on.
     */
    public function withLocationRegion(string $locationRegion): self
    {
        $obj = clone $this;
        $obj['location_region'] = $locationRegion;

        return $obj;
    }

    /**
     * The site of associated location to filter on.
     */
    public function withLocationSite(string $locationSite): self
    {
        $obj = clone $this;
        $obj['location_site'] = $locationSite;

        return $obj;
    }
}
