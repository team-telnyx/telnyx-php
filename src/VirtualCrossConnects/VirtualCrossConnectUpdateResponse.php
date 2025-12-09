<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse\Data;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse\Data\Region;

/**
 * @phpstan-type VirtualCrossConnectUpdateResponseShape = array{data?: Data|null}
 */
final class VirtualCrossConnectUpdateResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   name?: string|null,
     *   networkID?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   regionCode?: string|null,
     *   bandwidthMbps?: float|null,
     *   bgpAsn?: float|null,
     *   cloudProvider?: value-of<CloudProvider>|null,
     *   cloudProviderRegion?: string|null,
     *   primaryBgpKey?: string|null,
     *   primaryCloudAccountID?: string|null,
     *   primaryCloudIP?: string|null,
     *   primaryEnabled?: bool|null,
     *   primaryRoutingAnnouncement?: bool|null,
     *   primaryTelnyxIP?: string|null,
     *   region?: Region|null,
     *   secondaryBgpKey?: string|null,
     *   secondaryCloudAccountID?: string|null,
     *   secondaryCloudIP?: string|null,
     *   secondaryEnabled?: bool|null,
     *   secondaryRoutingAnnouncement?: bool|null,
     *   secondaryTelnyxIP?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     *   name?: string|null,
     *   networkID?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   regionCode?: string|null,
     *   bandwidthMbps?: float|null,
     *   bgpAsn?: float|null,
     *   cloudProvider?: value-of<CloudProvider>|null,
     *   cloudProviderRegion?: string|null,
     *   primaryBgpKey?: string|null,
     *   primaryCloudAccountID?: string|null,
     *   primaryCloudIP?: string|null,
     *   primaryEnabled?: bool|null,
     *   primaryRoutingAnnouncement?: bool|null,
     *   primaryTelnyxIP?: string|null,
     *   region?: Region|null,
     *   secondaryBgpKey?: string|null,
     *   secondaryCloudAccountID?: string|null,
     *   secondaryCloudIP?: string|null,
     *   secondaryEnabled?: bool|null,
     *   secondaryRoutingAnnouncement?: bool|null,
     *   secondaryTelnyxIP?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
