<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the Virtual Cross Connect.<br /><br />Cloud IPs can only be patched during the `created` state, as GCE will only inform you of your generated IP once the pending connection requested has been accepted. Once the Virtual Cross Connect has moved to `provisioning`, the IPs can no longer be patched.<br /><br />Once the Virtual Cross Connect has moved to `provisioned` and you are ready to enable routing, you can toggle the routing announcements to `true`.
 *
 * @see Telnyx\Services\VirtualCrossConnectsService::update()
 *
 * @phpstan-type VirtualCrossConnectUpdateParamsShape = array{
 *   primaryCloudIP?: string|null,
 *   primaryEnabled?: bool|null,
 *   primaryRoutingAnnouncement?: bool|null,
 *   secondaryCloudIP?: string|null,
 *   secondaryEnabled?: bool|null,
 *   secondaryRoutingAnnouncement?: bool|null,
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
    #[Optional('primary_cloud_ip')]
    public ?string $primaryCloudIP;

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Optional('primary_enabled')]
    public ?bool $primaryEnabled;

    /**
     * Whether the primary BGP route is being announced.
     */
    #[Optional('primary_routing_announcement')]
    public ?bool $primaryRoutingAnnouncement;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Optional('secondary_cloud_ip')]
    public ?string $secondaryCloudIP;

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Optional('secondary_enabled')]
    public ?bool $secondaryEnabled;

    /**
     * Whether the secondary BGP route is being announced.
     */
    #[Optional('secondary_routing_announcement')]
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
        $self = new self;

        null !== $primaryCloudIP && $self['primaryCloudIP'] = $primaryCloudIP;
        null !== $primaryEnabled && $self['primaryEnabled'] = $primaryEnabled;
        null !== $primaryRoutingAnnouncement && $self['primaryRoutingAnnouncement'] = $primaryRoutingAnnouncement;
        null !== $secondaryCloudIP && $self['secondaryCloudIP'] = $secondaryCloudIP;
        null !== $secondaryEnabled && $self['secondaryEnabled'] = $secondaryEnabled;
        null !== $secondaryRoutingAnnouncement && $self['secondaryRoutingAnnouncement'] = $secondaryRoutingAnnouncement;

        return $self;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $self = clone $this;
        $self['primaryCloudIP'] = $primaryCloudIP;

        return $self;
    }

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $self = clone $this;
        $self['primaryEnabled'] = $primaryEnabled;

        return $self;
    }

    /**
     * Whether the primary BGP route is being announced.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $self = clone $this;
        $self['primaryRoutingAnnouncement'] = $primaryRoutingAnnouncement;

        return $self;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $self = clone $this;
        $self['secondaryCloudIP'] = $secondaryCloudIP;

        return $self;
    }

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withSecondaryEnabled(bool $secondaryEnabled): self
    {
        $self = clone $this;
        $self['secondaryEnabled'] = $secondaryEnabled;

        return $self;
    }

    /**
     * Whether the secondary BGP route is being announced.
     */
    public function withSecondaryRoutingAnnouncement(
        bool $secondaryRoutingAnnouncement
    ): self {
        $self = clone $this;
        $self['secondaryRoutingAnnouncement'] = $secondaryRoutingAnnouncement;

        return $self;
    }
}
