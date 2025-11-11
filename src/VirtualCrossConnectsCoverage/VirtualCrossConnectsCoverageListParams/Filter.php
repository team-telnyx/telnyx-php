<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter\CloudProvider;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
 *
 * @phpstan-type FilterShape = array{
 *   cloud_provider?: value-of<CloudProvider>|null,
 *   cloud_provider_region?: string|null,
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
     * The Virtual Private Cloud provider.
     *
     * @var value-of<CloudProvider>|null $cloud_provider
     */
    #[Api(enum: CloudProvider::class, optional: true)]
    public ?string $cloud_provider;

    /**
     * The region of specific cloud provider.
     */
    #[Api(optional: true)]
    public ?string $cloud_provider_region;

    /**
     * The code of associated location to filter on.
     */
    #[Api('location.code', optional: true)]
    public ?string $location_code;

    /**
     * The POP of associated location to filter on.
     */
    #[Api('location.pop', optional: true)]
    public ?string $location_pop;

    /**
     * The region of associated location to filter on.
     */
    #[Api('location.region', optional: true)]
    public ?string $location_region;

    /**
     * The site of associated location to filter on.
     */
    #[Api('location.site', optional: true)]
    public ?string $location_site;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CloudProvider|value-of<CloudProvider> $cloud_provider
     */
    public static function with(
        CloudProvider|string|null $cloud_provider = null,
        ?string $cloud_provider_region = null,
        ?string $location_code = null,
        ?string $location_pop = null,
        ?string $location_region = null,
        ?string $location_site = null,
    ): self {
        $obj = new self;

        null !== $cloud_provider && $obj['cloud_provider'] = $cloud_provider;
        null !== $cloud_provider_region && $obj->cloud_provider_region = $cloud_provider_region;
        null !== $location_code && $obj->location_code = $location_code;
        null !== $location_pop && $obj->location_pop = $location_pop;
        null !== $location_region && $obj->location_region = $location_region;
        null !== $location_site && $obj->location_site = $location_site;

        return $obj;
    }

    /**
     * The Virtual Private Cloud provider.
     *
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public function withCloudProvider(CloudProvider|string $cloudProvider): self
    {
        $obj = clone $this;
        $obj['cloud_provider'] = $cloudProvider;

        return $obj;
    }

    /**
     * The region of specific cloud provider.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj->cloud_provider_region = $cloudProviderRegion;

        return $obj;
    }

    /**
     * The code of associated location to filter on.
     */
    public function withLocationCode(string $locationCode): self
    {
        $obj = clone $this;
        $obj->location_code = $locationCode;

        return $obj;
    }

    /**
     * The POP of associated location to filter on.
     */
    public function withLocationPop(string $locationPop): self
    {
        $obj = clone $this;
        $obj->location_pop = $locationPop;

        return $obj;
    }

    /**
     * The region of associated location to filter on.
     */
    public function withLocationRegion(string $locationRegion): self
    {
        $obj = clone $this;
        $obj->location_region = $locationRegion;

        return $obj;
    }

    /**
     * The site of associated location to filter on.
     */
    public function withLocationSite(string $locationSite): self
    {
        $obj = clone $this;
        $obj->location_site = $locationSite;

        return $obj;
    }
}
