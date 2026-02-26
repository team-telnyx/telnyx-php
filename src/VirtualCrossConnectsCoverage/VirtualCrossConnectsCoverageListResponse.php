<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetappsLocation;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\CloudProvider;

/**
 * @phpstan-import-type NetappsLocationShape from \Telnyx\NetappsLocation
 *
 * @phpstan-type VirtualCrossConnectsCoverageListResponseShape = array{
 *   availableBandwidth?: list<float>|null,
 *   cloudProvider?: null|CloudProvider|value-of<CloudProvider>,
 *   cloudProviderRegion?: string|null,
 *   location?: null|NetappsLocation|NetappsLocationShape,
 *   recordType?: string|null,
 * }
 */
final class VirtualCrossConnectsCoverageListResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectsCoverageListResponseShape> */
    use SdkModel;

    /**
     * The available throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     *
     * @var list<float>|null $availableBandwidth
     */
    #[Optional('available_bandwidth', list: 'float')]
    public ?array $availableBandwidth;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider>|null $cloudProvider
     */
    #[Optional('cloud_provider', enum: CloudProvider::class)]
    public ?string $cloudProvider;

    /**
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    #[Optional('cloud_provider_region')]
    public ?string $cloudProviderRegion;

    #[Optional]
    public ?NetappsLocation $location;

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
     * @param list<float>|null $availableBandwidth
     * @param CloudProvider|value-of<CloudProvider>|null $cloudProvider
     * @param NetappsLocation|NetappsLocationShape|null $location
     */
    public static function with(
        ?array $availableBandwidth = null,
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        NetappsLocation|array|null $location = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $availableBandwidth && $self['availableBandwidth'] = $availableBandwidth;
        null !== $cloudProvider && $self['cloudProvider'] = $cloudProvider;
        null !== $cloudProviderRegion && $self['cloudProviderRegion'] = $cloudProviderRegion;
        null !== $location && $self['location'] = $location;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The available throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     *
     * @param list<float> $availableBandwidth
     */
    public function withAvailableBandwidth(array $availableBandwidth): self
    {
        $self = clone $this;
        $self['availableBandwidth'] = $availableBandwidth;

        return $self;
    }

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
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
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $self = clone $this;
        $self['cloudProviderRegion'] = $cloudProviderRegion;

        return $self;
    }

    /**
     * @param NetappsLocation|NetappsLocationShape $location
     */
    public function withLocation(NetappsLocation|array $location): self
    {
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
