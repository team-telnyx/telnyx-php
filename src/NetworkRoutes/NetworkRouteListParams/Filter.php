<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRouteListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter\NextHopType;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter\Origin;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[network_id], filter[origin], filter[next_hop.type], filter[cidr], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   networkID: string,
 *   cidr?: string|null,
 *   nextHopType?: null|NextHopType|value-of<NextHopType>,
 *   origin?: null|Origin|value-of<Origin>,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The id of the Network whose route table is returned. Required.
     */
    #[Required('network_id')]
    public string $networkID;

    /**
     * Only routes with this CIDR.
     */
    #[Optional]
    public ?string $cidr;

    /**
     * Only routes whose next hop has this type.
     *
     * @var value-of<NextHopType>|null $nextHopType
     */
    #[Optional('next_hop.type', enum: NextHopType::class)]
    public ?string $nextHopType;

    /**
     * Only routes of this origin.
     *
     * @var value-of<Origin>|null $origin
     */
    #[Optional(enum: Origin::class)]
    public ?string $origin;

    /**
     * Only routes with this status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(networkID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Filter)->withNetworkID(...)
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
     * @param NextHopType|value-of<NextHopType>|null $nextHopType
     * @param Origin|value-of<Origin>|null $origin
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        string $networkID,
        ?string $cidr = null,
        NextHopType|string|null $nextHopType = null,
        Origin|string|null $origin = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        $self['networkID'] = $networkID;

        null !== $cidr && $self['cidr'] = $cidr;
        null !== $nextHopType && $self['nextHopType'] = $nextHopType;
        null !== $origin && $self['origin'] = $origin;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * The id of the Network whose route table is returned. Required.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * Only routes with this CIDR.
     */
    public function withCidr(string $cidr): self
    {
        $self = clone $this;
        $self['cidr'] = $cidr;

        return $self;
    }

    /**
     * Only routes whose next hop has this type.
     *
     * @param NextHopType|value-of<NextHopType> $nextHopType
     */
    public function withNextHopType(NextHopType|string $nextHopType): self
    {
        $self = clone $this;
        $self['nextHopType'] = $nextHopType;

        return $self;
    }

    /**
     * Only routes of this origin.
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
     * Only routes with this status.
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
