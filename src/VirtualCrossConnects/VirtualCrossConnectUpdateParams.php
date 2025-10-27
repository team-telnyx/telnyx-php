<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the Virtual Cross Connect.<br /><br />Cloud IPs can only be patched during the `created` state, as GCE will only inform you of your generated IP once the pending connection requested has been accepted. Once the Virtual Cross Connect has moved to `provisioning`, the IPs can no longer be patched.<br /><br />Once the Virtual Cross Connect has moved to `provisioned` and you are ready to enable routing, you can toggle the routing announcements to `true`.
 *
 * @see Telnyx\VirtualCrossConnects->update
 *
 * @phpstan-type virtual_cross_connect_update_params = array{
 *   primaryCloudIP?: string,
 *   primaryEnabled?: bool,
 *   primaryRoutingAnnouncement?: bool,
 *   secondaryCloudIP?: string,
 *   secondaryEnabled?: bool,
 *   secondaryRoutingAnnouncement?: bool,
 * }
 */
final class VirtualCrossConnectUpdateParams implements BaseModel
{
    /** @use SdkModel<virtual_cross_connect_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Api('primary_cloud_ip', optional: true)]
    public ?string $primaryCloudIP;

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Api('primary_enabled', optional: true)]
    public ?bool $primaryEnabled;

    /**
     * Whether the primary BGP route is being announced.
     */
    #[Api('primary_routing_announcement', optional: true)]
    public ?bool $primaryRoutingAnnouncement;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Api('secondary_cloud_ip', optional: true)]
    public ?string $secondaryCloudIP;

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Api('secondary_enabled', optional: true)]
    public ?bool $secondaryEnabled;

    /**
     * Whether the secondary BGP route is being announced.
     */
    #[Api('secondary_routing_announcement', optional: true)]
    public ?bool $secondaryRoutingAnnouncement;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $primaryCloudIP = null,
        ?bool $primaryEnabled = null,
        ?bool $primaryRoutingAnnouncement = null,
        ?string $secondaryCloudIP = null,
        ?bool $secondaryEnabled = null,
        ?bool $secondaryRoutingAnnouncement = null,
    ): self {
        $obj = new self;

        null !== $primaryCloudIP && $obj->primaryCloudIP = $primaryCloudIP;
        null !== $primaryEnabled && $obj->primaryEnabled = $primaryEnabled;
        null !== $primaryRoutingAnnouncement && $obj->primaryRoutingAnnouncement = $primaryRoutingAnnouncement;
        null !== $secondaryCloudIP && $obj->secondaryCloudIP = $secondaryCloudIP;
        null !== $secondaryEnabled && $obj->secondaryEnabled = $secondaryEnabled;
        null !== $secondaryRoutingAnnouncement && $obj->secondaryRoutingAnnouncement = $secondaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $obj = clone $this;
        $obj->primaryCloudIP = $primaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $obj = clone $this;
        $obj->primaryEnabled = $primaryEnabled;

        return $obj;
    }

    /**
     * Whether the primary BGP route is being announced.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj->primaryRoutingAnnouncement = $primaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $obj = clone $this;
        $obj->secondaryCloudIP = $secondaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withSecondaryEnabled(bool $secondaryEnabled): self
    {
        $obj = clone $this;
        $obj->secondaryEnabled = $secondaryEnabled;

        return $obj;
    }

    /**
     * Whether the secondary BGP route is being announced.
     */
    public function withSecondaryRoutingAnnouncement(
        bool $secondaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj->secondaryRoutingAnnouncement = $secondaryRoutingAnnouncement;

        return $obj;
    }
}
