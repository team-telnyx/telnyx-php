<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;

/**
 * Only routes whose next hop has this type.
 */
enum NextHopType: string
{
    case TUNNEL = 'tunnel';

    case WIREGUARD_PEER = 'wireguard_peer';

    case WIREGUARD_INTERFACE = 'wireguard_interface';

    case PRIVATE_WIRELESS_GATEWAY = 'private_wireless_gateway';

    case VIRTUAL_CROSS_CONNECT = 'virtual_cross_connect';

    case IPSEC_TUNNEL = 'ipsec_tunnel';

    case PUBLIC_INTERNET_GATEWAY = 'public_internet_gateway';
}
