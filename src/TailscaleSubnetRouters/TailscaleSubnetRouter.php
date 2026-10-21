<?php

declare(strict_types=1);

namespace Telnyx\TailscaleSubnetRouters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter\Status;

/**
 * @phpstan-type TailscaleSubnetRouterShape = array{
 *   id?: string|null,
 *   advertisedRoutes?: list<string>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerAddress?: string|null,
 *   deviceID?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   recordType?: string|null,
 *   regionCode?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   tailnetName?: string|null,
 *   tailscaleIPs?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class TailscaleSubnetRouter implements BaseModel
{
    /** @use SdkModel<TailscaleSubnetRouterShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * IPv4 subnets of the Network that the router advertises to the tailnet. Each entry is a canonical CIDR that the Network routes. Default, loopback, link-local, multicast, and Tailscale (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the router's own, `172.27.254.0/24` and `198.18.0.0/20`.
     *
     * @var list<string>|null $advertisedRoutes
     */
    #[Optional('advertised_routes', list: 'string')]
    public ?array $advertisedRoutes;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The router's address on the Network, from `172.27.254.0/24`. Tailnet traffic enters the Network from this address.
     */
    #[Optional('customer_address')]
    public ?string $customerAddress;

    /**
     * The router's node id on the tailnet. Set once the router has enrolled.
     */
    #[Optional('device_id', nullable: true)]
    public ?string $deviceID;

    /**
     * A user specified name for the router.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the Network the router is attached to.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The code of the region the router is created in. `GET /network_coverage` lists the regions whose `available_services` include `tailscale_subnet_router`.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    /**
     * `provisioning`: Telnyx is creating the router or applying a change. `provisioned`: the router is on the tailnet and advertises its routes; the tailnet still approves them. `failed`: enrollment did not complete, and `PATCH` retries it. `deleting`: the router is being removed.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The name of the tailnet the router is enrolled in. Set once the router has enrolled.
     */
    #[Optional('tailnet_name', nullable: true)]
    public ?string $tailnetName;

    /**
     * The router's addresses on the tailnet. Empty until the router has enrolled.
     *
     * @var list<string>|null $tailscaleIPs
     */
    #[Optional('tailscale_ips', list: 'string')]
    public ?array $tailscaleIPs;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
     * @param Status|value-of<Status>|null $status
     * @param list<string>|null $tailscaleIPs
     */
    public static function with(
        string|Omitted|null $deviceID = Omitted::VALUE,
        string|Omitted|null $tailnetName = Omitted::VALUE,
        ?string $id = null,
        ?array $advertisedRoutes = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerAddress = null,
        ?string $name = null,
        ?string $networkID = null,
        ?string $recordType = null,
        ?string $regionCode = null,
        Status|string|null $status = null,
        ?array $tailscaleIPs = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $advertisedRoutes && $self['advertisedRoutes'] = $advertisedRoutes;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerAddress && $self['customerAddress'] = $customerAddress;
        Omitted::VALUE !== $deviceID && $self['deviceID'] = $deviceID;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionCode && $self['regionCode'] = $regionCode;
        null !== $status && $self['status'] = $status;
        Omitted::VALUE !== $tailnetName && $self['tailnetName'] = $tailnetName;
        null !== $tailscaleIPs && $self['tailscaleIPs'] = $tailscaleIPs;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The router's address on the Network, from `172.27.254.0/24`. Tailnet traffic enters the Network from this address.
     */
    public function withCustomerAddress(string $customerAddress): self
    {
        $self = clone $this;
        $self['customerAddress'] = $customerAddress;

        return $self;
    }

    /**
     * The router's node id on the tailnet. Set once the router has enrolled.
     */
    public function withDeviceID(?string $deviceID): self
    {
        $self = clone $this;
        $self['deviceID'] = $deviceID;

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
     * The id of the Network the router is attached to.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The code of the region the router is created in. `GET /network_coverage` lists the regions whose `available_services` include `tailscale_subnet_router`.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * `provisioning`: Telnyx is creating the router or applying a change. `provisioned`: the router is on the tailnet and advertises its routes; the tailnet still approves them. `failed`: enrollment did not complete, and `PATCH` retries it. `deleting`: the router is being removed.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The name of the tailnet the router is enrolled in. Set once the router has enrolled.
     */
    public function withTailnetName(?string $tailnetName): self
    {
        $self = clone $this;
        $self['tailnetName'] = $tailnetName;

        return $self;
    }

    /**
     * The router's addresses on the tailnet. Empty until the router has enrolled.
     *
     * @param list<string> $tailscaleIPs
     */
    public function withTailscaleIPs(array $tailscaleIPs): self
    {
        $self = clone $this;
        $self['tailscaleIPs'] = $tailscaleIPs;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
