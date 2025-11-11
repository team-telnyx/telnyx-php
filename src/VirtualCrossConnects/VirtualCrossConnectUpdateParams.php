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
 * @phpstan-type VirtualCrossConnectUpdateParamsShape = array{
 *   primary_cloud_ip?: string,
 *   primary_enabled?: bool,
 *   primary_routing_announcement?: bool,
 *   secondary_cloud_ip?: string,
 *   secondary_enabled?: bool,
 *   secondary_routing_announcement?: bool,
 * }
 */
final class VirtualCrossConnectUpdateParams implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Api(optional: true)]
    public ?string $primary_cloud_ip;

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Api(optional: true)]
    public ?bool $primary_enabled;

    /**
     * Whether the primary BGP route is being announced.
     */
    #[Api(optional: true)]
    public ?bool $primary_routing_announcement;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Api(optional: true)]
    public ?string $secondary_cloud_ip;

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Api(optional: true)]
    public ?bool $secondary_enabled;

    /**
     * Whether the secondary BGP route is being announced.
     */
    #[Api(optional: true)]
    public ?bool $secondary_routing_announcement;

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
        ?string $primary_cloud_ip = null,
        ?bool $primary_enabled = null,
        ?bool $primary_routing_announcement = null,
        ?string $secondary_cloud_ip = null,
        ?bool $secondary_enabled = null,
        ?bool $secondary_routing_announcement = null,
    ): self {
        $obj = new self;

        null !== $primary_cloud_ip && $obj->primary_cloud_ip = $primary_cloud_ip;
        null !== $primary_enabled && $obj->primary_enabled = $primary_enabled;
        null !== $primary_routing_announcement && $obj->primary_routing_announcement = $primary_routing_announcement;
        null !== $secondary_cloud_ip && $obj->secondary_cloud_ip = $secondary_cloud_ip;
        null !== $secondary_enabled && $obj->secondary_enabled = $secondary_enabled;
        null !== $secondary_routing_announcement && $obj->secondary_routing_announcement = $secondary_routing_announcement;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $obj = clone $this;
        $obj->primary_cloud_ip = $primaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $obj = clone $this;
        $obj->primary_enabled = $primaryEnabled;

        return $obj;
    }

    /**
     * Whether the primary BGP route is being announced.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj->primary_routing_announcement = $primaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $obj = clone $this;
        $obj->secondary_cloud_ip = $secondaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withSecondaryEnabled(bool $secondaryEnabled): self
    {
        $obj = clone $this;
        $obj->secondary_enabled = $secondaryEnabled;

        return $obj;
    }

    /**
     * Whether the secondary BGP route is being announced.
     */
    public function withSecondaryRoutingAnnouncement(
        bool $secondaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj->secondary_routing_announcement = $secondaryRoutingAnnouncement;

        return $obj;
    }
}
