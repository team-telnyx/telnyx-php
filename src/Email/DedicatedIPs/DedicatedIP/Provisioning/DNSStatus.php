<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP\Provisioning;

/**
 * `dns_confirmed`: the PTR is forward-confirmed and `dns_confirmed_at` is set. `pending_ptr`: the PTR record is not yet in place. `pending_dns`: the PTR record is waiting for forward confirmation. `dns_lost`: a previously confirmed PTR no longer confirms, or the PTR request was abandoned before it ever confirmed (`ptr_request_state` is `abandoned`); the IP carries no mail until DNS is confirmed. `not_applicable`: the IP is released or has no PTR record on file.
 */
enum DNSStatus: string
{
    case NOT_APPLICABLE = 'not_applicable';

    case PENDING_PTR = 'pending_ptr';

    case PENDING_DNS = 'pending_dns';

    case DNS_CONFIRMED = 'dns_confirmed';

    case DNS_LOST = 'dns_lost';
}
