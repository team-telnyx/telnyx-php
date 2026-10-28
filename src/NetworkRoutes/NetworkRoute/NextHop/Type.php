<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRoute\NextHop;

/**
 * The type of the next hop. Routes added with `POST /network_routes` use `tunnel`. Routes that attachments install carry the attachment's type.
 */
enum Type: string
{
    case TUNNEL = 'tunnel';

    case WIREGUARD_PEER = 'wireguard_peer';

    case WIREGUARD_INTERFACE = 'wireguard_interface';

    case PRIVATE_WIRELESS_GATEWAY = 'private_wireless_gateway';

    case VIRTUAL_CROSS_CONNECT = 'virtual_cross_connect';

    case IPSEC_TUNNEL = 'ipsec_tunnel';

    case PUBLIC_INTERNET_GATEWAY = 'public_internet_gateway';
}
