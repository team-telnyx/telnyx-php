<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data\Location;

/**
 * @phpstan-type data_alias = array{
 *   availableBandwidth?: list<float>,
 *   cloudProvider?: value-of<CloudProvider>,
 *   cloudProviderRegion?: string,
 *   location?: Location,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The available throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     *
     * @var list<float>|null $availableBandwidth
     */
    #[Api('available_bandwidth', list: 'float', optional: true)]
    public ?array $availableBandwidth;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider>|null $cloudProvider
     */
    #[Api('cloud_provider', enum: CloudProvider::class, optional: true)]
    public ?string $cloudProvider;

    /**
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    #[Api('cloud_provider_region', optional: true)]
    public ?string $cloudProviderRegion;

    #[Api(optional: true)]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
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
     * @param list<float> $availableBandwidth
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public static function with(
        ?array $availableBandwidth = null,
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        ?Location $location = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $availableBandwidth && $obj->availableBandwidth = $availableBandwidth;
        null !== $cloudProvider && $obj->cloudProvider = $cloudProvider instanceof CloudProvider ? $cloudProvider->value : $cloudProvider;
        null !== $cloudProviderRegion && $obj->cloudProviderRegion = $cloudProviderRegion;
        null !== $location && $obj->location = $location;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The available throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     *
     * @param list<float> $availableBandwidth
     */
    public function withAvailableBandwidth(array $availableBandwidth): self
    {
        $obj = clone $this;
        $obj->availableBandwidth = $availableBandwidth;

        return $obj;
    }

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
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
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj->cloudProviderRegion = $cloudProviderRegion;

        return $obj;
    }

    public function withLocation(Location $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
