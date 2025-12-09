<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse\Data;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse\Data\Region;

/**
 * @phpstan-type VirtualCrossConnectNewResponseShape = array{data?: Data|null}
 */
final class VirtualCrossConnectNewResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectNewResponseShape> */
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
     *   bgpAsn: float,
     *   cloudProvider: value-of<CloudProvider>,
     *   cloudProviderRegion: string,
     *   primaryCloudAccountID: string,
     *   bandwidthMbps?: float|null,
     *   primaryBgpKey?: string|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
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
     *   bgpAsn: float,
     *   cloudProvider: value-of<CloudProvider>,
     *   cloudProviderRegion: string,
     *   primaryCloudAccountID: string,
     *   bandwidthMbps?: float|null,
     *   primaryBgpKey?: string|null,
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
