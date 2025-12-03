<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Location;

/**
 * @phpstan-type VirtualCrossConnectsCoverageListResponseShape = array{
 *   available_bandwidth?: list<float>|null,
 *   cloud_provider?: value-of<CloudProvider>|null,
 *   cloud_provider_region?: string|null,
 *   location?: Location|null,
 *   record_type?: string|null,
 * }
 */
final class VirtualCrossConnectsCoverageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VirtualCrossConnectsCoverageListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The available throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     *
     * @var list<float>|null $available_bandwidth
     */
    #[Api(list: 'float', optional: true)]
    public ?array $available_bandwidth;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider>|null $cloud_provider
     */
    #[Api(enum: CloudProvider::class, optional: true)]
    public ?string $cloud_provider;

    /**
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    #[Api(optional: true)]
    public ?string $cloud_provider_region;

    #[Api(optional: true)]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<float> $available_bandwidth
     * @param CloudProvider|value-of<CloudProvider> $cloud_provider
     */
    public static function with(
        ?array $available_bandwidth = null,
        CloudProvider|string|null $cloud_provider = null,
        ?string $cloud_provider_region = null,
        ?Location $location = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $available_bandwidth && $obj->available_bandwidth = $available_bandwidth;
        null !== $cloud_provider && $obj['cloud_provider'] = $cloud_provider;
        null !== $cloud_provider_region && $obj->cloud_provider_region = $cloud_provider_region;
        null !== $location && $obj->location = $location;
        null !== $record_type && $obj->record_type = $record_type;

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
        $obj->available_bandwidth = $availableBandwidth;

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
        $obj['cloud_provider'] = $cloudProvider;

        return $obj;
    }

    /**
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj->cloud_provider_region = $cloudProviderRegion;

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
        $obj->record_type = $recordType;

        return $obj;
    }
}
