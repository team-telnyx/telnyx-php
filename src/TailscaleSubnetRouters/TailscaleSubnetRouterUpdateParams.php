<?php

declare(strict_types=1);

namespace Telnyx\TailscaleSubnetRouters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Renames the router, changes its advertised routes, or retries a failed enrollment. Any change queues a new provisioning run and returns the router with `status` `provisioning`. The router keeps its machine identity on the tailnet. Send an empty object to retry a `failed` router with its stored auth key. Include a new `auth_key` only while the router has never enrolled. The router's Network and region cannot change: create a new router instead.
 *
 * @see Telnyx\Services\TailscaleSubnetRoutersService::update()
 *
 * @phpstan-type TailscaleSubnetRouterUpdateParamsShape = array{
 *   advertisedRoutes?: list<string>|null,
 *   authKey?: string|null,
 *   name?: string|null,
 * }
 */
final class TailscaleSubnetRouterUpdateParams implements BaseModel
{
    /** @use SdkModel<TailscaleSubnetRouterUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * IPv4 subnets of the Network that the router advertises to the tailnet. Each entry is a canonical CIDR that the Network routes. Default, loopback, link-local, multicast, and Tailscale (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the router's own, `172.27.254.0/24` and `198.18.0.0/20`.
     *
     * @var list<string>|null $advertisedRoutes
     */
    #[Optional('advertised_routes', list: 'string')]
    public ?array $advertisedRoutes;

    /**
     * A replacement Tailscale auth key. Accepted only while the router has never enrolled, for example after a `failed` enrollment. Never returned.
     */
    #[Optional('auth_key')]
    public ?string $authKey;

    /**
     * A user specified name for the router.
     */
    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $advertisedRoutes
     */
    public static function with(
        ?array $advertisedRoutes = null,
        ?string $authKey = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $advertisedRoutes && $self['advertisedRoutes'] = $advertisedRoutes;
        null !== $authKey && $self['authKey'] = $authKey;
        null !== $name && $self['name'] = $name;

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
     * A replacement Tailscale auth key. Accepted only while the router has never enrolled, for example after a `failed` enrollment. Never returned.
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
}
