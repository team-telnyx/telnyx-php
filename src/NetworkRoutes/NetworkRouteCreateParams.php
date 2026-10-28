<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop;

/**
 * Adds a route to a Network. Traffic on the Network to an address in `cidr` goes via `next_hop`. With a tunnel as the next hop, functions on the Network reach the CIDR through the tunnel without a redeploy. A Network holds each CIDR once.
 *
 * @see Telnyx\Services\NetworkRoutesService::create()
 *
 * @phpstan-import-type NextHopShape from \Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop
 *
 * @phpstan-type NetworkRouteCreateParamsShape = array{
 *   cidr: string, networkID: string, nextHop: NextHop|NextHopShape
 * }
 */
final class NetworkRouteCreateParams implements BaseModel
{
    /** @use SdkModel<NetworkRouteCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The IPv4 subnet to route, such as a subnet behind the tunnel. It must be a canonical CIDR. Default, loopback, link-local, multicast, and shared address space (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the Tailscale Subnet Router ranges, `172.27.254.0/24` and `198.18.0.0/20`, or a subnet already on the Network.
     */
    #[Required]
    public string $cidr;

    /**
     * The id of the Network to add the route to.
     */
    #[Required('network_id')]
    public string $networkID;

    /**
     * Where the Network sends traffic for `cidr`.
     */
    #[Required('next_hop')]
    public NextHop $nextHop;

    /**
     * `new NetworkRouteCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NetworkRouteCreateParams::with(cidr: ..., networkID: ..., nextHop: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NetworkRouteCreateParams)
     *   ->withCidr(...)
     *   ->withNetworkID(...)
     *   ->withNextHop(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NextHop|NextHopShape $nextHop
     */
    public static function with(
        string $cidr,
        string $networkID,
        NextHop|array $nextHop
    ): self {
        $self = new self;

        $self['cidr'] = $cidr;
        $self['networkID'] = $networkID;
        $self['nextHop'] = $nextHop;

        return $self;
    }

    /**
     * The IPv4 subnet to route, such as a subnet behind the tunnel. It must be a canonical CIDR. Default, loopback, link-local, multicast, and shared address space (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the Tailscale Subnet Router ranges, `172.27.254.0/24` and `198.18.0.0/20`, or a subnet already on the Network.
     */
    public function withCidr(string $cidr): self
    {
        $self = clone $this;
        $self['cidr'] = $cidr;

        return $self;
    }

    /**
     * The id of the Network to add the route to.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * Where the Network sends traffic for `cidr`.
     *
     * @param NextHop|NextHopShape $nextHop
     */
    public function withNextHop(NextHop|array $nextHop): self
    {
        $self = clone $this;
        $self['nextHop'] = $nextHop;

        return $self;
    }
}
