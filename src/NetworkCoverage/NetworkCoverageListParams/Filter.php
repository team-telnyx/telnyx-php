<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
 *
 * @phpstan-type filter_alias = array{
 *   locationCode?: string|null,
 *   locationPop?: string|null,
 *   locationRegion?: string|null,
 *   locationSite?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The code of associated location to filter on.
     */
    #[Api('location.code', optional: true)]
    public ?string $locationCode;

    /**
     * The POP of associated location to filter on.
     */
    #[Api('location.pop', optional: true)]
    public ?string $locationPop;

    /**
     * The region of associated location to filter on.
     */
    #[Api('location.region', optional: true)]
    public ?string $locationRegion;

    /**
     * The site of associated location to filter on.
     */
    #[Api('location.site', optional: true)]
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
        $obj = new self;

        null !== $locationCode && $obj->locationCode = $locationCode;
        null !== $locationPop && $obj->locationPop = $locationPop;
        null !== $locationRegion && $obj->locationRegion = $locationRegion;
        null !== $locationSite && $obj->locationSite = $locationSite;

        return $obj;
    }

    /**
     * The code of associated location to filter on.
     */
    public function withLocationCode(string $locationCode): self
    {
        $obj = clone $this;
        $obj->locationCode = $locationCode;

        return $obj;
    }

    /**
     * The POP of associated location to filter on.
     */
    public function withLocationPop(string $locationPop): self
    {
        $obj = clone $this;
        $obj->locationPop = $locationPop;

        return $obj;
    }

    /**
     * The region of associated location to filter on.
     */
    public function withLocationRegion(string $locationRegion): self
    {
        $obj = clone $this;
        $obj->locationRegion = $locationRegion;

        return $obj;
    }

    /**
     * The site of associated location to filter on.
     */
    public function withLocationSite(string $locationSite): self
    {
        $obj = clone $this;
        $obj->locationSite = $locationSite;

        return $obj;
    }
}
