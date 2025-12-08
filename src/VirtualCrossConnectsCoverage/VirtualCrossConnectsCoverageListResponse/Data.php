<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse\Data\Location;

/**
 * @phpstan-type DataShape = array{
 *   available_bandwidth?: list<float>|null,
 *   cloud_provider?: value-of<CloudProvider>|null,
 *   cloud_provider_region?: string|null,
 *   location?: Location|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The available throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     *
     * @var list<float>|null $available_bandwidth
     */
    #[Optional(list: 'float')]
    public ?array $available_bandwidth;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider>|null $cloud_provider
     */
    #[Optional(enum: CloudProvider::class)]
    public ?string $cloud_provider;

    /**
     * The region where your Virtual Private Cloud hosts are located. Should be identical to how the cloud provider names region, i.e. us-east-1 for AWS but Frankfurt for Azure.
     */
    #[Optional]
    public ?string $cloud_provider_region;

    #[Optional]
    public ?Location $location;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
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
     * @param Location|array{
     *   code?: string|null,
     *   name?: string|null,
     *   pop?: string|null,
     *   region?: string|null,
     *   site?: string|null,
     * } $location
     */
    public static function with(
        ?array $available_bandwidth = null,
        CloudProvider|string|null $cloud_provider = null,
        ?string $cloud_provider_region = null,
        Location|array|null $location = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $available_bandwidth && $obj['available_bandwidth'] = $available_bandwidth;
        null !== $cloud_provider && $obj['cloud_provider'] = $cloud_provider;
        null !== $cloud_provider_region && $obj['cloud_provider_region'] = $cloud_provider_region;
        null !== $location && $obj['location'] = $location;
        null !== $record_type && $obj['record_type'] = $record_type;

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
        $obj['available_bandwidth'] = $availableBandwidth;

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
        $obj['cloud_provider_region'] = $cloudProviderRegion;

        return $obj;
    }

    /**
     * @param Location|array{
     *   code?: string|null,
     *   name?: string|null,
     *   pop?: string|null,
     *   region?: string|null,
     *   site?: string|null,
     * } $location
     */
    public function withLocation(Location|array $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
