<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP;

enum IPVersion: string
{
    case IPV4 = 'ipv4';

    case IPV6 = 'ipv6';
}
