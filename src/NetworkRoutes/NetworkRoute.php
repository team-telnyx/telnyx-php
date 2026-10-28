<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetworkRoute\NextHop;
use Telnyx\NetworkRoutes\NetworkRoute\Origin;
use Telnyx\NetworkRoutes\NetworkRoute\Status;

/**
 * @phpstan-import-type NextHopShape from \Telnyx\NetworkRoutes\NetworkRoute\NextHop
 *
 * @phpstan-type NetworkRouteShape = array{
 *   id?: string|null,
 *   cidr?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   networkID?: string|null,
 *   nextHop?: null|NextHop|NextHopShape,
 *   origin?: null|Origin|value-of<Origin>,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class NetworkRoute implements BaseModel
{
    /** @use SdkModel<NetworkRouteShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The IPv4 CIDR the route covers.
     */
    #[Optional]
    public ?string $cidr;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The id of the Network the route belongs to.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    /**
     * Where the Network sends traffic for the route's CIDR.
     */
    #[Optional('next_hop')]
    public ?NextHop $nextHop;

    /**
     * `static` for a route added with `POST /network_routes`, `attachment` for a route that another resource installed and removes.
     *
     * @var value-of<Origin>|null $origin
     */
    #[Optional(enum: Origin::class)]
    public ?string $origin;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * `pending` until Telnyx installs the route on the Network, then `active`. `inactive` while a tunnel next hop has no connected process. `failed` (Preview, not reported yet) when Telnyx could not install the route.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NextHop|NextHopShape|null $nextHop
     * @param Origin|value-of<Origin>|null $origin
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $cidr = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $networkID = null,
        NextHop|array|null $nextHop = null,
        Origin|string|null $origin = null,
        ?string $recordType = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cidr && $self['cidr'] = $cidr;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $nextHop && $self['nextHop'] = $nextHop;
        null !== $origin && $self['origin'] = $origin;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;

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
     * The IPv4 CIDR the route covers.
     */
    public function withCidr(string $cidr): self
    {
        $self = clone $this;
        $self['cidr'] = $cidr;

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
     * The id of the Network the route belongs to.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * Where the Network sends traffic for the route's CIDR.
     *
     * @param NextHop|NextHopShape $nextHop
     */
    public function withNextHop(NextHop|array $nextHop): self
    {
        $self = clone $this;
        $self['nextHop'] = $nextHop;

        return $self;
    }

    /**
     * `static` for a route added with `POST /network_routes`, `attachment` for a route that another resource installed and removes.
     *
     * @param Origin|value-of<Origin> $origin
     */
    public function withOrigin(Origin|string $origin): self
    {
        $self = clone $this;
        $self['origin'] = $origin;

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
     * `pending` until Telnyx installs the route on the Network, then `active`. `inactive` while a tunnel next hop has no connected process. `failed` (Preview, not reported yet) when Telnyx could not install the route.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
