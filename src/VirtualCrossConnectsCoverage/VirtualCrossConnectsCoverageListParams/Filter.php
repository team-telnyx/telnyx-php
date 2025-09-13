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
 * @phpstan-type filter_alias = array{
 *   cloudProvider?: value-of<CloudProvider>,
 *   cloudProviderRegion?: string,
 *   locationCode?: string,
 *   locationPop?: string,
 *   locationRegion?: string,
 *   locationSite?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The Virtual Private Cloud provider.
     *
     * @var value-of<CloudProvider>|null $cloudProvider
     */
    #[Api('cloud_provider', enum: CloudProvider::class, optional: true)]
    public ?string $cloudProvider;

    /**
     * The region of specific cloud provider.
     */
    #[Api('cloud_provider_region', optional: true)]
    public ?string $cloudProviderRegion;

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
     *
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public static function with(
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        ?string $locationCode = null,
        ?string $locationPop = null,
        ?string $locationRegion = null,
        ?string $locationSite = null,
    ): self {
        $obj = new self;

        null !== $cloudProvider && $obj->cloudProvider = $cloudProvider instanceof CloudProvider ? $cloudProvider->value : $cloudProvider;
        null !== $cloudProviderRegion && $obj->cloudProviderRegion = $cloudProviderRegion;
        null !== $locationCode && $obj->locationCode = $locationCode;
        null !== $locationPop && $obj->locationPop = $locationPop;
        null !== $locationRegion && $obj->locationRegion = $locationRegion;
        null !== $locationSite && $obj->locationSite = $locationSite;

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
        $obj->cloudProvider = $cloudProvider instanceof CloudProvider ? $cloudProvider->value : $cloudProvider;

        return $obj;
    }

    /**
     * The region of specific cloud provider.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj->cloudProviderRegion = $cloudProviderRegion;

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
