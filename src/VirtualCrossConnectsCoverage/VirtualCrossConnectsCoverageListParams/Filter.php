<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter\CloudProvider;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code].
 *
 * @phpstan-type FilterShape = array{
 *   cloudProvider?: value-of<CloudProvider>|null,
 *   cloudProviderRegion?: string|null,
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
     * The Virtual Private Cloud provider.
     *
     * @var value-of<CloudProvider>|null $cloudProvider
     */
    #[Optional('cloud_provider', enum: CloudProvider::class)]
    public ?string $cloudProvider;

    /**
     * The region of specific cloud provider.
     */
    #[Optional('cloud_provider_region')]
    public ?string $cloudProviderRegion;

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

        null !== $cloudProvider && $obj['cloudProvider'] = $cloudProvider;
        null !== $cloudProviderRegion && $obj['cloudProviderRegion'] = $cloudProviderRegion;
        null !== $locationCode && $obj['locationCode'] = $locationCode;
        null !== $locationPop && $obj['locationPop'] = $locationPop;
        null !== $locationRegion && $obj['locationRegion'] = $locationRegion;
        null !== $locationSite && $obj['locationSite'] = $locationSite;

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
        $obj['cloudProvider'] = $cloudProvider;

        return $obj;
    }

    /**
     * The region of specific cloud provider.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj['cloudProviderRegion'] = $cloudProviderRegion;

        return $obj;
    }

    /**
     * The code of associated location to filter on.
     */
    public function withLocationCode(string $locationCode): self
    {
        $obj = clone $this;
        $obj['locationCode'] = $locationCode;

        return $obj;
    }

    /**
     * The POP of associated location to filter on.
     */
    public function withLocationPop(string $locationPop): self
    {
        $obj = clone $this;
        $obj['locationPop'] = $locationPop;

        return $obj;
    }

    /**
     * The region of associated location to filter on.
     */
    public function withLocationRegion(string $locationRegion): self
    {
        $obj = clone $this;
        $obj['locationRegion'] = $locationRegion;

        return $obj;
    }

    /**
     * The site of associated location to filter on.
     */
    public function withLocationSite(string $locationSite): self
    {
        $obj = clone $this;
        $obj['locationSite'] = $locationSite;

        return $obj;
    }
}
