<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams;

/**
 * Allocate an IP of this address family. Supported value: `ipv4`. Any other value, including `ipv6` or `null`, returns `422`.
 */
enum IPVersion: string
{
    case IPV4 = 'ipv4';
}
