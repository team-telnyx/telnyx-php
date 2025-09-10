<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage;

enum AvailableService: string
{
    case CLOUD_VPN = 'cloud_vpn';

    case PRIVATE_WIRELESS_GATEWAY = 'private_wireless_gateway';

    case VIRTUAL_CROSS_CONNECT = 'virtual_cross_connect';
}
