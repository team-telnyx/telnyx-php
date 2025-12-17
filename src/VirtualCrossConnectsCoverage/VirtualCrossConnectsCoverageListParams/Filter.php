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
 *   cloudProvider?: null|CloudProvider|value-of<CloudProvider>,
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
     * @param CloudProvider|value-of<CloudProvider>|null $cloudProvider
     */
    public static function with(
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        ?string $locationCode = null,
        ?string $locationPop = null,
        ?string $locationRegion = null,
        ?string $locationSite = null,
    ): self {
        $self = new self;

        null !== $cloudProvider && $self['cloudProvider'] = $cloudProvider;
        null !== $cloudProviderRegion && $self['cloudProviderRegion'] = $cloudProviderRegion;
        null !== $locationCode && $self['locationCode'] = $locationCode;
        null !== $locationPop && $self['locationPop'] = $locationPop;
        null !== $locationRegion && $self['locationRegion'] = $locationRegion;
        null !== $locationSite && $self['locationSite'] = $locationSite;

        return $self;
    }

    /**
     * The Virtual Private Cloud provider.
     *
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public function withCloudProvider(CloudProvider|string $cloudProvider): self
    {
        $self = clone $this;
        $self['cloudProvider'] = $cloudProvider;

        return $self;
    }

    /**
     * The region of specific cloud provider.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $self = clone $this;
        $self['cloudProviderRegion'] = $cloudProviderRegion;

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
