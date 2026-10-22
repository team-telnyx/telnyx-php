<?php

declare(strict_types=1);

namespace Telnyx\TailscaleSubnetRouters;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a Tailscale Subnet Router on a Network and enrolls it in the user's tailnet with the auth key. The response returns the router with `status` `provisioning`. Poll `GET /tailscale_subnet_routers/{id}` until it is `provisioned`. Then approve its routes in the tailnet, unless an auto-approver covers them.
 *
 * @see Telnyx\Services\TailscaleSubnetRoutersService::create()
 *
 * @phpstan-type TailscaleSubnetRouterCreateParamsShape = array{
 *   advertisedRoutes: list<string>,
 *   authKey: string,
 *   name: string,
 *   networkID: string,
 *   regionCode: string,
 * }
 */
final class TailscaleSubnetRouterCreateParams implements BaseModel
{
    /** @use SdkModel<TailscaleSubnetRouterCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * IPv4 subnets of the Network that the router advertises to the tailnet. Each entry is a canonical CIDR that the Network routes. Default, loopback, link-local, multicast, and Tailscale (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the router's own, `172.27.254.0/24` and `198.18.0.0/20`.
     *
     * @var list<string> $advertisedRoutes
     */
    #[Required('advertised_routes', list: 'string')]
    public array $advertisedRoutes;

    /**
     * A Tailscale auth key that enrolls the router in the user's tailnet: reusable, pre-approved, tagged, and not ephemeral. Telnyx stores it encrypted until enrollment succeeds, then discards it. It is never returned.
     */
    #[Required('auth_key')]
    public string $authKey;

    /**
     * A user specified name for the router.
     */
    #[Required]
    public string $name;

    /**
     * The id of the Network to attach the router to.
     */
    #[Required('network_id')]
    public string $networkID;

    /**
     * The code of the region to create the router in. `GET /network_coverage` lists the regions whose `available_services` include `tailscale_subnet_router`.
     */
    #[Required('region_code')]
    public string $regionCode;

    /**
     * `new TailscaleSubnetRouterCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TailscaleSubnetRouterCreateParams::with(
     *   advertisedRoutes: ...,
     *   authKey: ...,
     *   name: ...,
     *   networkID: ...,
     *   regionCode: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TailscaleSubnetRouterCreateParams)
     *   ->withAdvertisedRoutes(...)
     *   ->withAuthKey(...)
     *   ->withName(...)
     *   ->withNetworkID(...)
     *   ->withRegionCode(...)
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
     * @param list<string> $advertisedRoutes
     */
    public static function with(
        array $advertisedRoutes,
        string $authKey,
        string $name,
        string $networkID,
        string $regionCode,
    ): self {
        $self = new self;

        $self['advertisedRoutes'] = $advertisedRoutes;
        $self['authKey'] = $authKey;
        $self['name'] = $name;
        $self['networkID'] = $networkID;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * IPv4 subnets of the Network that the router advertises to the tailnet. Each entry is a canonical CIDR that the Network routes. Default, loopback, link-local, multicast, and Tailscale (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the router's own, `172.27.254.0/24` and `198.18.0.0/20`.
     *
     * @param list<string> $advertisedRoutes
     */
    public function withAdvertisedRoutes(array $advertisedRoutes): self
    {
        $self = clone $this;
        $self['advertisedRoutes'] = $advertisedRoutes;

        return $self;
    }

    /**
     * A Tailscale auth key that enrolls the router in the user's tailnet: reusable, pre-approved, tagged, and not ephemeral. Telnyx stores it encrypted until enrollment succeeds, then discards it. It is never returned.
     */
    public function withAuthKey(string $authKey): self
    {
        $self = clone $this;
        $self['authKey'] = $authKey;

        return $self;
    }

    /**
     * A user specified name for the router.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The id of the Network to attach the router to.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The code of the region to create the router in. `GET /network_coverage` lists the regions whose `available_services` include `tailscale_subnet_router`.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
